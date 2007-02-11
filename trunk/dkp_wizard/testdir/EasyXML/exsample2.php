<?php
/**
 * Exsample 1 of EasyXML creation
 *
 * Shows the basics of creating a document with namespaces in EasyXML.
 *
 * The exsample creates a XSL stylesheet to
 * format the library xml from exsample 1.
 *
 * ----------------------------------------------------------------------------
 * "THE BEER-WARE LICENSE" (Revision 42):
 * <ian@zerny.dk> wrote this file. As long as you retain this notice you
 * can do whatever you want with this stuff. If we meet some day, and you think
 * this stuff is worth it, you can buy me a beer in return. Ian Steven Zerny
 * ----------------------------------------------------------------------------
 *
 * @package EasyXML
 * @author Ian Zerny
 */

// Trigger for view mode (just ignore this)
if (!isset($_GET['XML'])) {
  echo '<a href="?XML=1">View XML Output</a><br/><br/>';
  highlight_file('exsample2.php');
  die();
}


// Set error level
error_reporting(E_ALL);

// Include the EasyXML file
require_once('EasyXML.class.php');

// Create new EasyXML document and set encoding
$oEasyXML = EasyXML::loadNew(array('encoding'=>'iso-8859-1'));

// Create a stylesheet with the namespace xsl and define that namespace
$oSS = $oEasyXML->createElement('xsl:stylesheet', 'http://www.w3.org/1999/XSL/Transform');
$oSS->createAttribute('version', '1.0');

// Create a template to match root
$oSS->createComment('root template');
$oTem = $oSS->createElement('xsl:template');
$oTem->createAttribute('match','/');

// html wrapping
$oHtml = $oTem->createElement('html');
$oHead = $oHtml->createElement('head');
$oBody = $oHtml->createElement('body');

// Loop for /library/shelf
$oFE = $oBody->createElement('xsl:for-each');
$oFE->createAttribute('select','/library/shelf');

// Call shelf template
$oCall = $oFE->createElement('xsl:call-template');
$oCall->createAttribute('name', 'create-shelf');


// Create a template to create a shelf
$oSS->createComment('template to create a shelf');
$oTem = $oSS->createElement('xsl:template');
$oTem->createAttribute('name','create-shelfs');

// Shelf contaner
$oShelf = $oTem->createElement('div');

// Set shelf subject
$oShelfSubject = $oShelf->createElement('h3');
$oVO = $oShelfSubject->createElement('xsl:value-of');
$oVO->createAttribute('select', '@subject');

// Loop books
$oFE_Book = $oShelf->createElement('xsl:for-each');
$oFE_Book->createAttribute('select','book');

// Call book template
$oCall = $oFE_Book->createElement('xsl:call-template');
$oCall->createAttribute('name','create-book');


// Create a template to create books
$oSS->createComment('template to create a book');
$oTem = $oSS->createElement('xsl:template');
$oTem->createAttribute('name','create-book');

// Create the book info
$aInfo = array('title', 'author', 'publisher', 'publish_date');
$oUL = $oTem->createElement('ul');
foreach ($aInfo as $sNode) {
  $oLI = $oUL->createElement('li');
  $oLI->createText($sNode.': ');
  $oVO = $oLI->createElement('xsl:value-of');
  $oVO->createAttribute('select', $sNode.'/text()');
}


// Print the XML document
EasyXML::printXML($oEasyXML);
?>

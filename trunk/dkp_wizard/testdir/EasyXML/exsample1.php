<?php
/**
 * Exsample 1 of EasyXML creation
 *
 * This shows the basics of creating an XML document with EasyXML.
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
  highlight_file('exsample1.php');
  die();
}

// Set error level
error_reporting(E_ALL);

// Include the EasyXML file
require_once('EasyXML.class.php');

// Array of my xml books
$aBooks[] = array('title'        => 'Applied XML Solutions', 
		  'author'       => 'Benoît Marchal',
		  'publisher'    => 'O\'Reilly',
		  'publish_date' => '2000/09/01');

$aBooks[] = array('title'        => 'Effective XML: 50 Specific Ways to Improve Your XML', 
		  'author'       => 'Elliotte Rusty Harold',
		  'publisher'    => 'Addison Wesley',
		  'publish_date' => '2003/09/22');

// Create new EasyXML document with iso-8859-1 encoding
$oEasyXML = EasyXML::loadNew(array('encoding'=>'iso-8859-1'));

// Create root node 'library'
$oLib = $oEasyXML->createElement('library');

// Add child 'shelf' to 'library'
$oShelf = $oLib->createElement('shelf');

// Set subject attribute to xml for the shelf
$oShelf->createAttribute('subject','xml');

// Loop the books
foreach ($aBooks as $aBook) {

  // Add a book node for each book in the array
  $oBook = $oShelf->createElement('book');

  // Loop the contents of the book
  foreach ($aBook as $sNode => $sValue) {

    // Create new node of the content type
    $oNode = $oBook->createElement($sNode);

    // Add a text node with the content value
    $oNode->createText($sValue);

  } // foreach(book)

} // foreach(books)

// Print the XML document
EasyXML::printXML($oEasyXML);
?>






























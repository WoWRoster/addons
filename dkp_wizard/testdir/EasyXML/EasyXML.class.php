<?php
/**
 * EasyXML - Easy XML document creator.
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
/**
 * Autoload for includeing classes
 */
function __autoload($sCN) {
  require_once($sCN.'.class.php');
}
/**
 * EasyXML - Easy XML document creator.
 *
 * @package EasyXML
 */
class EasyXML {
  /**@#+
   * Node type constants
   */
  const NODE_ELEMENT   = 1;
  const NODE_ATTRIBUTE = 2;
  const NODE_TEXT      = 3;
  const NODE_CDATA     = 4;
  const NODE_PI        = 7;
  const NODE_PROCESSINGINSTRUCTION = 7;
  const NODE_COMMENT   = 8;
  const NODE_DOCUMENT  = 9;
  /**@#-*/
  /**
   * Document declaration constants
   */
  const DDECL_VERSION = '1.0';
  /**
   * Default namespace
   */
  const DEF_NAMESPACE = 'http://www.w3.org/XML/1998/namespace';
  /**
   * Load a new EasyXML document
   *
   * An array of document declarations may be passed.
   * Example:
   * <code>
   * array('encoding'=>'iso-8859', 'standalone'=>'yes');
   * </code>
   * The version: 1.0 will be set by default.
   *
   * @param array document declarations [optional]
   * @return obj EassyXML document
   * @access public
   */
  static public function loadNew($aDDecl=array()) {
    // Document declarations
    // Hack so version is allways the first in the array
    $aNewDDecl['version'] = EasyXML::DDECL_VERSION;
    foreach ($aDDecl as $k=>$v) {
      $aNewDDecl[$k] = $v;
    }
    if ($oEasyXML = new EasyXML_Document($aNewDDecl)) {
      return $oEasyXML;
    } else {
      throw new EasyXML_Exception ('Could not create a new EasyXML document');
    }
  } // loadNew()
  /**
   * Load an EasyXML document from a string
   *
   * @param str xml string 
   * @return obj EasyXML document
   * @access public
   */
  static public function loadString($sXML) {
    if ($oDOM = new domDocument()) {
      $oDOM->preserveWhiteSpace = true;
      if ($oDOM->loadXML($sXML)) {
	return EasyXML::loadDOM($oDOM);
      }
    }
    throw new EasyXML_Exception('Error loading XML string');
  } // loadString()
  /**
   * Load an EasyXML document from DOM
   *
   * @param obj DOM document
   * @return obj EasyXML document
   * @access public
   */
  static public function loadDOM($oDOM) {
    if (($oEasyXML = EasyXML::loadNew()) && (EasyXML::_createDocument($oDOM, $oEasyXML))) {
      return $oEasyXML;
    } else {
      throw new EasyXML_Exception('Error loading DOM document');
    }
  } // loadDOM()
  /**
   * Load an EasyXML document from SimpleXML
   *
   * @param obj SimpleXML document
   * @return obj EasyXML document
   * @access public
   */
  static public function loadSimpleXML($oSXML) {
    $oDOM = dom_import_simplexml($oSXML);
    return EasyXML::loadDOM($oDOM);
  } // loadSimpleXML()
  /**
   * Create an EasyXML document object
   *
   * @param obj dom document
   * @param obj EasyXML document
   * @return bool
   * @access private
   */
  static private function _createDocument($oDOM, $oEasyXML, $oXP=NULL, $iNS=1) {
    if (!$aChilds = $oDOM->childNodes) {
      throw new EasyXML_Exception('Invalid XML document: no root node has been defined');
    }
    foreach ($aChilds as $oDomNode) {
      switch ($oDomNode->nodeType) {

      case XML_ELEMENT_NODE:
	// Create element node
	$oEasyNode = $oEasyXML->createElement($oDomNode->tagName);

	// Check for a namespace declaration in the element
	if (!$oXP) {
	  $oXP = new DOMXPath($oDOM);
	}
	if ($oList = $oXP->query('namespace::*', $oDomNode)) {
	  $i = 0;
	  foreach ($oList as $oNS) {
	    $i++;
	    if ($i>=$iNS) {
	      #echo 'NS: '.$item->nodeValue.'. Prefix: '.$item->prefix.' Node: '.$oDomNode->localName.' Node-NS: '.$oDomNode->namespaceURI.chr(10).chr(10);
	      $oEasyNode->createNamespace($oNS->nodeValue, $oNS->prefix);
	      $iNS++;
	    }
	  }
	}
	
	// Add element attributes
	foreach ($oDomNode->attributes as $n=>$v) {
	  $oEasyNode->createAttribute($n, $v->nodeValue);
	}
	// Create child nodes of the element
	EasyXML::_createDocument($oDomNode, $oEasyNode, $oXP, $iNS);
	break;

      case XML_ATTRIBUTE_NODE:
	// Attributes should be added when an element is added and this exception should therefor never be triggered.
	throw new EasyXML_Exception('Can not add an attribute node while outside an element');
	break;

      case XML_TEXT_NODE:
	// Create text node
	$oEasyXML->createText($oDomNode->nodeValue);
	break;

      case XML_CDATA_SECTION_NODE:
	// Create CDATA node
	$oEasyXML->createCDATA($oDomNode->nodeValue);
	break;
	
      case XML_COMMENT_NODE:
	// Create comment node
	$oEasyXML->createComment($oDomNode->nodeValue);
	break;

      default:
	// Throw exception if an unsupported node is hit
	throw new EasyXML_Exception('Unsupported node type in XML document');
      }
    }
    return true;
  } // _createDocument()
  /**
   * Print the XML document
   *
   * @param obj EasyXML object
   * @return void
   * @access public
   */
  static public function printXML($oXML) {
    // Set header and echo xml document
    header('Content-type: text/xml');
    echo $oXML->asXML();
  } // printXML()
  /**
   * Create XML entities
   *
   * Will convert the string to allowed entities
   *
   * @param str String
   * @return str String
   * @access public
   */
  static public function xmlEntities($sStr) {
    $sStr = preg_replace('/&amp;/', '&', $sStr);
    $sStr = htmlentities($sStr);
    return $sStr;
  } // xmlEntities()
  /**
   * Check for valid XML node names
   *
   * @param string Node name
   * @return bool
   * @access public
   */
  static public function validNodeName($sName) {
    // Check agianst empty name
    if (empty($sName)) {
      throw new EasyXML_Exception('XML node-name may not be an empty string');
    }
    // Check agianst the reserved name XML (x|X m|M l|L)
    if (preg_match('/^xml/i', $sName)) {
      throw new EasyXML_Exception('XML node-name cannot begin with xml, this is a reserved name');
    }
    // Check name syntax and chars
    if (!preg_match("/^[_a-z]{1}[_a-z0-9:.-]*$/i",$sName)) {
      throw new EasyXML_Exception('XML node-name syntax "'.$sName.'" is invalid');
    }
    return true;
  } // validNodeName()
} // EasyXML
?>

<?php
/**
 * EasyXML Document Node
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
 * EasyXML Document Node
 *
 * @author Ian Zerny
 */
class EasyXML_Document extends EasyXML_Element {
  /**
   * Document declaration
   * 
   * @var array
   * @access private
   */
  private $_aDDecl;
  /**
   * Constructor
   *
   * Sets the document declarations
   *
   * @param array document declarations
   * @return void
   * @access public
   */
  public function __construct($aDDecl) {
    $this->_aDDecl = $aDDecl;
  } // __construct()
  /**@#+
   * Unsupported methods
   */
  public function attributes() {
    throw new EasyXML_Exception(__METHOD__.' is not a supported method of EasyXML_Document');
  }
  public function name() { 
    throw new EasyXML_Exception(__METHOD__.' is not a supported method of EasyXML_Document');
  }
  public function createAttribute() {
    throw new EasyXML_Exception(__METHOD__.' is not a supported method of EasyXML_Document');
  }
  public function createText() {
    throw new EasyXML_Exception(__METHOD__.' is not a supported method of EasyXML_Document');
  }
  public function createCDATA() {
    throw new EasyXML_Exception(__METHOD__.' is not a supported method of EasyXML_Document');
  }
  /**@#-*/
  /**
   * Get the document as XML
   *
   * @return str document XML
   * @access public
   */
  public function asXML() {
    // Document declaration
    $sXML = '<?xml';
    foreach ($this->_aDDecl as $k=>$v) $sXML .= ' '.$k.'="'.$v.'"';
    $sXML .= '?>';
    // Add children as XML
    foreach ($this->_aChildOrder as $oChild) {
      $sXML .= $oChild->asXML();
    }
    return $sXML;
  } // asXML()
} // EasyXML_Document
?>
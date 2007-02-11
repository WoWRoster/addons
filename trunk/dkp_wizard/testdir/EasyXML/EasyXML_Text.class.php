<?php
/**
 * EasyXML Text - Easy XML Text node object.
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
 * EasyXML Text - Easy XML Text node object.
 *
 * @package EasyXML
 */
class EasyXML_Text extends EasyXML_Node {
  /**
   * Text value
   *
   * @var str
   * @access private
   * @see value()
   */
  private $_sText;
  /**
   * Constructor
   *
   * Optionaly sets the text value
   *
   * @param obj parent node
   * @param str text value [optional]
   * @return void
   * @access public
   */
  public function __construct($oParent, $sText='') {
    $this->_oParent = $oParent;
    $this->_sText = $sText;
  } // __construct()
  /**
   * Get/set the text value
   * 
   * @param str text value [optional]
   * @return str text value
   * @access public
   */
  public function value($sText=NULL) {
    if ($sText) {
      $this->_sText = $sText;
    }
    return $this->_sText;
  } // value()
  /**
   * Get node as xml data
   *
   * @return str text value
   * @access public
   */
  public function asXML() {
    return $this->_sText;
  } // asXML()
  /**
   * Get node as string
   *
   * @return str text value
   * @access public
   */
  function __toString() {
    return $this->_sText;
  } // __toString()
} // EasyXML_Text
?>
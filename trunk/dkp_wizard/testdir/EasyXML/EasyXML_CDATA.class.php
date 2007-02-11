<?php
/**
 * EasyXML CDATA node
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
 * EasyXML CDATA node
 *
 * @package EasyXML
 */
class EasyXML_CDATA extends EasyXML_Node {
  /**
   * CDATA content
   *
   * @var str
   * @access private
   */
  private $_sCDD;
  /**
   * Constructor
   *
   * Will set the CDATA content if passed
   *
   * @param obj parent node
   * @param str CDATA content [optional]
   * @return void
   * @access public
   */
  public function __construct($oParent, $sCDD = '') {
    $this->_oParent = $oParent;
    $this->_sCDD = $sCDD;
  } // __construct()
  /**
   * Get/set the CDATA content
   *
   * @param str CDATA content [optional]
   * @return str CDATA content
   * @access public
   */
  public function value($sCDD=NULL) {
    if ($sCDD) {
      $this->_sCDD = $sCDD;
    }
    return $this->_sCDD;
  } // value()
  /**
   * Get the node XML
   *
   * @return str node xml
   * @access public
   */
  public function asXML() {
    return '<![CDATA['.$this->_sCDD.']]>';
  } // asXML()
  /**
   * Base64 encode the CDATA content
   *
   * @return bool
   * @access public
   */
  public function bin64() {
    if ($this->_sCDD = base64_encode($this->_sCDD)) {
      return true;
    }
    return false;
  } // bin64()
  /**
   * Magic to string
   *
   * @return str CDATA content
   * @access public
   */
  public function __toString() {
    return $this->_sCDD;
  } // __toString()
} // EasyXML_CDATA
?>

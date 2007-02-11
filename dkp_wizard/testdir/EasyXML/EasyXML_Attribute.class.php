<?php
/**
 * EasyXML Attribute - Easy XML Attribute object.
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
 * EasyXML Attribute - Easy XML Attribute object.
 *
 * @package EasyXML
 */
class EasyXML_Attribute extends EasyXML_Node {
  /**
   * Attribute name and value
   *
   * @var str
   * @access private
   */
  private $_sName, $_sValue;
  /**
   * Constructor
   *
   * @param object parent node
   * @param str attribute name
   * @param str attribute value
   * @return void
   * @access public
   */
  public function __construct($oParent, $sName, $sValue) {
    $this->_oParent = $oParent;
    $this->_sName = $sName;
    $this->value($sValue);
  } // __construct()
  /**
   * Get the attribute name
   * 
   * @return str attribute name
   * @access public
   */
  public function name() {
    return $this->_sName;
  } // name()
  /**
   * Get and/or set attribute value
   *
   * @param str new attribute value [optional]
   * @return str attribute value
   * @access public
   */
  public function value($sValue=NULL) {
    if ($sValue) {
      $this->_sValue = EasyXML::xmlEntities($sValue);
    }
    return $this->_sValue;
  } // value()
  /**
   * Magic to string.
   *
   * Will return the attribute value
   *
   * @return str attribute value
   * @access unknown
   */
  function __toString() {
    return $this->_sValue;
  } // __toString()
  /**
   * Attribute as XML
   *
   * @return str attribute as XML
   * @access public
   */
  public function asXML() {
    return $this->_sName.'="'.$this->_sValue.'"';
  } // asXML()
} // EasyXML_Attribute
?>

<?php
/**
 * EasyXML Comment Node
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
 * EasyXML Comment Node
 * 
 * @author Ian Zerny
 */
class EasyXML_Comment extends EasyXML_Node {
  /**
   * Comment content
   *
   * @var str
   * @access private
   */
  private $_sCom;
  /**
   * Constructor
   *
   * Sets the comment content
   *
   * @param obj parent node
   * @param str comment [optional]
   * @return void
   * @access public
   */
  public function __construct($oParent, $sCom = '') {
    $this->_oParent = $oParent;
    $this->value($sCom);
  } // __construct()
  /**
   * Get/set comment value
   *
   * @param str comment [optional]
   * @return str comment
   * @access public
   */
  public function value($sCom=NULL) {
    if ($sCom) {
      $this->_sCom = $sCom;
    }
    return $this->_sCom;
  } // value()
  /**
   * Get node as XML
   *
   * @return str node xml
   * @access public
   */
  public function asXML() {
    return '<!--'.$this->_sCom.'-->';
  } // asXML()
  /**
   * Magic to string
   *
   * Will output the comment content
   *
   * @return comment content
   * @access public
   */
  public function __toString() {
    return $this->_sCom;
  } // __toString()
} // EasyXML_Comment
?>

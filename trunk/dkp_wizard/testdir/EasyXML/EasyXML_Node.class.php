<?php
/**
 * EasyXML Node - Abstract EasyXML Node base class
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
 * EasyXML Node - Abstract EasyXML Node base class
 *
 * @package EasyXML
 */
abstract class EasyXML_Node {
  /**
   * Parent node
   *
   * @var obj
   * @access protected
   */
  protected $_oParent = NULL;
  /**
   * Convert node object to XML string
   */
  abstract function asXML();
  /**
   * Node parent object
   */
  public function parent() {
    return $this->_oParent;
  } // parent()
  /**
   * Get the node type
   *
   * All node supported node types can be identified with the EasyXML::NODE_* constants.
   *
   * @return int node type
   * @access public
   */
  public function type() {
    $sC = strtoupper(get_class($this));
    $sC = substr($sC, 8);
    if (defined('EasyXML::NODE_'.$sC)) {
      return eval('return EasyXML::NODE_'.$sC.';');
    } else {
      throw new EasyXML_Exception('Undefined node type');
    }
  } // type()
} // EasyXML_Node
?>

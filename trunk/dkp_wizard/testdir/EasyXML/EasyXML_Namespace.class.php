<?php
/**
 * EasyXML Namespace object
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
 * EasyXML Namespace object
 *
 * @author Ian Zerny
 */
class EasyXML_Namespace extends EasyXML_Node {
  /**
   * Namespace prefix
   *
   * @var str
   * @access private
   */
  private $_sPrefix = NULL;
  /**
   * Namespace uri
   *
   * @var str
   * @access private
   */
  private $_sURI = EasyXML::DEF_NAMESPACE;
  /**
   * Constructor
   *
   * Set parent node, namespace uri and prefix
   *
   * @param obj parent node
   * @param str namespace uri [optional]
   * @param str namespace prefix [optional]
   * @return void
   * @access public
   */
  public function __construct($oParent, $sURI=NULL, $sPrefix=NULL) {
    $this->_oParent = $oParent;
    if ($sURI) $this->_sURI = $sURI;
    if ($sPrefix) $this->_sPrefix = $sPrefix;
  } // __construct()
  /**
   * Namespace as xml
   *
   * @return str namespace as xml
   * @access public
   */
  public function asXML() {
    $sNS = 'xmlns';
    if ($this->_sPrefix) $sNS .= ':'.$this->_sPrefix;
    $sNS .= '="'.$this->_sURI.'"';
    return $sNS;
  } // asXML()
  /**
   * get namespace prefix
   *
   * @retrun str namespace prefix OR NULL
   * @access public
   */
  public function prefix() {
    return $this->_sPrefix;
  } // prefix()
} // EasyXML_Namespace
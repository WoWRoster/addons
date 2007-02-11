<?php
/**
 * EasyXML Processing Instruction Node
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
 * EasyXML Processing Instruction Node
 * 
 * @package EasyXML
 */
class EasyXML_ProcessingInstruction extends EasyXML_Node {
  /**
   * Processing instruction target and value
   *
   * @var str
   * @access private
   */
  private $_PITarget, $_sCon;
  /**
   * Constructor
   *
   * Sets the processing instruction target and optional content
   *
   * @param obj parent node
   * @param str processing instruction target
   * @param str content [optional]
   * @return void
   * @access public
   */
  public function __construct($oParent, $sPITarget, $sCon = '') {
    $this->_oParent = $oParent;
    $this->_sPITaget = $sPITarget;
    $this->value($sCon);
  } // __construct()
  /**
   * Get/set content value
   *
   * @param str content [optional]
   * @return str content
   * @access public
   */
  public function value($sCon=NULL) {
    if ($sCon) {
      $this->_sCon = $sCon;
    }
    return $this->_sCon;
  } // value()
  /**
   * Get node as XML
   *
   * @return str node xml
   * @access public
   */
  public function asXML() {
    return '<?'.$this->_sPITarget.$this->_sCon.'?>';
  } // asXML()
  /**
   * Magic to string
   *
   * Will output the processing instruction content
   *
   * @return comment content
   * @access public
   */
  public function __toString() {
    return $this->_sCon;
  } // __toString()
  /**
   * Set PI Target
   *
   * @param str PI Target
   * @return bool
   * @access private
   */
  private function _setPITarget($sPITarget) {
    // Check target name
    if (preg_match('/^xml$/i', $sPITarget)) {
      throw new EasyXML_Exception('Processing instruction target cannot be xml, this is a reserved name');
      return false;
    }
    if (!EasyXML::validNodeName($sPITarget)) {
      throw new EasyXML_Exception('Invalid Processing instruction target "'.$mName.'"');
    }
    $this->_sPITarget = $sPITarget;
    return true;
  } // _setPITarget()
} // EasyXML_ProcessingInstruction
?>

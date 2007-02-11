<?php
/**
 * EasyXML Element - EasyXML Element node object
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
 * EasyXML Element - EasyXML Element node object
 *
 * @package EasyXML
 */
class EasyXML_Element extends EasyXML_Node implements ArrayAccess {
  /**
   * Element node name
   *
   * @var str
   * @access private
   * @see name()
   */
  private $_sName;
  private $_sPrefix = NULL;
  /**
   * Element children
   *
   * @var array
   * @access protected
   */
  protected $_aChildren = array();
  /**
   * Element children
   *
   * This array containes the children in the correct order.
   *
   * @var array
   * @access protected
   */
  protected $_aChildOrder = array();
  /**
   * Element attributes
   *
   * @var array
   * @access private
   */
  private $_aAttributes = array();
  /**
   * Element namespace object
   *
   * @var object
   * @access private
   */
  private $_oNS;
  /**
   * Declared namespace attributes in this node
   *
   * @var array
   * @access private
   */
  private $_aNSAtts = array();
  /**
   * Avalible namespaces
   *
   * @var array
   * @access private
   */
  private $_aNS = array();
  /**
   * Constructor
   *
   * Sets the element node-name
   *
   * Notice: the function will not validat the node-name and must therefor be sane. 
   *
   * Use EasyXML::validNodeName() to validate a xml node name.
   * This is done to reduce overhead, the constructor should under propper 
   * use only be called by <i>EasyXML_Element::createElement()</i> and that will auto check the node name.
   *
   * @param obj parent node
   * @param str element node-name 
   * @param array defined namespaces
   * @param mixed namespace prefix string OR the default namespace from the parent node [optional] will use the documents default namespace
   * @return void
   * @access public
   */
  public function __construct($oParent, $sName, $aNS, $mNS=NULL) {
    // Set parent referance
    $this->_oParent = $oParent;
    // Set defined namespaces array
    $this->_aNS = $aNS;
    // Set namespace
    if ($mNS) {
      if (is_string($mNS)) {
	// Create new namespace and set it
	if (strpos($sName,':') && $aName = explode(':',$sName)) {
	  $this->_oNS = $this->createNamespace($mNS, $aName[0]);
	} else {
	  $this->createNamespace($mNS, NULL);
	}
      } elseif (is_object($mNS)) {
	// Set the passed namespace
	$this->_oNS = $mNS;
      } else {
	throw new EasyXML_Exception('Invalid data type passed as namespace. arg(4) : $mNS');
      }
      $this->_setName($sName);
    } else {
      $this->_setName($sName);
      if ($this->_sPrefix) {
	// Set from existing namespace
	$this->_oNS = new EasyXML_Namespace($this, $this->_aNS[$this->_sPrefix], $this->_sPrefix);
      } else {
	// Create default namespace
	$this->_oNS = new EasyXML_Namespace($this);
      }
    }
  } // __construct()
  /**
   * Set the name of the node
   *
   * Will set check and set the namespace prefix if set
   *
   * @param str node name
   * @return void
   * @access private
   */
  function _setName($sName) {
    // Check name prefix
    if (strpos($sName,':')) {
      $aName = explode(':',$sName);
      if (!isset($this->_aNS[$aName[0]])) {
	throw new EasyXML_Exception('Namespace "'.$aName[0].'" is not defined or not accessible for this element node');
      }
      $this->_sName = $aName[1];
      $this->_sPrefix = $aName[0];
    } else {
      $this->_sName = $sName;      
    }
  } // _setName()
  /**
   * Get the node's namespace
   *
   * @return obj namespace
   * @access public
   */
  public function namespace() {
    return $this->_oNS;
  } // namespace()
  /**
   * Get attribut(s) of the element node
   *
   * If <b>$sAttName</b> is given only that attribute 
   * value will be returned.
   * If not an array of all the elements attributes will be returned.
   *
   * Returns false if no attributes are set.
   *
   * @param str attribute name [optional]
   * @return mixed value(s) of attribut(s)
   * @access public
   */
  public function attributes($sAttName=NULL) {
    if ($sAttName) {
      if (isset($this->_aAttributes[$sAttName])) {
	return $this->_aAttributes[$sAttName];
      } else {
	return false;
      }
    } else {
      return $this->_aAttributes;
    }
  } // attributes()
  /**
   * Get all children of the element.
   *
   * An optional argument provides the option to filter the result 
   * by fetching only children of the given type, or elements of the given name.
   *
   * If no filter is set an array of all children will be returned of false if no children exist.
   *
   * To filter for a type use one of the <b>EasyXML::NODE</b> type constants (EasyXML::NODE_TEXT).
   *
   * @param mixed filter [optional]
   * @return array child nodes
   * @access public
   */
  public function children($mFilter=NULL) {
    // Check if any children exist
    if (empty($this->_aChildren)) return array();
    // Filter return 
    if ($mFilter) {
      if (is_int($mFilter)) { 
	// Return nodes of a certain type
	if (isset($this->_aChildren[$mFilter])) {
	  return $this->_aChildren[$mFilter];
	}
      } elseif (isset($this->_aChildren[EasyXML::NODE_ELEMENT][$mFilter])) {
	// Return element nodes of a certian name
	return $this->_aChildren[EasyXML::NODE_ELEMENT][$mFilter];
      }
      return array();
    } else {
      // Return all children in the sorted array
      return $this->_aChildOrder;
    }
  } // children()
  /**
   * Get the element tag name
   * 
   * @return str tag name
   * @access public
   */
  public function name() {
    return $this->_sName;
  } // name()
  /**
   * Add one or more attributes to the element
   *
   * One attribute is added with <b>$mName</b> as attribute name and <b>$sValue</b> as the value.
   * 
   * To add several attributes to the element <b>$mName</b> must 
   * be a flat array sorted as <i>attribute_name => attribute_value</i>.
   *
   * @param mixed attribute name or array
   * @param str attribute value [optional]
   * @return bool
   * @access public
   */
  public function createAttribute($mName, $sValue='') {
    // Check for an array of childs
    if (is_array($mName)) {
      foreach ($mName as $k=>$v) {
	if (!$this->createAttribute($k, $v)) {
	  throw new EasyXML_Exception('Passed argument must be a valid array');
	}
      }
      return true;
    } else {
      // Check node name syntax
      if (!EasyXML::validNodeName($mName)) {
	throw new EasyXML_Exception('Invalid attribute node name "'.$mName.'"');
      }
      // Add new attribute object
      if ($this->_aAttributes[$mName] = new EasyXML_Attribute($this, $mName, $sValue)) {
	return $this->_aAttributes[$mName];
      }
      throw new EasyXML_Exception('Unable to add attribute "'.$mName.'" to node "'.$this->name().'"');
    }
  } // createAttribute()
  /**
   * Create a new child element
   *
   * @param str element tag name
   * @return obj new child element
   * @access public
   */
  public function createElement($sName, $sNS=NULL) {
    // Check node name syntax
    if (!EasyXML::validNodeName($sName)) {
      throw new EasyXML_Exception('Invalid element node name "'.$mName.'"');
    }
    // Check node name is not the same as a class property
    if (strpos($sName,':')) {
      $aName = explode(':',$sName);
      $sNameCopy = $aName[1];
    } else {
      $sNameCopy = $sName;
    }
    if ($sNameCopy[0] == '_') {
      $pat = '';
      $aRNames = array('sName','sPrefix','aChildren','aChildOrder','aAttributes','oNS','aNSAtts','aNS','oParent');
      foreach ($aRNames as $sRN) $pat .= '|^_'.$sRN.'$';
      $pat[0] = '/';
      if (preg_match($pat.'/', $sNameCopy)) {
	throw new EasyXML_Exception('Element node name: "'.$sNameCopy.'" is a reserved EasyXML name');
      }
    }
    // Namespace passing
    // All accessible namespaces
    $aNS = $this->_copyNS();
    // define a name space object or prefix to pass
    $mNS = NULL;
    if ($sNS) {
      $mNS = $sNS;
    } elseif ($this->parent() && $this->_oNS->prefix() === NULL) {
      $mNS = $this->_oNS;
    }
    // Create new child element
    $oChild = new EasyXML_Element($this, $sName, $aNS, $mNS);
    // Check namespace prefix
    if (strpos($sName,':')) {
      $aName = explode(':',$sName);
      $sName = $aName[1];
    }
    // Add child to this object
    // Replace '-' with '___' to avoid parse errors 
    // (this is only for the class property referance to the object)
    $sSafeName = preg_replace('/-/', '___', $sName);
    eval('$this->'.$sSafeName.'[] = $oChild;');
    $this->_aChildren[EasyXML::NODE_ELEMENT][$sName][] = $oChild;
    $this->_aChildOrder[] = $oChild;
    // Return child
    return $oChild;
  } // createElement()
  /**
   * Create a namespace attribute
   *
   * @param str namespace uri
   * @param str prefix [optional]
   * @return obj namespace object
   * @access public
   */
  public function createNamespace($sURI, $sPrefix=NULL) {
    $sP = ($sPrefix)?$sPrefix:0;
    if (isset($this->_aNSAtts[$sP])) {
      throw new EasyXML_Exception('Unalbe to redeclare xml namespaces');
    }
    $oNS = new EasyXML_Namespace($this, $sURI, $sPrefix);
    $this->_aNSAtts[$sP] = $oNS;
    if ($sPrefix) {
      $this->_aNS[$sPrefix] = $sURI;
    } else {
      $this->_oNS = $oNS;
    }
    return $oNS;
  }
  /**
   * Create a child text node
   *
   * @param str text
   * @return obj new child node
   * @access public
   */
  public function createText($sText) {
    $oChild = new EasyXML_Text($this, $sText);
    $this->_aChildren[EasyXML::NODE_TEXT][] = $oChild;
    $this->_aChildOrder[] = $oChild;
    return $oChild;
  } // createText()
  /**
   * Create a child comment node
   *
   * @param str comment
   * @return obj new child node
   * @access public
   */
  public function createComment($sCom) {
    $oChild = new EasyXML_Comment($this, $sCom);
    $this->_aChildren[EasyXML::NODE_COMMENT][] = $oChild;
    $this->_aChildOrder[] = $oChild;
    return $oChild;
  } // createComment()
  /**
   * Create a child CDATA node
   *
   * @param str CDATA
   * @return new child node
   * @access public
   */
  public function createCDATA($sCDD) {
    $oChild = new EasyXML_CDATA($this, $sCDD);
    $this->_aChildren[EasyXML::NODE_CDATA][] = $oChild;
    $this->_aChildOrder[] = $oChild;
    return $oChild;
  } // createCDATA()
  /**
   * Create a child processing instruction node
   *
   * @param str processing instruction target
   * @param str processing instruction value/content
   * @return new child node
   * @access public
   */
  public function createPI($sPITarget, $sValue='') {
    // Check target name    
    if (!EasyXML::validNodeName($sPITarget)) {
      throw new EasyXML_Exception('Invalid Processing instruction target "'.$sPITarget.'"');
    }
    $oChild = new EasyXML_ProcessingInstruction($this, $sPITarget, $sValue);
    $this->_aChildren[EasyXML::NODE_PI][] = $oChild;
    $this->_aChildOrder[] = $oChild;
    return $oChild;
  } // createPI()
  /**
   * Get a copy of the defiened namespaces
   *
   * @return array namespaces
   * @access private
   */
  private function _copyNS() {
    $aNewNS = array();
    foreach ($this->_aNS as $k=>$v) {
      $aNewNS[$k] = $v;
    }
    return $aNewNS;
  } // _copyNS()
  /**
   * Get the element as XML
   *
   * @return str node XML
   * @access public
   */
  public function asXML() {
    if ($this->_sPrefix) {
      $sName = $this->_sPrefix.':'.$this->_sName;
    } else {
      $sName = $this->_sName;
    }
    // Start this node
    $sXML = '<'.$sName;
    // Set namespace attributes
    foreach ($this->_aNSAtts as $oNS) {
      $sXML .= ' '.$oNS->asXML();
    }
    // Set attributes
    foreach ($this->_aAttributes as $oAtt) {
      $sXML .= ' '.$oAtt->asXML();
    }
    if (empty($this->_aChildOrder)) {
      // Close if no children
      $sXML .= '/>';
    } else {
      // Add children as XML
      $sXML .= '>';
      foreach ($this->_aChildOrder as $oChild) {
	$sXML .= $oChild->asXML();
      }
      // Close node
      $sXML .= '</'.$sName.'>';
    }
    return $sXML;
  } // asXML()
  /**
   * Magic to string
   *
   * Will output the element as a string.
   * All decenting nodes (elements, attributes, comments, cdata and text) will be output.
   *
   * @return str element children xml
   * @access public
   */
  public function __toString() {
    $sXML = '';
    foreach ($this->_aChildOrder as $oChild) {
      $sXML .= $oChild->asXML();
    }
    return $sXML;
  } // __toString()
  /**
   * ArrayAccess offsetExists implementation
   *
   * Checks if attribute <b>$sName</b> is set
   *
   * @param str attribute name
   * @return bool
   * @access public
   */  
  public function offsetExists($sName) {
    if (isset($this->_aAttributes[$sName])) {
      return true;
    }
    return false;
  } // offsetExists()
  /**
   * ArrayAccess offsetGet implementation
   *
   * Returns the attribute with name = <b>$sName</b>
   *
   * @param str attribute name
   * @return obj attribute node
   * @access public
   */
  public function offsetGet($sName) {
    return $this->attributes($sName);
  } // offsetGet()
  /**
   * ArrayAccess offsetSet implementation
   *
   * Set the attribute with name: <b>$sName</b> and value: <b>$sValue</b>
   *
   * @param str attribute name
   * @param str attribute value
   * @return void
   * @access public
   */
  public function offsetSet($sName, $sValue) {
    $this->createAttribute($sName, $sValue);
  } // offsetSet()
  /**
   * ArrayAccess offsetUnset implementation
   *
   * delete the attribute with name: <b>$sName</b>
   *
   * @param str attribute name
   * @return void
   * @access public
   */
  public function offsetUnset($sName) {
    unset($this->_aAttributes[$sName]);
  } // offsetUnset()
} // EasyXML_Element
?>

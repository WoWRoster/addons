<?php
/******************************
 * WoWRoster.net  Roster
 * Copyright 2002-2006
 * Licensed under the Creative Commons
 * "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * Short summary
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/
 *
 * Full license information
 *  http://creativecommons.org/licenses/by-nc-sa/2.5/legalcode
 * -----------------------------
 *
 * $Id$
 *
 ******************************/

//require_once('config.php');

class xml_string 
{
    var $xml;

    function xml_string($xmldata = '') 
    {

    }

    /**
     * Returns domxmlNode of rootnode in supplied xml string.
     *
     * @param string $xmldata
     * @return domxmlNode
     */
    function getRootNode($xmldata) 
    {
        $xmlstring = utf8_encode(str_replace(array("\n", "\r"), '', $xmldata));
        $p = new xmlParser();
        if($p->parse($xmlstring)) 
        {
            return $p->rootnodes[0];
        } 
        else 
        {
            return false;
        }
    }

    /**
     * Finds a tag or tags amongst the children of the node object or the rootnode of supplied xml string.
     *
     * @param string $tag
     * @param mixed $data
     * @return mixed (domxmlNode or array or domxmlNodes)
     */
    function get($tag, $data = null) 
    {
        $blocks = array();
        if(is_string($data)) 
        {
            $data = $this->getRootNode($xmldata);
        }


        foreach($data->children as $k => $child) 
        {
            if($child->tagname == $tag) 
            {
                $blocks[] = $child;
            }
        }

        if(count($blocks) > 1) 
        {
            return $blocks;
        } 
        elseif(count($blocks) == 1) 
        {
            return $blocks[0];
        } 
        else 
        {
            return null;
        }
    }
}

/**
 * Simple xml parser class
 */
class xmlParser  
{
   var $parser;
   var $stack;
   var $rootnodes;

   function xmlParser()
   {
       $this->parser = xml_parser_create();
       xml_parser_set_option($this->parser, XML_OPTION_CASE_FOLDING, false);
       xml_set_object($this->parser, $this);
       xml_set_element_handler($this->parser, "tag_open", "tag_close");
       xml_set_character_data_handler($this->parser, "cdata");
   }

   /**
    * Parse the supplied xml.
    *
    * @param string $data
    */
   function parse($data)
   {
       $this->stack = array();
       $this->rootnodes = array();
       $result = xml_parse($this->parser, $data);
       if(!$result) {
           $this->errorCode = xml_get_error_code($this->parser);
           $this->errorText = xml_error_string($this->parser);
           $this->errorLine = xml_get_current_line_number($this->parser).', '.xml_get_current_line_number;

       }
       return result;
   }

   /**
    * Tag open function
    *
    * @param resource $parser
    * @param string $tag
    * @param array $attributes
    */
   function tag_open($parser, $tag, $attributes)
   {
       $node = new xmlNode();
       $node->tagname=$tag;
       $node->attributes = $attributes;
       array_push($this->stack, $node);
   }

   /**
    * Tag open function
    *
    * @param resource $parser
    * @param string $cdata
    */
   function cdata($parser, $cdata)
   {
       $node = array_pop($this->stack);
       $node->text.=$cdata;
       array_push($this->stack, $node);
   }

   /**
    * Tag close function
    *
    * @param resource $parser
    * @param string $tag tagname
    */
   function tag_close($parser, $tag)
   {
       $node = array_pop($this->stack);
       if(count($this->stack)) 
       {
           $parent = array_pop($this->stack);
           $parent->children[]=$node;
           array_push($this->stack, $parent);
       } 
       else 
       {
           $this->rootnodes[] = $node;
       }
   }
}

/**
 * Dom like node class
 *
 */
class xmlNode 
{
    var $tagname = '';
    var $attributes = array();
    var $text = '';
    var $children = array();

    function get_content() 
    {
        return $this->text;
    }
}

?>

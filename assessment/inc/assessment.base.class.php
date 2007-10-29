<?php
/**
 * WoWRoster.net WoWRoster
 *
 * Assessment Library
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @package    Assessment
*/

if( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

class AssessmentBase {

	var $idNeeded = 0;
	var $id = 0;

	var $tableColRewrite = array();

	function get() {
		$this->_dbRead();
	}

	function set( &$data = array() ) {
		foreach ( $this->tableCols as &$col ) {
			$attribute = isset( $this->tableColRewrite[$col] ) ? $this->tableColRewrite[$col] : $col;
			if ( isset($data[$attribute])) {
				$this->$col = $data[$attribute];
			}
		}
		$this->_dbWrite();
	}
    /**
     * dbFunction Read
     *
     * @param string $string
     * @return string date
     */
	function _dbRead() {
        global $roster, $addon;

		$query = $this->_buildReadQuery();

		$ret;
		if ( $result = $roster->db->query($query) ) {
			if( $roster->db->num_rows($result) > 0 ) {
				$array = $roster->db->fetch_all();
				$set = $array['0'];
				foreach ( array_keys($set) as $key ) {
					if ( preg_match( '/^\d+$/', $key ) ) {
						continue;
					}
					$this->$key = $set[$key];
				}
				$roster->db->free_result($result);
			}
		} else {
			die_quietly($roster->db->error(),'Database Error',__FILE__,__LINE__,$query);
		}
	}

    /**
     * dbFunction Insert or Update
     *
     * @param string $string
     * @return string date
     */
	function _dbWrite() {
        global $roster, $addon;

		$query = $this->_buildWriteQuery();



		$ret;
		if ( !$roster->db->query($query) ) {
			die_quietly($roster->db->error(),'Database Error',__FILE__,__LINE__,$query);
		} else {
			if ( $this->idNeeded && $this->id == 0 ) {
				$query = "SELECT LAST_INSERT_ID();";
				if ( $roster->db->query($query) ) {
					$this->id = $roster->db->query_first($query);
				} else {
					die_quietly($roster->db->error(),'Database Error',__FILE__,__LINE__,$query);
				}
			}
		}
	}

    /**
     * dbHelperFunction
     *
     * @param string $string
     * @return string date
     */
	function _buildReadQuery() {
        global $roster, $addon;

		$query = "SELECT ";
		foreach ( $this->tableCols as $colName ) {
			$query .= "`". $colName. "`, ";
		}
		$query = preg_replace( '/, $/', ' ', $query );

		$query .= "FROM `". $roster->db->table( $this->tableName, 'assessment'). "` ";

		$where = "WHERE ";
		foreach ( $this->tableCols as $colName ) {
			$where .= preg_replace( '/, $/', ' AND ', $this->_isSet( $colName ));
		}
		$where = preg_replace( '/ AND $/', ' ', $where );

		$query .= $where;

		return $query;
	}

    /**
     * dbHelperFunction
     *
     * @param string $string
     * @return string date
     */
	function _buildWriteQuery() {
        global $roster, $addon;

		$query = "INSERT INTO`". $roster->db->table( $this->tableName, 'assessment'). "` ".
					"SET ";
		foreach ( $this->tableCols as $colName ) {
			$query .= $this->_isSet( $colName );
		}
		$query = preg_replace( '/, $/', ' ', $query );

		$query .= "ON DUPLICATE KEY UPDATE ";
		foreach ( $this->tableCols as $colName ) {
			if ( $colName == 'id' ) {
				continue;
			}
			$query .= $this->_isSet( $colName );
		}
		$query = preg_replace( '/, $/', ' ', $query );

		return $query;
	}

    /**
     * dbHelperFunction
     *
     * @param string $string
     * @return string date
     */
	function _isSet( $colName = false ) {
        global $roster, $addon;
		$ret = '';
		if ( $colName && $this->$colName != '' && !( $colName == 'id' && $this->$colName == 0  ) ) {
			$ret = "`". $colName. "`='". $roster->db->escape( $this->$colName ). "', ";
		}
		return $ret;
	}
    /**
     * helper function for debugging
     *
     * @param string $string
     * @return string date
     */
    function _debug( $level = 0, $ret = false, $info = false, $status = false ) {
        global $roster, $addon;

        if ( $level > $addon['config']['armorysync_debuglevel'] ) {
            return;
        }
        $timestamp = round((format_microtime() - ARMORYSYNC_STARTTIME), 4);
		if( version_compare(phpversion(), '4.3.0','>=') ) {
			$tmp = debug_backtrace();
			$trace = $tmp[1];
        }
        $array = array(
            'time' => $timestamp,
            'file' => isset($trace['file']) ? str_replace(ROSTER_BASE, '', $trace['file']) : 'armorysync.class.php',
            'line' => isset($trace['line']) ? $trace['line'] : '',
            'function' => isset($trace['function']) ? $trace['function'] : '',
            'class' => isset($trace['class']) ? $trace['class'] : '',
            //'object' => isset($trace['object']) ? $trace['object'] : '',
            //'type' => isset($trace['type']) ? $trace['class'] : '',
            'args' => ( $addon['config']['armorysync_debugdata'] != 0 && isset($trace['args']) && !is_object($trace['args']) ) ? $trace['args'] : '',
            'ret' => ( $addon['config']['armorysync_debugdata'] != 0 && isset($ret) && !is_object($ret)) ? $ret : '',
            'info' => isset($info) ? $info : '',
            'status' => isset($status) ? $status : '',
                                        );
        if ( !($level > $addon['config']['armorysync_debuglevel']) ) {
			$this->debugmessages[] = $array;
		}
		if ( $level == 0 ) {
			$this->errormessages[] = $array;
		}
    }
}

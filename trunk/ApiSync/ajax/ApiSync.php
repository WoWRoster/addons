<?php
/**
 * WoWRoster.net WoWRoster
 *
 * ApiSync ajax function for Status update
 *
 * LICENSE: Licensed under the Creative Commons
 *          "Attribution-NonCommercial-ShareAlike 2.5" license
 *
 * @copyright  2002-2007 WoWRoster.net
 * @license    http://creativecommons.org/licenses/by-nc-sa/2.5   Creative Commons "Attribution-NonCommercial-ShareAlike 2.5"
 * @version    SVN: $Id$
 * @link       http://www.wowroster.net
 * @since      File available since Release 2.6.0
 * @package    ApiSync
 * @subpackage Ajax
*/

if( !defined('IN_ROSTER') )
{
    exit('Detected invalid access to this file!');
}

switch ($method)
{
    case 'status_update':
        if( isset($_POST['job_id']) )
        {
            $job_id = $_POST['job_id'];
            require_once ($addon['dir'] . 'inc/ApiSyncjobajax.class.php');

            $job = new ApiSyncJobAjax();
            $ret = $job->startAjaxStatusUpdate();

            if ( isset( $ret['status'] ) ) {
                $status = $ret['status'];
            }
            if ( isset( $ret['errmsg'] ) ) {
                $errmsg = $ret['errmsg'];
            }
            if ( isset( $ret['result'] ) ) {
                $result = $ret['result'];
            }
            return;
        }
        else
        {
            $status = 104;
            $errmsg = 'Faild to update: Not enough data ( no job_id given) ';
            return;
        }
        break;
}

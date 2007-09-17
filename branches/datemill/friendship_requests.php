<?php
/******************************************************************************
Etano
===============================================================================
File:                       friendship_requests.php
$Revision$
Software by:                DateMill (http://www.datemill.com)
Copyright by:               DateMill (http://www.datemill.com)
Support at:                 http://www.datemill.com/forum
*******************************************************************************
* See the "docs/licenses/etano.txt" file for license.                         *
******************************************************************************/

require_once 'includes/common.inc.php';
db_connect(_DBHOST_,_DBUSER_,_DBPASS_,_DBNAME_);
require_once 'includes/user_functions.inc.php';
check_login_member('manage_networks');

$tpl=new phemplate($tplvars['tplrelpath'].'/','remove_nonjs');

$output=array();
$query="SELECT a.`nconn_id`,a.`fk_user_id`,b.`_user` as `user`,c.`network` FROM `{$dbtable_prefix}user_networks` a,`{$dbtable_prefix}user_profiles` b,`{$dbtable_prefix}networks` c WHERE a.`fk_user_id`=b.`fk_user_id` AND a.`fk_net_id`=c.`net_id` AND a.`fk_user_id_other`='".$_SESSION['user']['user_id']."' AND a.`nconn_status`=0";
if (!($res=@mysql_query($query))) {trigger_error(mysql_error(),E_USER_ERROR);}
$loop=array();
while ($rsrow=mysql_fetch_assoc($res)) {
	$rsrow['network']=sanitize_and_format($rsrow['network'],TYPE_STRING,$__field2format[TEXT_DB2DISPLAY]);
	$loop[]=$rsrow;
}

$output['return2me']='friendship_requests.php';
if (!empty($_SERVER['QUERY_STRING'])) {
	$output['return2me'].='?'.str_replace('&','&amp;',$_SERVER['QUERY_STRING']);
}
$output['return2me']=rawurlencode($output['return2me']);
$tpl->set_file('content','friendship_requests.html');
$tpl->set_var('output',$output);
$tpl->set_loop('loop',$loop);
$tpl->process('content','content',TPL_LOOP | TPL_NOLOOP);
$tpl->drop_loop('loop');
unset($loop);

$tplvars['title']='Connection Requests';
$tplvars['page_title']='Connection Requests';
$tplvars['page']='friendship_requests';
$tplvars['css']='friendship_requests.css';
include 'home_left.php';
include 'frame2.php';
<?php
/******************************************************************************
Etano
===============================================================================
File:                       admin/user_inbox.php
$Revision$
Software by:                DateMill (http://www.datemill.com)
Copyright by:               DateMill (http://www.datemill.com)
Support at:                 http://forum.datemill.com
*******************************************************************************
* See the "softwarelicense.txt" file for license.                             *
******************************************************************************/

require_once '../includes/common.inc.php';
db_connect(_DBHOSTNAME_,_DBUSERNAME_,_DBPASSWORD_,_DBNAME_);
require_once '../includes/admin_functions.inc.php';
allow_dept(DEPT_ADMIN);

$tpl=new phemplate('skin/','remove_nonjs');

if (!empty($_GET['uid'])) {
	$output['uid']=(int)$_GET['uid'];
	$output['o']=isset($_GET['o']) ? (int)$_GET['o'] : 0;
	$output['r']=isset($_GET['r']) ? (int)$_GET['r'] : current($accepted_results_per_page);
	$output['user']=get_user_by_userid($output['uid']);
	$output['return']=sanitize_and_format_gpc($_GET,'return',TYPE_STRING,$__field2format[FIELD_TEXTFIELD],'');

	$where="`fk_user_id`='".$output['uid']."' AND `del`=0";
	$from="`{$dbtable_prefix}user_inbox`";

	$query="SELECT count(*) FROM $from WHERE $where";
	if (!($res=@mysql_query($query))) {trigger_error(mysql_error(),E_USER_ERROR);}
	$totalrows=mysql_result($res,0,0);

	$loop=array();
	if (!empty($totalrows)) {
		$config=get_site_option(array('date_format'),'core');
		$query="SELECT `mail_id`,`fk_user_id_other`,`_user_other`,`subject`,UNIX_TIMESTAMP(`date_sent`) as `date_sent`,`message_type` FROM $from WHERE $where ORDER BY `date_sent` ASC LIMIT ".$output['o'].','.$output['r'];
		if (!($res=@mysql_query($query))) {trigger_error(mysql_error(),E_USER_ERROR);}
		$i=0;
		while ($rsrow=mysql_fetch_assoc($res)) {
			$rsrow['_user_other']=sanitize_and_format($rsrow['_user_other'],TYPE_STRING,$__field2format[TEXT_DB2DISPLAY]);
			$rsrow['subject']=sanitize_and_format($rsrow['subject'],TYPE_STRING,$__field2format[TEXT_DB2DISPLAY]);
			$rsrow['date_sent']=strftime($config['date_format'],$rsrow['date_sent']);
			$rsrow['myclass']=($i%2) ? 'odd_item' : 'even_item';
			if ($rsrow['message_type']==MESS_SYSTEM || empty($rsrow['fk_user_id_other'])) {
				unset($rsrow['fk_user_id_other']);
			}
			$loop[]=$rsrow;
			++$i;
		}
		$output['pager2']=pager($totalrows,$output['o'],$output['r']);
	}

	$tpl->set_file('content','user_inbox.html');
	$tpl->set_loop('loop',$loop);
	$tpl->set_var('output',$output);
	$tpl->process('content','content',TPL_LOOP | TPL_NOLOOP | TPL_OPTLOOP);
	$tpl->drop_loop('loop');
	unset($loop);
}

$tplvars['title']='User Inbox';
$tplvars['page']='user_inbox';
include 'frame.php';
?>
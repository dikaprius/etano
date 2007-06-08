<?php
/******************************************************************************
newdsb
===============================================================================
File:                       processors/blog_delete.php
$Revision: 67 $
Software by:                DateMill (http://www.datemill.com)
Copyright by:               DateMill (http://www.datemill.com)
Support at:                 http://forum.datemill.com
*******************************************************************************
* See the "softwarelicense.txt" file for license.                             *
******************************************************************************/

require_once '../includes/sessions.inc.php';
require_once '../includes/vars.inc.php';
db_connect(_DBHOSTNAME_,_DBUSERNAME_,_DBPASSWORD_,_DBNAME_);
require_once '../includes/classes/phemplate.class.php';
require_once '../includes/user_functions.inc.php';
check_login_member('write_blogs');

if (is_file(_BASEPATH_.'/events/processors/blog_delete.php')) {
	include_once _BASEPATH_.'/events/processors/blog_delete.php';
}

$topass=array();
$blog_id=isset($_GET['bid']) ? (int)$_GET['bid'] : 0;

$query="SELECT `post_id` FROM `{$dbtable_prefix}blog_posts` WHERE `fk_blog_id`='$blog_id' AND `fk_user_id`='".$_SESSION['user']['user_id']."'";
if (!($res=@mysql_query($query))) {trigger_error(mysql_error(),E_USER_ERROR);}
$post_ids=array();
for ($i=0;$i<mysql_num_rows($res);++$i) {
	$post_ids[]=mysql_result($res,$i,0);
}
$query="DELETE FROM `{$dbtable_prefix}blog_comments` WHERE `fk_parent_id` IN ('".join("','",$post_ids)."')";
if (isset($_on_before_delete)) {
	for ($i=0;isset($_on_before_delete[$i]);++$i) {
		eval($_on_before_delete[$i].'();');
	}
}
if (!($res=@mysql_query($query))) {trigger_error(mysql_error(),E_USER_ERROR);}

$query="DELETE FROM `{$dbtable_prefix}blog_posts` WHERE `fk_user_id`='".$_SESSION['user']['user_id']."' AND `fk_blog_id`='$blog_id'";
if (!($res=@mysql_query($query))) {trigger_error(mysql_error(),E_USER_ERROR);}

$query="DELETE FROM `{$dbtable_prefix}user_blogs` WHERE `blog_id`='$blog_id' AND `fk_user_id`='".$_SESSION['user']['user_id']."'";
if (!($res=@mysql_query($query))) {trigger_error(mysql_error(),E_USER_ERROR);}

$topass['message']['type']=MESSAGE_INFO;
$topass['message']['text']='Blog and all related posts and comments deleted.';     // translate

$nextpage='my_blogs.php';
if (isset($_POST['return']) && !empty($_POST['return'])) {
	$input['return']=sanitize_and_format_gpc($_POST,'return',TYPE_STRING,$__field2format[FIELD_TEXTFIELD] | FORMAT_RUDECODE,'');
	$nextpage=$input['return'];
}
if (isset($_on_after_delete)) {
	for ($i=0;isset($_on_after_delete[$i]);++$i) {
		eval($_on_after_delete[$i].'();');
	}
}
$nextpage=_BASEURL_.'/'.$nextpage;
redirect2page($nextpage,$topass,'',true);
?>
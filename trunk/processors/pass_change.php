<?php
/******************************************************************************
newdsb
===============================================================================
File:                       processors/pass_change.php
$Revision: 91 $
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

$error=false;
$qs='';
$qs_sep='';
$topass=array();
$nextpage='pass_change.php';
if ($_SERVER['REQUEST_METHOD']=='POST') {
	$input=array();
// get the input we need and sanitize it
	$input['uid']=sanitize_and_format_gpc($_POST,'uid',TYPE_INT,0,0);
	$input['user']=strtolower(sanitize_and_format_gpc($_POST,'user',TYPE_STRING,$__html2format[HTML_TEXTFIELD],''));
	$input['pass']=sanitize_and_format_gpc($_POST,'pass',TYPE_STRING,$__html2format[HTML_TEXTFIELD],'');
	$input['pass2']=sanitize_and_format_gpc($_POST,'pass2',TYPE_STRING,$__html2format[HTML_TEXTFIELD],'');
	$input['secret']=sanitize_and_format_gpc($_POST,'secret',TYPE_STRING,$__html2format[HTML_TEXTFIELD],'');

	if ($input['pass']!=$input['pass2']) {
		$error=true;
		$topass['message']['type']=MESSAGE_ERROR;
		$topass['message']['text'][]="The passwords do not match.";
		$input['error_pass']='red_border';
	}
	if (empty($input['pass'])) {
		$error=true;
		$topass['message']['type']=MESSAGE_ERROR;
		$topass['message']['text'][]="Please enter the password.";
		$input['error_pass']='red_border';
	}
	if (empty($input['uid']) || empty($input['secret'])) {
		$error=true;
		$topass['message']['type']=MESSAGE_ERROR;
		$topass['message']['text'][]="Invalid parameters received.";
	}
	if (get_site_option('use_captcha','core')) {
		$captcha=sanitize_and_format_gpc($_POST,'captcha',TYPE_STRING,$__html2format[HTML_TEXTFIELD],'');
		if (!$error && (!isset($_SESSION['captcha_word']) || strcasecmp($captcha,$_SESSION['captcha_word'])!=0)) {
			$error=true;
			$topass['message']['type']=MESSAGE_ERROR;
			$topass['message']['text'][]="The verification code doesn't match. Please enter the new code.";
			$input['error_captcha']='red_border';
		}
	}
	unset($_SESSION['captcha_word']);

	if (!$error) {
		$query="UPDATE ".USER_ACCOUNTS_TABLE." SET `pass`=md5('".$input['pass']."') WHERE `user_id`='".$input['uid']."' AND `user`='".$input['user']."' AND `temp_pass`='".$input['secret']."'";
		if (!($res=@mysql_query($query))) {trigger_error(mysql_error(),E_USER_ERROR);}
		$topass['message']['type']=MESSAGE_INFO;
		$topass['message']['text']='Password changed.';     // translate
		$nextpage='info.php';
	} else {
// 		you must re-read all textareas from $_POST like this:
//		$input['x']=addslashes_mq($_POST['x']);
		$input=sanitize_and_format($input,TYPE_STRING,FORMAT_HTML2TEXT_FULL | FORMAT_STRIPSLASH);
		$topass['input']=$input;
	}
}
redirect2page($nextpage,$topass,$qs);
?>
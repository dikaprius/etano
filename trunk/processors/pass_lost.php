<?php
/******************************************************************************
newdsb
===============================================================================
File:                       processors/pass_lost.php
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
$nextpage='pass_lost.php';
if ($_SERVER['REQUEST_METHOD']=='POST') {
	$input=array();
// get the input we need and sanitize it
	$input['email']=strtolower(sanitize_and_format_gpc($_POST,'email',TYPE_STRING,$__html2format[HTML_TEXTFIELD],''));
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
		$query="SELECT `user_id`,`user` FROM ".USER_ACCOUNTS_TABLE." WHERE `email`='".$input['email']."' LIMIT 1";
		if (!($res=@mysql_query($query))) {trigger_error(mysql_error(),E_USER_ERROR);}
		if (mysql_num_rows($res)) {
			list($input['uid'],$input['user'])=mysql_fetch_row($res);
			$input['temp_pass']=md5(gen_pass(6));
			$input['ipaddr']=$_SERVER['REMOTE_ADDR'];
			$query="UPDATE ".USER_ACCOUNTS_TABLE." SET `temp_pass`='".$input['temp_pass']."' WHERE `user_id`='".$input['uid']."'";
			if (!($res=@mysql_query($query))) {trigger_error(mysql_error(),E_USER_ERROR);}
			send_template_email($input['email'],sprintf('%s password reset confirmation',_SITENAME_),'pass_reset.html',get_my_skin(),$input);
			$topass['message']['type']=MESSAGE_INFO;
			$topass['message']['text']='An email with steps required to reset your password was sent to your address.';     // translate
		} else {
			$topass['message']['type']=MESSAGE_ERROR;
			$topass['message']['text']='The email address you entered was not found.';     // translate
		}
	} else {
// 		you must re-read all textareas from $_POST like this:
//		$input['x']=addslashes_mq($_POST['x']);
		$input=sanitize_and_format($input,TYPE_STRING,FORMAT_HTML2TEXT_FULL | FORMAT_STRIPSLASH);
		$topass['input']=$input;
	}
}
redirect2page($nextpage,$topass,$qs);
?>
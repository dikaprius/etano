<?php
/******************************************************************************
newdsb
===============================================================================
File:                       admin/processors/file_edit.php
$Revision: 67 $
Software by:                DateMill (http://www.datemill.com)
Copyright by:               DateMill (http://www.datemill.com)
Support at:                 http://forum.datemill.com
*******************************************************************************
* See the "softwarelicense.txt" file for license.                             *
******************************************************************************/

require_once '../../includes/sessions.inc.php';
require_once '../../includes/classes/phemplate.class.php';
require_once '../../includes/vars.inc.php';
require_once '../includes/admin_functions.inc.php';
db_connect(_DBHOSTNAME_,_DBUSERNAME_,_DBPASSWORD_,_DBNAME_);
allow_dept(DEPT_ADMIN);

$error=false;
$qs='';
$qs_sep='';
$topass=array();
if ($_SERVER['REQUEST_METHOD']=='POST') {
	$input=array();
	$input['file']=str_replace('..','',preg_replace('~[^a-zA-Z0-9\._/-]~','',sanitize_and_format_gpc($_POST,'file',TYPE_STRING,$__html2format[_HTML_TEXTFIELD_],'')));
	$input['file_content']=preg_replace('/\r/m','',sanitize_and_format_gpc($_POST,'file_content',TYPE_STRING,FORMAT_STRIP_MQ));
	if (!empty($input['file']) && $input['file']{0}=='/') {
		$input['file']=substr($input['file'],1);
	}

	if (empty($input['file'])) {
		$error=true;
		$topass['message']['type']=MESSAGE_ERROR;
		$topass['message']['text']='No file selected';
	}

	if (!$error) {
		require_once '../../includes/classes/modman.class.php';
		$modman=new modman();
		$modman->fileop->file_put_contents(_BASEPATH_.'/'.$input['file'],$input['file_content']);

		$topass['message']['type']=MESSAGE_INFO;
		$topass['message']['text']='File saved successfully';
		$qs.=$qs_sep.'path='.urlencode(str_replace(strrchr($input['file'],'/'),'',$input['file']));
	}
}
redirect2page('admin/file_browser.php',$topass,$qs);
?>
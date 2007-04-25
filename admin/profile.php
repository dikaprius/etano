<?php
/******************************************************************************
newdsb
===============================================================================
File:                       admin/profile.php
$Revision$
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
require_once '../includes/admin_functions.inc.php';
allow_dept(DEPT_MODERATOR | DEPT_ADMIN);

$tpl=new phemplate('skin/','remove_nonjs');

$search_md5=sanitize_and_format_gpc($_GET,'search',TYPE_STRING,$__field2format[FIELD_TEXTFIELD],'');
$uid=0;
if (isset($_GET['uid']) && !empty($_GET['uid'])) {
	$uid=(int)$_GET['uid'];
	if (!empty($search_md5) && isset($_GET['go']) && ($_GET['go']==1 || $_GET['go']==-1)) {
		$query="SELECT `results` FROM `{$dbtable_prefix}site_searches` WHERE `search_md5`='$search_md5'";
		if (!($res=@mysql_query($query))) {trigger_error(mysql_error(),E_USER_ERROR);}
		if (mysql_num_rows($res)) {
			$user_ids=mysql_result($res,0,0);
			$user_ids=explode(',',$user_ids);
			$key=array_search($uid,$user_ids)+$_GET['go'];
			if (isset($user_ids[$key])) {
				$uid=(int)$user_ids[$key];
			}
		}
	}
} else {
	$topass['message']['type']=MESSAGE_ERROR;
	$topass['message']['text']='No user selected';
	redirect2page('admin/cpanel.php',$topass);
}

$categs=array();
$profile=array();
$account=array();
$query="SELECT * FROM `{$dbtable_prefix}user_profiles` WHERE `fk_user_id`='$uid'";
if (!($res=@mysql_query($query))) {trigger_error(mysql_error(),E_USER_ERROR);}
if (mysql_num_rows($res)) {
	$profile=mysql_fetch_assoc($res);
	if (empty($profile['del'])) {
		unset($profile['del']);
	}
	$c=0;
	foreach ($_pcats as $pcat_id=>$pcat) {
		$categs[$c]['pcat_name']=$pcat['pcat_name'];
		$cat_content=array();
		for ($i=0;isset($pcat['fields'][$i]);++$i) {
			$field=$_pfields[$pcat['fields'][$i]];
			$cat_content[$i]['label']=$field['label'];
			switch ($field['html_type']) {

				case FIELD_TEXTFIELD:
					$cat_content[$i]['field']=sanitize_and_format($profile[$field['dbfield']],TYPE_STRING,$__field2format[TEXT_DB2DISPLAY]);
					break;

				case FIELD_TEXTAREA:
					$cat_content[$i]['field']=sanitize_and_format($profile[$field['dbfield']],TYPE_STRING,$__field2format[TEXT_DB2DISPLAY]);
					break;

				case FIELD_SELECT:
					$cat_content[$i]['field']=sanitize_and_format($field['accepted_values'][$profile[$field['dbfield']]],TYPE_STRING,$__field2format[TEXT_DB2DISPLAY]);
					break;

				case FIELD_CHECKBOX_LARGE:
					$cat_content[$i]['field']=sanitize_and_format(vector2string_str($field['accepted_values'],$profile[$field['dbfield']]),TYPE_STRING,$__field2format[TEXT_DB2DISPLAY]);
					break;

				case FIELD_DATE:
					$cat_content[$i]['field']=sanitize_and_format($profile[$field['dbfield']],TYPE_STRING,$__field2format[TEXT_DB2DISPLAY]);
					break;

				case FIELD_LOCATION:
					$cat_content[$i]['field']=db_key2value("`{$dbtable_prefix}loc_countries`",'`country_id`','`country`',$profile[$field['dbfield'].'_country'],'-');
					if (!empty($profile[$field['dbfield'].'_state'])) {
						$cat_content[$i]['field'].=' / '.db_key2value("`{$dbtable_prefix}loc_states`",'`state_id`','`state`',$profile[$field['dbfield'].'_state'],'-');
					}
					if (!empty($profile[$field['dbfield'].'_city'])) {
						$cat_content[$i]['field'].=' / '.db_key2value("`{$dbtable_prefix}loc_cities`",'`city_id`','`city`',$profile[$field['dbfield'].'_city'],'-');
					}
					break;

			}
		}
		$categs[$c]['cat_content']=$cat_content;
		++$c;
	}
	if (!empty($profile['_photo']) && is_file(_PHOTOPATH_.'/t1/'.$profile['_photo']) && is_file(_PHOTOPATH_.'/t2/'.$profile['_photo']) && is_file(_PHOTOPATH_.'/'.$profile['_photo'])) {
		$profile['has_photo']=true;
	}
	if ($profile['status']==STAT_PENDING) {
		$profile['pending']=true;
	} elseif ($profile['status']==STAT_EDIT) {
		$profile['need_edit']=true;
	} elseif ($profile['status']==STAT_APPROVED) {
		$profile['approved']=true;
	}

	$query="SELECT * FROM ".USER_ACCOUNTS_TABLE." WHERE `user_id`='$uid'";
	if (!($res=@mysql_query($query))) {trigger_error(mysql_error(),E_USER_ERROR);}
	$account=mysql_fetch_assoc($res);
	$account['status']=vector2options($accepted_astats,$account['status']);
	$account['skin']=dbtable2options("`{$dbtable_prefix}modules` a,`{$dbtable_prefix}site_options3` b",'a.`module_code`','b.`config_value`','b.`config_value`',$account['skin'],"a.`module_code`=b.`fk_module_code` AND a.`module_type`='".MODULE_SKIN."' AND b.`config_option`='skin_name'");
}

$tplvars['pic_width']=get_site_option('pic_width','core_photo');

$tpl->set_file('content','profile.html');
$tpl->set_loop('categs',$categs);
$tpl->set_var('profile',$profile);
$tpl->set_var('account',$account);
if (!empty($search_md5)) {
	$tpl->set_var('search_md5',$search_md5);
}
if (isset($_GET['o'])) {
	$tpl->set_var('o',$_GET['o']);
}
if (isset($_GET['r'])) {
	$tpl->set_var('r',$_GET['r']);
}
$return='profile.php';
if (!empty($_SERVER['QUERY_STRING'])) {
	$return.='?'.$_SERVER['QUERY_STRING'];
}
$tpl->set_var('return',rawurlencode($return));
$tpl->process('content','content',TPL_MULTILOOP | TPL_OPTIONAL);
$tpl->drop_loop('categs');

$tplvars['title']=sprintf('%1$s Member Profile',$profile['_user']);
$tplvars['css']='profile.css';
include 'frame.php';
?>
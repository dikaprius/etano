<?php
/******************************************************************************
Etano
===============================================================================
File:                       plan-comparision-chart.php
$Revision: 207 $
Software by:                DateMill (http://www.datemill.com)
Copyright by:               DateMill (http://www.datemill.com)
Support at:                 http://www.datemill.com/forum
*******************************************************************************
* See the "docs/licenses/etano.txt" file for license.                         *
******************************************************************************/

require_once 'includes/common.inc.php';
db_connect(_DBHOST_,_DBUSER_,_DBPASS_,_DBNAME_);
require_once 'includes/user_functions.inc.php';

$tpl=new phemplate($tplvars['tplrelpath'].'/','remove_nonjs');

$query="SELECT `m_name`,`m_value` FROM `{$dbtable_prefix}memberships` WHERE `m_value`<>1 ORDER BY `m_value`";
if (!($res=@mysql_query($query))) {trigger_error(mysql_error(),E_USER_ERROR);}
$rows=array();
$i=0;
$rows[0]['class']='header';
$rows[0]['level_diz']='';
$memberships=array();
$cols=array();
while ($rsrow=mysql_fetch_assoc($res)) {
	$memberships[]=$rsrow['m_value'];
	$cols[]['content']=$rsrow['m_name'];
}
$rows[0]['cols']=$cols;

$query="SELECT `level_diz`,`level` FROM `{$dbtable_prefix}access_levels` WHERE `level_code`<>'login'";
if (!($res=@mysql_query($query))) {trigger_error(mysql_error(),E_USER_ERROR);}
$j=1;
while ($rsrow=mysql_fetch_assoc($res)) {
	$cols=array();
	$rows[$j]['level_diz']=$rsrow['level_diz'];
	for ($i=0;isset($memberships[$i]);++$i) {
		if ($rsrow['level']&$memberships[$i]) {
			$cols[]['content']='<img src="'.$tplvars['tplrelpath'].'/images/check.gif" />';
		} else {
			$cols[]['content']='&nbsp;';
		}
	}
	$rows[$j]['cols']=$cols;
	++$j;
}
$tpl->set_file('content','plan-comparision-chart.html');
$tpl->set_loop('rows',$rows);
$tpl->process('content','content',TPL_MULTILOOP);

$tplvars['title']='Compare Memberships';
$tplvars['page_title']='Compare Memberships';
$tplvars['page']='plan';
$tplvars['css']='plan-comparision-chart.css';
$no_timeout=true;
include 'frame.php';

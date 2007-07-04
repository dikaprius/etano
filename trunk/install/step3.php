<?php
/******************************************************************************
Etano
===============================================================================
File:                       install/step3.php
$Revision: 193 $
Software by:                DateMill (http://www.datemill.com)
Copyright by:               DateMill (http://www.datemill.com)
Support at:                 http://forum.datemill.com
*******************************************************************************
* See the "softwarelicense.txt" file for license.                             *
******************************************************************************/

require_once '../includes/sessions.inc.php';
require_once '../includes/sco_functions.inc.php';
require_once '../includes/classes/phemplate.class.php';

$output=array();
$tpl=new phemplate('skin/','remove_nonjs');
$tpl->set_file('content','step3.html');

$tplvars=array();
$tplvars['page_title']='Etano Install Process';
$tplvars['css']='step3.css';
$tplvars['page']='step3';
$tpl->set_var('output',$output);
$tpl->set_var('tplvars',$tplvars);
$tpl->process('content','content');
include 'frame.php';
?>
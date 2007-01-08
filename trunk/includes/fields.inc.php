<?php
$_pfields[1]['label']=$_lang[501];
$_pfields[1]['html_type']=3;
$_pfields[1]['searchable']=true;
$_pfields[1]['search_type']=10;
$_pfields[1]['search_label']=$_lang[502];
$_pfields[1]['reg_page']=1;
$_pfields[1]['required']=true;
$_pfields[1]['editable']=true;
$_pfields[1]['visible']=true;
$_pfields[1]['dbfield']='field_46';
$_pfields[1]['fk_pcat_id']=1;
$_pfields[1]['accepted_values']=array('-','Man','Woman','&#039;&quot;');
$_pfields[1]['default_value']=array();
$_pfields[1]['help_text']=$_lang[503];

$_pfields[2]['label']=$_lang[504];
$_pfields[2]['html_type']=10;
$_pfields[2]['searchable']=true;
$_pfields[2]['search_type']=10;
$_pfields[2]['search_label']=$_lang[505];
$_pfields[2]['reg_page']=1;
$_pfields[2]['required']=true;
$_pfields[2]['editable']=true;
$_pfields[2]['visible']=true;
$_pfields[2]['dbfield']='field_47';
$_pfields[2]['fk_pcat_id']=1;
$_pfields[2]['accepted_values']=array('-','Men','Women');
$_pfields[2]['default_value']=array('2');
$_pfields[2]['help_text']=$_lang[506];

$_pfields[3]['label']=$_lang[507];
$_pfields[3]['html_type']=103;
$_pfields[3]['searchable']=true;
$_pfields[3]['search_type']=103;
$_pfields[3]['search_label']=$_lang[508];
$_pfields[3]['reg_page']=1;
$_pfields[3]['required']=true;
$_pfields[3]['editable']=true;
$_pfields[3]['visible']=true;
$_pfields[3]['dbfield']='field_48';
$_pfields[3]['fk_pcat_id']=1;
$_pfields[3]['accepted_values']=array('-','1950','1988');
$_pfields[3]['default_value']=array('18','35');
$_pfields[3]['help_text']=$_lang[509];

$_pfields[4]['label']=$_lang[516];
$_pfields[4]['html_type']=107;
$_pfields[4]['searchable']=true;
$_pfields[4]['search_type']=107;
$_pfields[4]['search_label']=$_lang[517];
$_pfields[4]['reg_page']=1;
$_pfields[4]['required']=true;
$_pfields[4]['editable']=true;
$_pfields[4]['visible']=true;
$_pfields[4]['dbfield']='field_50';
$_pfields[4]['fk_pcat_id']=1;
$_pfields[4]['fn_on_change']='update_location';
$_pfields[4]['default_value']=array('218');
$_pfields[4]['help_text']=$_lang[518];

$_pfields[5]['label']=$_lang[520];
$_pfields[5]['html_type']=3;
$_pfields[5]['searchable']=true;
$_pfields[5]['search_type']=3;
$_pfields[5]['search_label']=$_lang[521];
$_pfields[5]['editable']=true;
$_pfields[5]['visible']=true;
$_pfields[5]['dbfield']='f51';
$_pfields[5]['fk_pcat_id']=5;
$_pfields[5]['accepted_values']=array('-','1m','1,2m','1,4m','1,5m','1,6m','1,7m');
$_pfields[5]['default_value']=array();
$_pfields[5]['help_text']=$_lang[522];

$_pfields[6]['label']=$_lang[523];
$_pfields[6]['html_type']=3;
$_pfields[6]['searchable']=true;
$_pfields[6]['search_type']=3;
$_pfields[6]['search_label']=$_lang[524];
$_pfields[6]['editable']=true;
$_pfields[6]['visible']=true;
$_pfields[6]['dbfield']='f52';
$_pfields[6]['fk_pcat_id']=5;
$_pfields[6]['accepted_values']=array('-','50kg','55kg','60kg','100kg');
$_pfields[6]['default_value']=array();
$_pfields[6]['help_text']=$_lang[525];

$_pfields[7]['label']=$_lang[526];
$_pfields[7]['html_type']=3;
$_pfields[7]['searchable']=true;
$_pfields[7]['search_type']=3;
$_pfields[7]['search_label']=$_lang[527];
$_pfields[7]['editable']=true;
$_pfields[7]['visible']=true;
$_pfields[7]['dbfield']='f53';
$_pfields[7]['fk_pcat_id']=5;
$_pfields[7]['accepted_values']=array('-','Petite','Slim','Overweight','Muscular');
$_pfields[7]['default_value']=array();
$_pfields[7]['help_text']=$_lang[528];

$_pfields[8]['label']=$_lang[529];
$_pfields[8]['html_type']=3;
$_pfields[8]['editable']=true;
$_pfields[8]['visible']=true;
$_pfields[8]['dbfield']='f54';
$_pfields[8]['fk_pcat_id']=1;
$_pfields[8]['accepted_values']=array('-','Blue','Red','Brown','Black','Yellow');
$_pfields[8]['default_value']=array();
$_pfields[8]['help_text']=$_lang[531];

$_pfields[9]['label']=$_lang[532];
$_pfields[9]['html_type']=10;
$_pfields[9]['editable']=true;
$_pfields[9]['visible']=true;
$_pfields[9]['dbfield']='f55';
$_pfields[9]['fk_pcat_id']=1;
$_pfields[9]['accepted_values']=array('-','Romanian','American','Mexican','Sarmale','Spicy','Ciorba','Borsh');
$_pfields[9]['default_value']=array();
$_pfields[9]['help_text']=$_lang[534];


$_pcats[1]['pcat_name']=$_lang[500];
$_pcats[1]['access_level']=7;
$_pcats[1]['fields']=array(1,2,3,4,8,9);
$_pcats[5]['pcat_name']=$_lang[519];
$_pcats[5]['access_level']=7;
$_pcats[5]['fields']=array(5,6,7);

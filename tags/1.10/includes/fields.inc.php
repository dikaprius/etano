<?php
if (!defined('_LICENSE_KEY_')) {
	die('Hacking attempt');
}

$GLOBALS['_pfields'][1]['label']=$GLOBALS['_lang'][2282];
$GLOBALS['_pfields'][1]['field_type']=FIELD_SELECT;
$GLOBALS['_pfields'][1]['searchable']=true;
$GLOBALS['_pfields'][1]['search_type']=FIELD_CHECKBOX_LARGE;
$GLOBALS['_pfields'][1]['search_label']=$GLOBALS['_lang'][2283];
$GLOBALS['_pfields'][1]['reg_page']=1;
$GLOBALS['_pfields'][1]['required']=true;
$GLOBALS['_pfields'][1]['editable']=true;
$GLOBALS['_pfields'][1]['visible']=true;
$GLOBALS['_pfields'][1]['dbfield']='f1';
$GLOBALS['_pfields'][1]['fk_pcat_id']=6;
$GLOBALS['_pfields'][1]['accepted_values']=array('',$GLOBALS['_lang'][2280],$GLOBALS['_lang'][2281]);
$GLOBALS['_pfields'][1]['default_value']=array(1);
$GLOBALS['_pfields'][1]['default_search']=array(2);
$GLOBALS['_pfields'][1]['help_text']=$GLOBALS['_lang'][2284];

$GLOBALS['_pfields'][2]['label']=$GLOBALS['_lang'][2287];
$GLOBALS['_pfields'][2]['field_type']=FIELD_CHECKBOX_LARGE;
$GLOBALS['_pfields'][2]['searchable']=true;
$GLOBALS['_pfields'][2]['search_type']=FIELD_CHECKBOX_LARGE;
$GLOBALS['_pfields'][2]['search_label']=$GLOBALS['_lang'][2288];
$GLOBALS['_pfields'][2]['reg_page']=1;
$GLOBALS['_pfields'][2]['required']=true;
$GLOBALS['_pfields'][2]['editable']=true;
$GLOBALS['_pfields'][2]['visible']=true;
$GLOBALS['_pfields'][2]['dbfield']='f2';
$GLOBALS['_pfields'][2]['fk_pcat_id']=6;
$GLOBALS['_pfields'][2]['accepted_values']=array('',$GLOBALS['_lang'][2285],$GLOBALS['_lang'][2286]);
$GLOBALS['_pfields'][2]['default_value']=array(2);
$GLOBALS['_pfields'][2]['default_search']=array(1);
$GLOBALS['_pfields'][2]['help_text']=$GLOBALS['_lang'][2289];

$GLOBALS['_pfields'][3]['label']=$GLOBALS['_lang'][2290];
$GLOBALS['_pfields'][3]['field_type']=FIELD_DATE;
$GLOBALS['_pfields'][3]['searchable']=true;
$GLOBALS['_pfields'][3]['search_type']=FIELD_RANGE;
$GLOBALS['_pfields'][3]['search_label']=$GLOBALS['_lang'][2291];
$GLOBALS['_pfields'][3]['reg_page']=1;
$GLOBALS['_pfields'][3]['editable']=true;
$GLOBALS['_pfields'][3]['visible']=true;
$GLOBALS['_pfields'][3]['dbfield']='f3';
$GLOBALS['_pfields'][3]['fk_pcat_id']=6;
$GLOBALS['_pfields'][3]['accepted_values']=array('','1930','1989');
$GLOBALS['_pfields'][3]['default_search']=array(18,75);
$GLOBALS['_pfields'][3]['help_text']=$GLOBALS['_lang'][2292];

$GLOBALS['_pfields'][4]['label']=$GLOBALS['_lang'][2293];
$GLOBALS['_pfields'][4]['field_type']=FIELD_LOCATION;
$GLOBALS['_pfields'][4]['searchable']=true;
$GLOBALS['_pfields'][4]['search_type']=FIELD_LOCATION;
$GLOBALS['_pfields'][4]['search_label']=$GLOBALS['_lang'][2294];
$GLOBALS['_pfields'][4]['reg_page']=1;
$GLOBALS['_pfields'][4]['editable']=true;
$GLOBALS['_pfields'][4]['visible']=true;
$GLOBALS['_pfields'][4]['dbfield']='f4';
$GLOBALS['_pfields'][4]['fk_pcat_id']=6;
$GLOBALS['_pfields'][4]['fn_on_change']='update_location';
$GLOBALS['_pfields'][4]['default_value']=array('218');
$GLOBALS['_pfields'][4]['default_search']=array();
$GLOBALS['_pfields'][4]['help_text']=$GLOBALS['_lang'][2295];

$GLOBALS['_pfields'][5]['label']=$GLOBALS['_lang'][2296];
$GLOBALS['_pfields'][5]['field_type']=FIELD_TEXTAREA;
$GLOBALS['_pfields'][5]['search_label']=$GLOBALS['_lang'][2297];
$GLOBALS['_pfields'][5]['reg_page']=2;
$GLOBALS['_pfields'][5]['editable']=true;
$GLOBALS['_pfields'][5]['visible']=true;
$GLOBALS['_pfields'][5]['dbfield']='f5';
$GLOBALS['_pfields'][5]['fk_pcat_id']=6;
$GLOBALS['_pfields'][5]['help_text']=$GLOBALS['_lang'][2298];

$GLOBALS['_pfields'][6]['label']=$GLOBALS['_lang'][2308];
$GLOBALS['_pfields'][6]['field_type']=FIELD_SELECT;
$GLOBALS['_pfields'][6]['searchable']=true;
$GLOBALS['_pfields'][6]['search_type']=FIELD_CHECKBOX_LARGE;
$GLOBALS['_pfields'][6]['search_label']=$GLOBALS['_lang'][2309];
$GLOBALS['_pfields'][6]['reg_page']=2;
$GLOBALS['_pfields'][6]['editable']=true;
$GLOBALS['_pfields'][6]['visible']=true;
$GLOBALS['_pfields'][6]['dbfield']='f6';
$GLOBALS['_pfields'][6]['fk_pcat_id']=7;
$GLOBALS['_pfields'][6]['accepted_values']=array('',$GLOBALS['_lang'][2299],$GLOBALS['_lang'][2300],$GLOBALS['_lang'][2301],$GLOBALS['_lang'][2302],$GLOBALS['_lang'][2303],$GLOBALS['_lang'][2304],$GLOBALS['_lang'][2305],$GLOBALS['_lang'][2306],$GLOBALS['_lang'][2307]);
$GLOBALS['_pfields'][6]['default_value']=array();
$GLOBALS['_pfields'][6]['default_search']=array();
$GLOBALS['_pfields'][6]['help_text']=$GLOBALS['_lang'][2310];

$GLOBALS['_pfields'][7]['label']=$GLOBALS['_lang'][2323];
$GLOBALS['_pfields'][7]['field_type']=FIELD_SELECT;
$GLOBALS['_pfields'][7]['searchable']=true;
$GLOBALS['_pfields'][7]['search_type']=FIELD_RANGE;
$GLOBALS['_pfields'][7]['search_label']=$GLOBALS['_lang'][2324];
$GLOBALS['_pfields'][7]['reg_page']=2;
$GLOBALS['_pfields'][7]['editable']=true;
$GLOBALS['_pfields'][7]['visible']=true;
$GLOBALS['_pfields'][7]['dbfield']='f7';
$GLOBALS['_pfields'][7]['fk_pcat_id']=7;
$GLOBALS['_pfields'][7]['accepted_values']=array('',$GLOBALS['_lang'][2311],$GLOBALS['_lang'][2312],$GLOBALS['_lang'][2313],$GLOBALS['_lang'][2314],$GLOBALS['_lang'][2315],$GLOBALS['_lang'][2316],$GLOBALS['_lang'][2317],$GLOBALS['_lang'][2318],$GLOBALS['_lang'][2319],$GLOBALS['_lang'][2320],$GLOBALS['_lang'][2321],$GLOBALS['_lang'][2322],$GLOBALS['_lang'][2326],$GLOBALS['_lang'][2327]);
$GLOBALS['_pfields'][7]['default_value']=array();
$GLOBALS['_pfields'][7]['default_search']=array(1,14);
$GLOBALS['_pfields'][7]['help_text']=$GLOBALS['_lang'][2325];

$GLOBALS['_pfields'][8]['label']=$GLOBALS['_lang'][2337];
$GLOBALS['_pfields'][8]['field_type']=FIELD_SELECT;
$GLOBALS['_pfields'][8]['searchable']=true;
$GLOBALS['_pfields'][8]['search_type']=FIELD_CHECKBOX_LARGE;
$GLOBALS['_pfields'][8]['search_label']=$GLOBALS['_lang'][2338];
$GLOBALS['_pfields'][8]['reg_page']=2;
$GLOBALS['_pfields'][8]['editable']=true;
$GLOBALS['_pfields'][8]['visible']=true;
$GLOBALS['_pfields'][8]['dbfield']='f8';
$GLOBALS['_pfields'][8]['fk_pcat_id']=7;
$GLOBALS['_pfields'][8]['accepted_values']=array('',$GLOBALS['_lang'][2328],$GLOBALS['_lang'][2329],$GLOBALS['_lang'][2330],$GLOBALS['_lang'][2331],$GLOBALS['_lang'][2332],$GLOBALS['_lang'][2333],$GLOBALS['_lang'][2334],$GLOBALS['_lang'][2335],$GLOBALS['_lang'][2336]);
$GLOBALS['_pfields'][8]['default_value']=array();
$GLOBALS['_pfields'][8]['default_search']=array();
$GLOBALS['_pfields'][8]['help_text']=$GLOBALS['_lang'][2339];

$GLOBALS['_pfields'][9]['label']=$GLOBALS['_lang'][2346];
$GLOBALS['_pfields'][9]['field_type']=FIELD_SELECT;
$GLOBALS['_pfields'][9]['searchable']=true;
$GLOBALS['_pfields'][9]['search_type']=FIELD_SELECT;
$GLOBALS['_pfields'][9]['search_label']=$GLOBALS['_lang'][2347];
$GLOBALS['_pfields'][9]['reg_page']=2;
$GLOBALS['_pfields'][9]['editable']=true;
$GLOBALS['_pfields'][9]['visible']=true;
$GLOBALS['_pfields'][9]['dbfield']='f9';
$GLOBALS['_pfields'][9]['fk_pcat_id']=7;
$GLOBALS['_pfields'][9]['accepted_values']=array('',$GLOBALS['_lang'][2340],$GLOBALS['_lang'][2341],$GLOBALS['_lang'][2342],$GLOBALS['_lang'][2343],$GLOBALS['_lang'][2344],$GLOBALS['_lang'][2345]);
$GLOBALS['_pfields'][9]['default_value']=array();
$GLOBALS['_pfields'][9]['default_search']=array();
$GLOBALS['_pfields'][9]['help_text']=$GLOBALS['_lang'][2348];

$GLOBALS['_pfields'][10]['label']=$GLOBALS['_lang'][2358];
$GLOBALS['_pfields'][10]['field_type']=FIELD_SELECT;
$GLOBALS['_pfields'][10]['searchable']=true;
$GLOBALS['_pfields'][10]['search_type']=FIELD_CHECKBOX_LARGE;
$GLOBALS['_pfields'][10]['search_label']=$GLOBALS['_lang'][2359];
$GLOBALS['_pfields'][10]['reg_page']=2;
$GLOBALS['_pfields'][10]['editable']=true;
$GLOBALS['_pfields'][10]['visible']=true;
$GLOBALS['_pfields'][10]['dbfield']='f10';
$GLOBALS['_pfields'][10]['fk_pcat_id']=7;
$GLOBALS['_pfields'][10]['accepted_values']=array('',$GLOBALS['_lang'][2349],$GLOBALS['_lang'][2350],$GLOBALS['_lang'][2351],$GLOBALS['_lang'][2352],$GLOBALS['_lang'][2353],$GLOBALS['_lang'][2354],$GLOBALS['_lang'][2355],$GLOBALS['_lang'][2356],$GLOBALS['_lang'][2357]);
$GLOBALS['_pfields'][10]['default_value']=array();
$GLOBALS['_pfields'][10]['default_search']=array();
$GLOBALS['_pfields'][10]['help_text']=$GLOBALS['_lang'][2360];

$GLOBALS['_pfields'][11]['label']=$GLOBALS['_lang'][2364];
$GLOBALS['_pfields'][11]['field_type']=FIELD_SELECT;
$GLOBALS['_pfields'][11]['searchable']=true;
$GLOBALS['_pfields'][11]['search_type']=FIELD_CHECKBOX_LARGE;
$GLOBALS['_pfields'][11]['search_label']=$GLOBALS['_lang'][2365];
$GLOBALS['_pfields'][11]['reg_page']=2;
$GLOBALS['_pfields'][11]['editable']=true;
$GLOBALS['_pfields'][11]['visible']=true;
$GLOBALS['_pfields'][11]['dbfield']='f11';
$GLOBALS['_pfields'][11]['fk_pcat_id']=8;
$GLOBALS['_pfields'][11]['accepted_values']=array('',$GLOBALS['_lang'][2361],$GLOBALS['_lang'][2362],$GLOBALS['_lang'][2363]);
$GLOBALS['_pfields'][11]['default_value']=array();
$GLOBALS['_pfields'][11]['default_search']=array();
$GLOBALS['_pfields'][11]['help_text']=$GLOBALS['_lang'][2366];

$GLOBALS['_pfields'][12]['label']=$GLOBALS['_lang'][2370];
$GLOBALS['_pfields'][12]['field_type']=FIELD_SELECT;
$GLOBALS['_pfields'][12]['searchable']=true;
$GLOBALS['_pfields'][12]['search_type']=FIELD_CHECKBOX_LARGE;
$GLOBALS['_pfields'][12]['search_label']=$GLOBALS['_lang'][2371];
$GLOBALS['_pfields'][12]['reg_page']=2;
$GLOBALS['_pfields'][12]['editable']=true;
$GLOBALS['_pfields'][12]['visible']=true;
$GLOBALS['_pfields'][12]['dbfield']='f12';
$GLOBALS['_pfields'][12]['fk_pcat_id']=8;
$GLOBALS['_pfields'][12]['accepted_values']=array('',$GLOBALS['_lang'][2367],$GLOBALS['_lang'][2368],$GLOBALS['_lang'][2369]);
$GLOBALS['_pfields'][12]['default_value']=array();
$GLOBALS['_pfields'][12]['default_search']=array();
$GLOBALS['_pfields'][12]['help_text']=$GLOBALS['_lang'][2372];

$GLOBALS['_pfields'][13]['label']=$GLOBALS['_lang'][2378];
$GLOBALS['_pfields'][13]['field_type']=FIELD_SELECT;
$GLOBALS['_pfields'][13]['searchable']=true;
$GLOBALS['_pfields'][13]['search_type']=FIELD_SELECT;
$GLOBALS['_pfields'][13]['search_label']=$GLOBALS['_lang'][2379];
$GLOBALS['_pfields'][13]['reg_page']=2;
$GLOBALS['_pfields'][13]['editable']=true;
$GLOBALS['_pfields'][13]['visible']=true;
$GLOBALS['_pfields'][13]['dbfield']='f13';
$GLOBALS['_pfields'][13]['fk_pcat_id']=8;
$GLOBALS['_pfields'][13]['accepted_values']=array('',$GLOBALS['_lang'][2373],$GLOBALS['_lang'][2374],$GLOBALS['_lang'][2375],$GLOBALS['_lang'][2376],$GLOBALS['_lang'][2377]);
$GLOBALS['_pfields'][13]['default_value']=array();
$GLOBALS['_pfields'][13]['default_search']=array();
$GLOBALS['_pfields'][13]['help_text']=$GLOBALS['_lang'][2380];

$GLOBALS['_pfields'][14]['label']=$GLOBALS['_lang'][2385];
$GLOBALS['_pfields'][14]['field_type']=FIELD_SELECT;
$GLOBALS['_pfields'][14]['searchable']=true;
$GLOBALS['_pfields'][14]['search_type']=FIELD_SELECT;
$GLOBALS['_pfields'][14]['search_label']=$GLOBALS['_lang'][2386];
$GLOBALS['_pfields'][14]['reg_page']=2;
$GLOBALS['_pfields'][14]['editable']=true;
$GLOBALS['_pfields'][14]['visible']=true;
$GLOBALS['_pfields'][14]['dbfield']='f14';
$GLOBALS['_pfields'][14]['fk_pcat_id']=9;
$GLOBALS['_pfields'][14]['accepted_values']=array('',$GLOBALS['_lang'][2381],$GLOBALS['_lang'][2382],$GLOBALS['_lang'][2383],$GLOBALS['_lang'][2384]);
$GLOBALS['_pfields'][14]['default_value']=array();
$GLOBALS['_pfields'][14]['default_search']=array();
$GLOBALS['_pfields'][14]['help_text']=$GLOBALS['_lang'][2387];

$GLOBALS['_pfields'][15]['label']=$GLOBALS['_lang'][2395];
$GLOBALS['_pfields'][15]['field_type']=FIELD_CHECKBOX_LARGE;
$GLOBALS['_pfields'][15]['searchable']=true;
$GLOBALS['_pfields'][15]['search_type']=FIELD_CHECKBOX_LARGE;
$GLOBALS['_pfields'][15]['search_label']=$GLOBALS['_lang'][2396];
$GLOBALS['_pfields'][15]['reg_page']=2;
$GLOBALS['_pfields'][15]['editable']=true;
$GLOBALS['_pfields'][15]['visible']=true;
$GLOBALS['_pfields'][15]['dbfield']='f15';
$GLOBALS['_pfields'][15]['fk_pcat_id']=9;
$GLOBALS['_pfields'][15]['accepted_values']=array('',$GLOBALS['_lang'][2388],$GLOBALS['_lang'][2389],$GLOBALS['_lang'][2390],$GLOBALS['_lang'][2391],$GLOBALS['_lang'][2392],$GLOBALS['_lang'][2393],$GLOBALS['_lang'][2394]);
$GLOBALS['_pfields'][15]['default_value']=array();
$GLOBALS['_pfields'][15]['default_search']=array();
$GLOBALS['_pfields'][15]['help_text']=$GLOBALS['_lang'][2397];


$GLOBALS['_pcats'][6]['pcat_name']=$GLOBALS['_lang'][2275];
$GLOBALS['_pcats'][6]['access_level']=7;
$GLOBALS['_pcats'][6]['fields']=array(1,2,3,4,5);
$GLOBALS['_pcats'][7]['pcat_name']=$GLOBALS['_lang'][2276];
$GLOBALS['_pcats'][7]['access_level']=7;
$GLOBALS['_pcats'][7]['fields']=array(6,7,8,9,10);
$GLOBALS['_pcats'][8]['pcat_name']=$GLOBALS['_lang'][2277];
$GLOBALS['_pcats'][8]['access_level']=7;
$GLOBALS['_pcats'][8]['fields']=array(11,12,13);
$GLOBALS['_pcats'][9]['pcat_name']=$GLOBALS['_lang'][2278];
$GLOBALS['_pcats'][9]['access_level']=7;
$GLOBALS['_pcats'][9]['fields']=array(14,15);

$basic_search_fields=array(1,2,3,4);

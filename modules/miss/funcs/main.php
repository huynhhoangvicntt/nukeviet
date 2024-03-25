<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VSOFT (http://vsoft.com.vn)
 * @Copyright (C) 2024 VSOFT. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Wed, 20 Mar 2024 17:01:50 GMT
 */

if ( ! defined( 'NV_IS_MOD_MISS' ) ) die( 'Stop!!!' );

$page_title = $module_info['custom_title'];
$key_words = $module_info['keywords'];

$array_data = array();


$xtpl = new XTemplate( $op . '.tpl', NV_ROOTDIR . '/themes/' . $module_info['template'] . '/modules/' . $module_file );
$xtpl->assign( 'LANG', $lang_module );

$xtpl->assign( 'DATA', $array_data );
$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';

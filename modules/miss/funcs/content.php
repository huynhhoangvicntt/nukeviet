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

if ($nv_Request->get_int('save', 'post') == '1') {
    $row['title'] = nv_substr($nv_Request->get_title('title', 'post', ''), 0, 250);
    $row['alias'] = $nv_Request->get_title('alias', 'post', '');
    $row['alias'] = empty($row['alias']) ? change_alias($row['title']) : change_alias($row['alias']);
    if (!empty($page_config['alias_lower'])) {
        $row['alias'] = strtolower($row['alias']);
    }
    $row['alias'] = nv_substr($row['alias'], 0, 250);
    
    $image = $nv_Request->get_string('image', 'post', '');
    if (nv_is_file($image, NV_UPLOADS_DIR . '/' . $module_upload)) {
        $row['image'] = substr($image, strlen(NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/'));
    } else {
        $row['image'] = '';
    }
}

if (!empty($row['image']) and is_file(NV_UPLOADS_REAL_DIR . '/' . $module_upload . '/' . $row['image'])) {
    $row['image'] = NV_BASE_SITEURL . NV_UPLOADS_DIR . '/' . $module_upload . '/' . $row['image'];
}

$xtpl = new XTemplate('content.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign( 'LANG', $lang_module );

$xtpl->assign('UPLOADS_DIR_USER', NV_UPLOADS_DIR . '/' . $module_upload);
$xtpl->assign( 'DATA', $array_data );
$xtpl->parse( 'main' );
$contents = $xtpl->text( 'main' );

include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme( $contents );
include NV_ROOTDIR . '/includes/footer.php';

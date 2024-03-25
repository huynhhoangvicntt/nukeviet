<?php

/**
 * NukeViet Content Management System
 * @version 4.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2021 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_IS_FILE_ADMIN')) {
    exit('Stop!!!');
}

$page_title = $lang_module['list'];
$array = [];

global $on_page;
$per_page = 8;
$page = $nv_Request->get_int('page', 'get', 0);
//Gọi csdl để lấy dữ liệu
//$$query = $db->query('SELECT * FROM ' . $db_config['prefix'] . '_' . $lang . '_' . $module_data . '_missworld');
$num_items = $db->query('SELECT COUNT(*) as num FROM ' . NV_PREFIXLANG . '_missworld')->fetchColumn();

$query = $db->query('SELECT * FROM ' . NV_PREFIXLANG . '_missworld LIMIT ' . ($per_page * $page) . ', ' . $per_page);
while ($row = $query->fetch()){
    $array[$row['id']] = $row;
}

$xtpl = new XTemplate('main.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('GLANG', $lang_global);

//$num_items = tổng số row
//$per_page: số row hiển thị trên 1 trang
$base_url = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name. '&' . NV_OP_VARIABLE. '=main';
$nv_generate_page = nv_generate_page($base_url, $num_items, $per_page, $on_page);
$xtpl->assign('NV_GENERATE_PAGE', $nv_generate_page);

//Hiển thị dữ liệu
if(!empty($array)){
    foreach($array as $value){
    $value['birthday'] = nv_date('d/m/Y', $value['birthday']);
    $value['url_edit'] = NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name. '&' . NV_OP_VARIABLE. '=add&id='.$value['id'];
    $value['avatar'] = NV_BASE_SITEURL . NV_UPLOADS_DIR. '/' . $module_upload. '/' . $value['avatar'];
    $xtpl->assign('DATA', $value);
    $xtpl->parse('main.loop');
    }
}
$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';

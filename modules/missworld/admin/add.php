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
$row = [];

if ($nv_Request->isset_request('submit1', 'post')){
    $row['name'] = nv_substr($nv_Request->get_title('name', 'post', ''), 0, 250);
    $row['birthday'] = $nv_Request->get_int('birthday', 'post', '');
    $row['avatar'] = nv_substr($nv_Request->get_title('avatar', 'post', ''), 0, 250);
    $row['avatar'] = $nv_Request->get_title('image', 'post', '');
    
    if (isset($_FILES, $_FILES['uploadfile'], $_FILES['uploadfile']['tmp_name']) and is_uploaded_file($_FILES['uploadfile']['tmp_name'])) {
        // Khởi tạo Class upload
        $upload = new NukeViet\Files\Upload($admin_info['allow_files_type'], $global_config['forbid_extensions'], $global_config['forbid_mimes'], NV_UPLOAD_MAX_FILESIZE, NV_MAX_WIDTH, NV_MAX_HEIGHT);
        
        // Thiết lập ngôn ngữ, nếu không có dòng này thì ngôn ngữ trả về toàn tiếng Anh
        $upload->setLanguage($lang_global);
        
        // Tải file lên server       
        $upload_info = $upload->save_file($_FILES['uploadfile'], NV_UPLOADS_REAL_DIR. '/' . $module_upload, false, $global_config['nv_auto_resize']);
        if(empty($upload_info['error'])){
            //Xử lý lưu dữ liệu
            $_sql = 'INSERT INTO ' . NV_PREFIXLANG . '_' . $module_data . ' (
                name, birthday, avatar) VALUES (
                :name, :birthday, :avatar)';
            
            $sth = $db->prepare($_sql);
            $sth->bindParam(':name', $row['name'], PDO::PARAM_STR);
            $sth->bindParam(':birthday', $row['birthday'], PDO::PARAM_STR);
            $sth->bindParam(':avatar', $upload_info['basename'], PDO::PARAM_STR);
            $exe = $sth->execute();
            if($exe){
                nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name);
             }
        }  
    }  
}

$xtpl = new XTemplate('add.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign('LANG', $lang_module);
$xtpl->assign('GLANG', $lang_global);


$xtpl->parse('main');
$contents = $xtpl->text('main');

include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';

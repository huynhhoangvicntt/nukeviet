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

$path = nv_check_path_upload($nv_Request->get_string('path', 'post'));
$check_allow_upload_dir = nv_check_allow_upload_dir($path);

if (!isset($check_allow_upload_dir['create_file'])) {
    exit('ERROR_' . $lang_module['notlevel']);
}

$file = htmlspecialchars(trim($nv_Request->get_string('file', 'post')), ENT_QUOTES);
$file = basename($file);

if (empty($file) or !nv_is_file(NV_BASE_SITEURL . $path . '/' . $file, $path)) {
    exit('ERROR_' . $lang_module['errorNotSelectFile']);
}

$newfile = preg_replace('/\.[^.]+$/', '.jpg', $file);

$result = nv_extract_video_image(NV_ROOTDIR . '/' . $path . '/' . $file);
if ($result !== 'OK') {
    exit($result);
}

if (isset($array_dirname[$path])) {
    $did = $array_dirname[$path];
    $info = nv_getFileInfo($path, $newfile);
    $info['userid'] = $admin_info['userid'];

    $sql = 'SELECT * FROM ' . NV_UPLOAD_GLOBALTABLE . '_file WHERE did = ' . $did . " AND title='" . $newfile . "'";
    $result = $db->query($sql);

    if ($result->rowCount() == 0) {
        $db->query('INSERT INTO ' . NV_UPLOAD_GLOBALTABLE . '_file 
            (name, ext, type, filesize, src, srcwidth, srcheight, sizes, userid, mtime, did, title) 
            VALUES 
            (\'' . $info['name'] . '\', \'' . $info['ext'] . '\', \'' . $info['type'] . '\', ' . $info['filesize'] . ',
            \'' . $info['src'] . '\', ' . $info['srcwidth'] . ', ' . $info['srcheight'] . ', \'' . $info['size'] . '\',
            ' . $info['userid'] . ', ' . $info['mtime'] . ', ' . $did . ', \'' . $newfile . '\')');
    } else {
        $db->query('UPDATE ' . NV_UPLOAD_GLOBALTABLE . '_file SET 
            filesize=' . $info['filesize'] . ', src=\'' . $info['src'] . '\', 
            srcwidth=' . $info['srcwidth'] . ', srcheight=' . $info['srcheight'] . ',
            sizes=\'' . $info['size'] . '\', userid=' . $admin_info['userid'] . ', 
            mtime=' . $info['mtime'] . ' 
            WHERE did = ' . $did . ' AND title = \'' . $newfile . '\'');
    }
    nv_dirListRefreshSize();
}

nv_insert_logs(NV_LANG_DATA, $module_name, $lang_module['extractimage'], $path . '/' . $newfile, $admin_info['userid']);

echo 'OK';
exit();

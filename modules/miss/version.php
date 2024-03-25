<?php

/**
 * NukeViet Content Management System
 * @version 4.x
 * @author VINADES.,JSC <contact@vinades.vn>
 * @copyright (C) 2009-2021 VINADES.,JSC. All rights reserved
 * @license GNU/GPL version 2 or any later version
 * @see https://github.com/nukeviet The NukeViet CMS GitHub project
 */

if (!defined('NV_ADMIN') or !defined('NV_MAINFILE')) {
    exit('Stop!!!');
}

//Module_upload tuong duong voi music

$module_version = [
    'name' => 'Miss',
    'modfuncs' => 'main,detail,content',
    'is_sysmod' => 0, //Module he thong hoac khong
    'virtual' => 1, //Cho phep ao hoa' module hoac khong
    'version' => '4.5.04', //Phien ban module
    'date' => 'Friday, July 21, 2023 4:00:00 PM GMT+07:00', //Ngay phat hanh phien ban
    'author' => 'VINADES.,JSC <contact@vinades.vn>', //Tac gia module dat tuy` y'
    'note' => '', //Ghi chu
    'uploads_dir' => [
        $module_upload
    ]
];

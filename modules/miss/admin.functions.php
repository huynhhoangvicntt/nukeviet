<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VSOFT (http://vsoft.com.vn)
 * @Copyright (C) 2024 VSOFT. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Wed, 20 Mar 2024 17:01:50 GMT
 */

if (!defined('NV_ADMIN') or !defined('NV_MAINFILE') or !defined('NV_IS_MODADMIN')) {
    exit('Stop!!!');
}


$allow_func = array( 'main', 'config', 'content');

define( 'NV_IS_FILE_ADMIN', true );

?>
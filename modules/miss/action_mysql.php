<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VSOFT (http://vsoft.com.vn)
 * @Copyright (C) 2024 VSOFT. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Wed, 20 Mar 2024 17:01:50 GMT
 */

if ( ! defined( 'NV_MAINFILE' ) ) die( 'Stop!!!' );

$sql_drop_module = array();
$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_voting";


$sql_create_module = $sql_drop_module;
$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_voting (
  id int(10) UNSIGNED NOT NULL,
  title varchar(100) NOT NULL,
  description text NOT NULL,
  image varchar(255) NOT NULL,
  thumb varchar(255) NOT NULL,
  vote int(11) NOT NULL,
  status tinyint(4) NOT NULL
) ENGINE=MyISAM;";


<?php

// Site Configuration
define('SITE_URL', 'http://test.local/');
define('ICON_DIR_URL',SITE_URL.'assets/icons/');
define('IMAGE_DIR_URL',SITE_URL.'assets/images/');
define('ICON_URL',SITE_URL.'uploads/icons/');
define('IMAGE_URL',SITE_URL.'uploads/images/');
define('UPLOAD_ICON_DIR',__DIR__.'/uploads/icons/');
define('UPLOAD_IMAGE_DIR',__DIR__.'/uploads/images/');

// Database Credentials
define('DB_NAME', 'wpoets');
define('DB_USER', 'root');
define('DB_PASSWORD', 'docker');
define('DB_HOST', 'mysql_db');

// DB TABLES
define('PAGE_TABLE', 'page_details');
define('TABS_TABLE', 'tabs');
define('TABS_SLIDE_TABLE', 'tab_slides');

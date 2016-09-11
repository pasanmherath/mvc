<?php

require_once 'libraries/Session.php';
require_once 'config/constant.php';
require_once 'core/App.php';
require_once 'core/Base_Controller.php';

define('ASSET_URL','http://' . $_SERVER['HTTP_HOST'] . '/' . str_replace($_SERVER['DOCUMENT_ROOT'], '', str_replace('\\', '/', dirname(__DIR__)) . '/public/'));

define('BASE_URL', 'http://localhost/mvc/');

define('MAX_FILE_SIZE', 1000);//max size in KB

define('PER_PAGE', 4);

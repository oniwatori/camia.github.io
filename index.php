<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once(dirname(__FILE__).'/lib/fw/fw.php');
Fw::app(require_once('config/application.php'))->run();
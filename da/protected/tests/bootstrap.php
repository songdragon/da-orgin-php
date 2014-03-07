<?php

// change the following paths if necessary
$yiit=dirname(__FILE__).'/../../../../../../Softwares/Dev/apache/apache2/htdocs/yii/framework/yiit.php';
$config=dirname(__FILE__).'/../config/test.php';

require_once($yiit);
require_once(dirname(__FILE__).'/WebTestCase.php');

Yii::createWebApplication($config);

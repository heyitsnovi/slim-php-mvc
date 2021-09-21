<?php

/*do not modify unless you know what you are doing*/
define('VIEW_PATH','../app/templates/');


use Slim\Factory\AppFactory;

use Slim\App;

 

require_once '../vendor/autoload.php';
require_once '../helpers/core_helper.php';

$app_base_url = get_base_url(TRUE);


/*get your application URL. Please modify it if necessary */
define('APP_URL',$app_base_url); 

 
$app = AppFactory::create();

$app->addErrorMiddleware(true, true, true);

require '../routes/routes.php';

$app->run();


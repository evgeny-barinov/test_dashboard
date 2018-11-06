<?php

require '../vendor/autoload.php';

use \Barya\Dashboard\Repository\StatisticRepository;
use \Barya\Dashboard\Controller\DashboardController;
use \Barya\Dashboard\Http\Request;
use \Barya\Dashboard\App;
use \Barya\Dashboard\Http\Exception as HttpException;

define('VIEW_PATH', __DIR__ . '/../views/');

//the easiest config implementation
if (file_exists(__DIR__ .'/../env.php')) {
    require(__DIR__ .'/../src/env.php');
}
if (!defined('ENV')) define('ENV', 'dev');

$config = require(__DIR__ . '/../config/' . ENV . '.php');

$app = new App(new Request($_GET, $_POST, $_SERVER));

$statisticRepository = new StatisticRepository(
    new \PDO($config['dsn'], $config['user'], $config['password'])
);

$controller = new DashboardController($statisticRepository);

try {
    $app->use($controller)->run();
} catch (HttpException $e) {
    App::showErrorPage($e->getCode(), $e->getMessage());
} catch (\Exception $e) {
    App::showErrorPage(500, 'Internal Error', $e->getTraceAsString());
}

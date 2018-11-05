<?php

require '../vendor/autoload.php';

use \Barya\Dashboard\Repository\StatisticRepository;
use \Barya\Dashboard\Controller\DashboardController;
use \Barya\Dashboard\Http\Request;
use \Barya\Dashboard\App;
use \Barya\Dashboard\Http\Exception as HttpException;

define('VIEW_PATH', __DIR__ . '/../views/');

$app = new App(new Request($_POST, $_GET, $_SERVER));

$statisticRepository = new StatisticRepository(
    new \PDO('mysql:dbname=test_shop;host=mysql',
        'root',
        'root'
    )
);

$controller = new DashboardController($statisticRepository);

try {
    $app->use($controller)->run();
} catch (HttpException $e) {
    App::showErrorPage($e);
} catch (\Exception $e) {
    App::showErrorPage($e);
}

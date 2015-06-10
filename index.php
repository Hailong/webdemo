<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim();

$app->get('/', function () {
    echo '<h1>Demo</h1>';
});

$app->get('/hello', function () {
    echo 'Hello World!';
});

$app->get('/hello_soap', function () {
    require_once "vendor/nusoap-0.9.5/lib/nusoap.php";

    $server = new soap_server();
    $server->configureWSDL("foodservice", "http://www.greenacorn-websolutions.com/foodservice");

    $server->register("food.getFood",
        array("type" => "xsd:string"),
        array("return" => "xsd:string"),
        "http://www.greenacorn-websolutions.com/foodservice",
        "http://www.greenacorn-websolutions.com/foodservice#getFood",
        "rpc",
        "encoded",
        "Get food by type");

    @$server->service($HTTP_RAW_POST_DATA);

});

$app->get('/hello_soap/:param', function () {
	echo 'aa';
});

$app->get('/helloxxx/:name', function ($name) {
    echo "Hello, $name";
});

$app->run();

class food
{
    public function getFood($type)
    {
        switch ($type) {
            case 'starter':
                return 'Soup';
                break;
            case 'Main':
                return 'Curry';
                break;
            case 'Desert':
                return 'Ice Cream';
                break;
            default:
                break;
        }
    }
}

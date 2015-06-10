<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim();

$app->get('/user/:id', function ($id) {
    switch ($id) {
        case 1:
            echo 'Tom';
            break;
        
        case 2:
            echo 'Jerry';
            break;

        default:
            echo 'Not sure';
            break;
    }
});

$app->get('/users/:id', function ($id) {
    switch ($id) {
        case 1:
            echo json_encode(array(
                'result' => true,
                'name' => 'Tom',
            ));
            break;
        
        case 2:
            echo json_encode(array(
                'result' => true,
                'name' => 'Jerry',
            ));
            break;

        default:
            echo json_encode(array(
                'result' => false,
            ));
            break;
    }
});

$app->run();

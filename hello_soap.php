<?php
require_once "vendor/nusoap-0.9.5/lib/nusoap.php";
 
class demo {
 
    public function hello($who, $how) {
        // switch ($type) {
        //     case 'starter':
        //         return 'Soup';
        //         break;
        //     case 'Main':
        //         return 'Curry';
        //         break;
        //     case 'Desert':
        //         return 'Ice Cream';
        //         break;
        //     default:
        //         break;
        // }
        return $who . ' says Hello World! ' . $how;
    }

    public function getUsername($id) {
        switch ($id) {
            case 1:
                return 'Tom';
                break;
            
            case 2:
                return 'Jerry';
                break;

            default:
                return 'Not sure';
                break;
        }
    }
}
 
$server = new soap_server();
$server->configureWSDL("webdemo", "http://www.teslamotors.com/webdemo");
 
$server->register("demo.hello",
    array(
        "who" => "xsd:string",
        'how' => "xsd:string",
    ),
    array("return" => "xsd:string"),
    "http://www.teslamotors.com/webdemo",
    "http://www.teslamotors.com/webdemo#hello",
    "rpc",
    "encoded",
    "Say hello");
 
$server->register("demo.getUsername",
    array(
        "id" => "xsd:int",
    ),
    array("return" => "xsd:string"),
    "http://www.teslamotors.com/webdemo",
    "http://www.teslamotors.com/webdemo#hello",
    "rpc",
    "encoded",
    "Query username");
 
@$server->service($HTTP_RAW_POST_DATA);

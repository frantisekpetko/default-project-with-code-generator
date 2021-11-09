<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use App\Services\DebugService;
use Symfony\Component\Debug\Debug;
use Symfony\Component\Debug\ErrorHandler;
include "../app/Utils/utils.php";

use Symfony\Component\Dotenv\Dotenv;
$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/../.env');
Debug::enable();
ErrorHandler::register();
DebugService::register();

use App\Database\Database;
new Database();

use SimpleXLSX;

if ( $xlsx = SimpleXLSX::parse('trades-to-db.xlsx') ) {
    //ddx($xlsx->rows() );
    $array = $xlsx->rows();
    $tradeIndex = 0;
    $trade= [];
    $tradeDesc = [];
    $mustBreaks = false;
    for($a = 1; $a < count($array); $a++) {

        if($a === 1) {
            $trade[$a - 1] = $array[$a - 1][0];
            $tradeDesc[$a - 1] = $array[$a][0];
            $tradeIndex= $tradeIndex + 2;
        }
        else{
                if(count($array) !== $tradeIndex + 2) {
                    //echo "true<br>{$tradeIndex}";
                    array_push($tradeDesc, $array[$tradeIndex + 1][0]);
                    array_push($trade, $array[$tradeIndex][0]);
                    $tradeIndex= $tradeIndex + 2;
                }
                else {
                    array_push($tradeDesc, $array[$tradeIndex + 1][0]);
                    array_push($trade, $array[$tradeIndex][0]);
                    $mustBreaks = true;
                }
            }
            if($mustBreaks === true) {
                break;
            }
                
    }

    ddx($trade);
} else {
	echo SimpleXLSX::parseError();
}

//phpinfo();
/*
use \App\Controllers\Eshop\Mail\OrderMailController;

$data = [
    "name" => "dawdwa",
    "surname" => "huwadhu",
    "email" => "frantisek.petko7@seznam.cz",
    "telephone" => "wadnwdajnwad",
    "postalCode" => "udawhuadw",
    "city" => "hdwabhdwa",
    "address" => "udawjawdn",
    "totalPrice" => "uhadwuhwad",
    "products" => ["name" => "dwadwa", "price"=> "wdaijiwad"]
];


$mail = new OrderMailController();
$mail->sendOrder((object) $data);
*/
/*
use App\Database\DB;


DB::table("server_exceptions")->create([
    "type" => DebugService::ERRTYPE,
    "message" => "udawhdwa",
    "class" => "class",
    "current" => 5,
    "total" => 10,
])->createWithByOppositeForeignKey("unsafe_exception_id")->finish();
//$id = DB::table("client_errors")->getLatestID();
ddx(DB::schema()->getErrorMessage());
*/




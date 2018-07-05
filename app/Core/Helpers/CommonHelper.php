<?php
namespace App\Core\Helpers;
/**
 * Created by PhpStorm.
 * User: my computer
 * Date: 6/30/2018
 * Time: 2:05 AM
 */
use App\Core\Entities\DataResultCollection;
use Illuminate\Support\Facades\Log;
class CommonHelper
{
    public static function CommonLog($message){
        //Logging
        if(env('APP_DEBUG')==true){
           die($message);
            abort($message);
        }else{
            Log::error($message);
        }
    }
    public static function JsonDataResult(DataResultCollection $data){
        return json_encode($data);
    }
}

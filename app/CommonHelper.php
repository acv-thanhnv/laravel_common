<?php
/**
 * Created by PhpStorm.
 * User: MSI
 * Date: 6/21/2018
 * Time: 9:32 AM
 */

namespace App;


use Illuminate\Support\Facades\Config;

class CommonHelper
{
    /**
     * @param $dataArray
     * @return string
     */
    public static function generateResponeJSON($dataArray){
        $result = array(
            'status'=>array(),
            'data'=>array()
        );
        if(isset($dataArray) && is_array($dataArray))
            $count = count($dataArray);
        if($count>=1){
            $result['status'] = $dataArray[0];
        }
        for($i=1;$i<$count;$i++){
            $result['data'][] =$dataArray[$i];
        }
        return json_encode($result);
    }
    public static function convertVaidateErrorToCommonStruct($error){
        $result = array(
            array(
                'code'=>Config::get('constants.from_validate_error_code'),
                'data_error'=>$error
            )
        );

        return $result;
    }
}

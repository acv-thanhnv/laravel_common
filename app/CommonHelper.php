<?php
/**
 * Created by PhpStorm.
 * User: MSI
 * Date: 6/21/2018
 * Time: 9:32 AM
 */

namespace App;


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
        for($i=2;$i<$count;$i++){
            $result['data'][] =$dataArray[$i];
        }
        return json_encode($result);
    }
}

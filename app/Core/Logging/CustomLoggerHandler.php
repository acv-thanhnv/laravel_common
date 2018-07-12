<?php

namespace App\Core\Logging;

use App\Core\Helpers\CommonHelper;
use Monolog\Handler\AbstractProcessingHandler;

class CustomLoggerHandler extends AbstractProcessingHandler
{

    public function __construct($config = null)
    {
        parent::__construct(isset($config['level'])?$config['level']:null);
    }

    public function write(array $record)
    {
        $logFolderPath =  storage_path('logs');
        $level = $record['level_name'];
        $message = $record['message'];
        $moduleInfor =  CommonHelper::getCurrentModuleInfor();
        if($moduleInfor->module == '') {
            $moduleInfor->module = 'Common';
        }
        $folderName =  now()->toDateString();
        $logDisk =$logFolderPath.'/'.$folderName;
        if(!is_dir($logDisk)){
            mkdir($logDisk, 0777, true);;
        }
        $fileName =  $moduleInfor->module.'-'.$folderName;
        $extention = '.txt';
        $filePath = $logDisk.'/'.$fileName.$extention;
        $content = now()->toDateTimeString().' : '.$level.' : '.$message."\n";

        if(file_exists($filePath)){
            file_put_contents($filePath, $content, FILE_APPEND | LOCK_EX);
        }else{
            $fp = fopen($filePath,"wb");
            fwrite($fp,$content);
            fclose($fp);
        }
    }

}

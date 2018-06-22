<?php
namespace App\Dao;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
/**
 * Class SDB
 * @package App\Dao
 * Database access ->call sps
 */
class SDB extends DB
{
    public const _entitiesFolderName = 'Entities';

    /**
     * @param $procName
     * @param null $parameters
     * @param bool $isExecute
     * @return \Illuminate\Support\Collection|mixed
     */
    public static function execSPs($procName, $parameters = null, $isExecute = false)
    {
        $results =  new \ArrayObject();
        try{
            $syntax = '';
            if(isset( $parameters) && is_array($parameters)){
                for ($i = 0; $i < count($parameters); $i++) {
                    $syntax .= (!empty($syntax) ? ',' : '') . '?';
                }
            }
            $syntax = 'CALL ' . $procName . '(' . $syntax . ');';

            $pdo = parent::connection()->getPdo();
            $pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, true);
            $stmt = $pdo->prepare($syntax,[\PDO::ATTR_CURSOR=>\PDO::CURSOR_SCROLL]);
            if(isset( $parameters) && is_array($parameters)) {
                for ($i = 0; $i < count($parameters); $i++) {
                    $stmt->bindValue((1 + $i), $parameters[$i]);
                }
            }
            $exec = $stmt->execute();
            if (!$exec) return $pdo->errorInfo();
            if ($isExecute) return $exec;
            do {
                try {
                    $className = "App\\".self::_entitiesFolderName."\\".$procName;
                    if(class_exists ($className)){
                        $results[] = $stmt->fetchAll(\PDO::FETCH_CLASS,$className);
                    }else{
                        $results[] = $stmt->fetchAll(\PDO::FETCH_OBJ);
                    }

                } catch (\Exception $ex) {

                }
            } while ($stmt->nextRowset());
            if (1 === count($results)) return $results[0];
        }catch (\Exception $exception){
            $results =  array(
                (object) [
                    'code'=>Config::get('constants.exception_error_code'),
                    'data_error'=>array('SDB_exception'=>$exception->getMessage())
                ]
            );
        }
        return $results;
    }
    public static function getDataAutomic($procName)
    {
        $dataStruct = '';
        $results = [];
        SDB::beginTransaction();
        $paramInfor = SDB::execSPs('DEV_GET_PARAM_OF_SPS_LST',array($procName));
        $param = array();
        if(!empty($paramInfor)){
            foreach ($paramInfor as $p){
                $pval = '';
                if($p->DATA_TYPE == 'varchar'){
                    $pval='';
                }else if ($p->DATA_TYPE == 'int'){
                    $pval = 0;
                }
                $param[]=$pval;
            }
        }
        try{
            $parameters = $param;
            $syntax = '';
            if(isset( $parameters) && is_array($parameters)){
                for ($i = 0; $i < count($parameters); $i++) {
                    $syntax .= (!empty($syntax) ? ',' : '') . '?';
                }
            }
            $syntax = 'CALL ' . $procName . '(' . $syntax . ');';

            $pdo = parent::connection()->getPdo();
            $pdo->setAttribute(\PDO::ATTR_EMULATE_PREPARES, true);
            $stmt = $pdo->prepare($syntax,[\PDO::ATTR_CURSOR=>\PDO::CURSOR_SCROLL]);
            if(isset( $parameters) && is_array($parameters)) {
                for ($i = 0; $i < count($parameters); $i++) {
                    $stmt->bindValue((1 + $i), $parameters[$i]);
                }
            }
            $exec = $stmt->execute();
            if (!$exec) return $pdo->errorInfo();
            do {
                try {
                    $results[] = $stmt->fetch (\PDO::FETCH_OBJ);
                } catch (\Exception $ex) {

                }
            } while ($stmt->nextRowset());
        }catch (\Exception $exception){
            $results =  array(
                (object) [
                    'code'=>Config::get('constants.exception_error_code'),
                    'data_error'=>array('SDB_exception'=>$exception->getMessage())
                ]
            );
        }
        SDB::rollBack();
        $entitiesFolderName = self::_entitiesFolderName;
        $folderPath = base_path() . '/app/'.$entitiesFolderName.'/';

        if(!empty($results)){
            $i = 0;
            $countResult = count($results);
            $contentFile = "<?php \n";
            $contentFile .= "//This is dev automatic generate \n ";
            $contentFile .="namespace App\\".$entitiesFolderName."; \n";
            foreach ($results as $dataSample){
                $i++;
                if (!is_dir($folderPath)) {
                    mkdir($folderPath);
                }
                if($countResult>1){
                    $classEntityName = $procName.'_'.$i;
                }else{
                    $classEntityName = $procName;
                }
                $fileTranslate = $folderPath . '/' . $procName. '.php';

                //Create file validate if not existed
                if (file_exists($fileTranslate)) {
                    $fh = fopen($fileTranslate, 'w');
                } else {
                    $fh = fopen($fileTranslate, 'w');
                }


                $contentFile .="class ".$classEntityName." implements Entity{\n";
                if(!empty($dataSample)){
                    foreach ($dataSample as $propKey=>$propVal ){
                        $contentFile.="\tpublic $".$propKey.";\n";
                    }
                }
                $contentFile .="} \n";

            }

        }
        //Write content file
        fwrite($fh, $contentFile);
        fclose($fh);

        return $results;
    }

}

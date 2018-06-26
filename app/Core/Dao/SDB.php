<?php
/**
 * @author thanhnv
 */
namespace App\Dao;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use App\Dao\DataResultCollection;

/**
 * Class SDB
 * @package App\Dao
 * Database access ->call sps
 */
class SDB extends DB
{
    public const _entitiesFolderName = '\Dev\Entities';
    public const _defaultValue = [
        'varchar'=>'',
        'int'=>0,
        'datetime'=>'2018-01-01 00:00'
    ];
    /**
     * @param $procName
     * @param null $parameters
     * @param bool $isExecute
     * @return \Illuminate\Support\Collection|mixed
     */
    public static function execSPsToDataResultCollection($procName, $parameters = null, $isExecute = false):DataResultCollection
    {
        $results =  new \ArrayObject();
        $dataResult = new DataResultCollection();
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
                    $results[] = $stmt->fetchAll(\PDO::FETCH_OBJ);


                } catch (\Exception $ex) {

                }
            } while ($stmt->nextRowset());
            if (isset($results[0]))  $dataResult->data = $results[0];
            else  {
                //new clas
                $dataResult->data = new $procName();
                $dataResult->status = \SDBStatusCode::DataNull;
            }
        }catch (\Exception $exception){
            $dataResult->status =\SDBStatusCode::Excep;
            $dataResult->message = $exception->getMessage();
            /*$results =  array(
                (object) [
                    'code'=>Config::get('constants.exception_error_code'),
                    'data_error'=>array('SDB_exception'=>$exception->getMessage())
                ]
            );*/
            // if debug throw
            //if product : logfile
        }
        $dataResult->status =\SDBStatusCode::OK;
        $dataResult->message=null;
        return $dataResult;
    }
    public static function generatetEntityClass($procName)
    {
        $dataStruct = '';
        $meta = [];
        SDB::beginTransaction();
        $paramInfor = SDB::execSPsToDataResultCollection('DEV_GET_PARAM_OF_SPS_LST',array($procName));
        $param = array();
        if($paramInfor->status !== \SDBStatusCode::DataNull){
            foreach ($paramInfor->data as $p){
                $pval = '';
                if(isset(self::_defaultValue[$p->DATA_TYPE])){
                    $pval = self::_defaultValue[$p->DATA_TYPE];
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
            foreach(range(0, $stmt->columnCount() - 1) as $column_index)
            {
                $meta[] = $stmt->getColumnMeta($column_index);
            }
            if (!$exec) return $pdo->errorInfo();
        }catch (\Exception $exception){
            //exception here.....
        }
        SDB::rollBack();
        $entitiesFolderName = self::_entitiesFolderName;
        $folderPath = base_path() . '/app'.$entitiesFolderName.'/';
        if(!empty($meta)){
            $contentFile = "<?php \n";
            $contentFile .= "//This is dev automatic generate \n ";
            $contentFile .="namespace App".$entitiesFolderName."; \n";
            if (!is_dir($folderPath)) {
                mkdir($folderPath);
            }

            $classEntityName = $procName;
            $fileTranslate = $folderPath . '/' . $procName. '.php';

            //Create file validate if not existed
            if (file_exists($fileTranslate)) {
                $fh = fopen($fileTranslate, 'w');
            } else {
                $fh = fopen($fileTranslate, 'w');
            }

            $contentFile .="class ".$classEntityName." extends Entity{\n";
            foreach ($meta as $propVal ){
                $contentFile.="\tpublic $".str_replace(" ","_", $propVal['name']).";\n";
            }
            $contentFile = $contentFile."\tpublic  function __construct(\$object){\n";
            $contentFile = $contentFile."\t\t parent::__construct(\$object);\n";
            $contentFile = $contentFile."\t}\n";

            $contentFile .="} \n";

            //Write content file
            fwrite($fh, $contentFile);
            fclose($fh);
        }
        return $meta;
    }

    /**
     * @param $procName
     * @param null $parameters
     * @param bool $isExecute
     * @return array|mixed
     */
    public static function execSPs($procName, $parameters = null, $isExecute = false)
    {
        $results = [];
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
                    $results[] = $stmt->fetchAll(\PDO::FETCH_OBJ);
                } catch (\Exception $ex) {

                }
            } while ($stmt->nextRowset());
            if (1 === count($results)) return $results[0];
        }catch (\Exception $exception){
            $results =  array(
                (object) [
                    'code'=>-9999,
                    'data_error'=>array('SDB_exception'=>$exception->getMessage())
                ]
            );
        }
        return $results;
    }

}

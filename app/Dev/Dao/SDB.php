<?php
/**
 * @author thanhnv
 */
namespace App\Dev\Dao;
use App\Dev\Entities\DataResultCollection;
use Illuminate\Support\Facades\DB;
use App\Dev\Helpers\CommonHelper;
/**
 * Class SDB
 * @package App\Dao
 * Database access ->call sps
 */
class SDB extends DB
{
    public const _defaultValue = [
        'varchar'=>'',
        'int'=>0,
        'datetime'=>'2018-01-01 00:00',
        'tinyint'=>0,
        'json'=>'{}'
    ];
    /* @param $procName
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
                    //Next, don't exception handler here
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
            //Logging
            CommonHelper::CommonLog($exception->getMessage());
        }
        $dataResult->status =\SDBStatusCode::OK;
        $dataResult->message=null;
        return $dataResult;
    }

    /**
     * @param $procName
     * @param $module
     * @return array
     */
    public static function generatetEntityClass($procName,$module)
    {
        $meta = [];
        SDB::beginTransaction();
        $paramInfor = SDB::execSPs('DEV_GET_PARAM_OF_SPS_LST',array($procName));
        $param = array();
        if(!empty($paramInfor)){
            foreach ($paramInfor as $p){
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
            if($stmt->columnCount()>0){
                foreach(range(0, $stmt->columnCount() - 1) as $column_index)
                {
                    $meta[] = $stmt->getColumnMeta($column_index);
                }
            }

            if (!$exec) return $pdo->errorInfo();
        }catch (\Exception $exception){
            //Logging
            CommonHelper::CommonLog($exception->getMessage());
        }
        SDB::rollBack();
        $entitiesFolderName = "\\".$module."\\Entities";
        $folderPath = base_path() .'/app/'. $module.'/Entities';
        if(!empty($meta)){
            $contentFile = "<?php \n";
            $contentFile .= "//This is dev automatic generate \n ";
            $contentFile .="namespace App".$entitiesFolderName."; \n";
            $contentFile.="use App\Core\Entities\Entity; \n";
            if (!is_dir($folderPath)) {
                mkdir($folderPath);
            }
            $folderPath  .='/Single';
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
        }else{
            $fileTranslate = $folderPath . '/' . $procName . '.php';
            if (file_exists($fileTranslate)) {
                unlink($fileTranslate);
            }
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
            CommonHelper::CommonLog($exception->getMessage());
        }
        return $results;
    }

}

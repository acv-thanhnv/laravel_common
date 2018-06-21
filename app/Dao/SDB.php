<?php
namespace App\Dao;

use Illuminate\Support\Facades\DB;

/**
 * Class SDB
 * @package App\Dao
 * Database access ->call sps
 */
class SDB extends DB
{
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
                    'message_code'=>'SDB_exception',
                    'message'=>$exception->getMessage()
                ]
            );
        }
        return $results;
    }

}

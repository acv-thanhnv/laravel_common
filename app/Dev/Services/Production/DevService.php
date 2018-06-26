<?php
/**
 * Created by PhpStorm.
 * User: MSI
 * Date: 6/14/2018
 * Time: 10:28 AM
 */

namespace App\Dev\Services\Production;

use App\Core\Dao\SDB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;
use App\Dev\Services\Interfaces\DevServiceInterface;
use App\Core\Entities\DataResultCollection;

class DevService extends BaseService implements DevServiceInterface
{
    public function getLanguageCodeList():DataResultCollection
    {
        $lang = SDB::execSPsToDataResultCollection('DEV_GET_LANGUAGE_CODE_LST');
        return $lang;
    }

    public function getTranslateList($translateType, $lang):DataResultCollection
    {
        return SDB::execSPsToDataResultCollection('DEV_GET_TRANSLATION_DATA_LST', array($translateType, $lang));
    }

    /**
     * @param $translateType
     * @return array
     * HELPER: Get data translated text by type ( validation, auth, label...)
     */
    public function getTranslateMessageArray($translateType = '')
    {
        $resuiltArr = [];
        $lang = SDB::execSPsToDataResultCollection('DEV_GET_LANGUAGE_CODE_LST');
        if ($lang->data==\SDBStatusCode::OK) {

            foreach ($lang->data as $item) {
                $resuiltArr[$item->code] = array();
            }
            $rules = SDB::execSPsToDataResultCollection('DEV_GET_TRANSLATION_DATA_LST', array($translateType, ''));

            if (!empty($resuiltArr)) {
                foreach ($resuiltArr as $itemKey => $itemValue) {
                    if (!empty($rules)) {
                        foreach ($rules as $ruleItem) {
                            if ($itemKey == $ruleItem->lang_code) {
                                if ($ruleItem->type_code == '') {
                                    $resuiltArr[$itemKey][$ruleItem->code] = $ruleItem->text;
                                } else {
                                    $resuiltArr[$itemKey][$ruleItem->code][$ruleItem->type_code] = $ruleItem->text;
                                }
                            }
                        }
                    }
                }

            }
        }
        return $resuiltArr;
    }

    public function getCategoryWithLevelList():DataResultCollection
    {
        return SDB::execSPsToDataResultCollection('GET_CATEGORY_WITH_LEVEL_LIST');
    }

    public function getRoleInfoFromDB()
    {
        return SDB::execSPs('DEV_GET_ROLES_MAP_ACTION_LST');
    }

    /**
     * @param $validateArray
     * @param $fileName
     * HELPER: Generation Config File contain text translated.
     */
    public function generationTranslateFile($translateType, $fileName)
    {
        $validateArray = $this->getTranslateMessageArray($translateType);
        $folderLangPath = base_path() . '/resources/lang/';
        foreach ($validateArray as $langCode => $langGroupContent) {
            $langFolder = strtolower($folderLangPath . $langCode);
            if (!is_dir($langFolder)) {
                mkdir($langFolder);
            }
            $fileTranslate = $langFolder . '/' . $fileName . '.php';

            //Create file validate if not existed
            if (file_exists($fileTranslate)) {
                $fh = fopen($fileTranslate, 'w');
            } else {
                $fh = fopen($fileTranslate, 'w');
            }
            $contentFile = "<?php \n";
            $contentFile .= "//This is dev automatic generate \n ";
            //Generate content file
            if (!empty($langGroupContent)) {
                $contentFile .= "return [\n";
                if (!empty($langGroupContent)) {
                    foreach ($langGroupContent as $keycode => $value) {
                        if (!is_array($value)) {
                            $contentFile .= "\t" . '"' . $keycode . '"=>"' . $value . '"' . ",\n";
                        } else {
                            $contentFile .= "\t'" . $keycode . "'=>[\n";

                            if (!empty($value)) {
                                foreach ($value as $inputType => $text) {
                                    $contentFile .= "\t\t" . '"' . $inputType . '"=>"' . $text . '"' . ",\n";
                                }
                            }
                            $contentFile .= "\t],\n";
                        }
                    }
                }
                $contentFile .= '];';
            }
            //Write content file
            fwrite($fh, $contentFile);
            fclose($fh);
        }
    }

    /**
     * @param $validateArray
     * @param $fileName
     * HELPER: Generation Javascript File contain text translated.
     */
    public function generationTranslateScript($translateType, $fileName)
    {
        $validateArray = $this->getTranslateMessageArray($translateType);
        $folderLangPath = base_path() . '/public/js/' . $fileName . '.js';
        //Create file validate if not existed
        if (file_exists($folderLangPath)) {
            $fh = fopen($folderLangPath, 'w');
        } else {
            $fh = fopen($folderLangPath, 'w');
        }
        $contentFile = "//This is dev automatic generate \n ";
        $contentFile .= "var _validateMessage = \n";
        $txt = json_encode($validateArray);
        $contentFile .= $txt . ';';
        //Write content file
        fwrite($fh, $contentFile);
        fclose($fh);

    }

    public function generationTranslateFileAndScript()
    {
        $transTypeList = SDB::execSPsToDataResultCollection("DEV_GET_TRANSLATION_TYPE_LST");
        if ($transTypeList->status==\SDBStatusCode::OK) {
            foreach ($transTypeList->data as $item) {
                $this->generationTranslateScript($item->code, $item->code);
                $this->generationTranslateFile($item->code, $item->code);
            }
        }
    }

    public function getNewTransComboList()
    {
        return SDB::execSPs('DEV_ADD_TRANSLATE_COMBO_LST');
    }

    /**
     * @return array
     * HELPER: get role mapping screen to Array
     */
    public function getRoleMapArray()
    {
        $resultArr = [];
        $roleInfo = SDB::execSPs('DEV_GET_ROLES_MAP_ACTION_LST');
        if (!empty($roleInfo)) {
            $roles = $roleInfo[0];
            $roleMap = $roleInfo[1];
            if (!empty($roles)) {
                foreach ($roles as $item) {
                    $resultArr[$item->role_value] = array();
                }
                if (!empty($resultArr)) {
                    foreach ($resultArr as $itemKey => $itemValue) {
                        if (!empty($roleMap)) {
                            foreach ($roleMap as $roleMapItem) {
                                if ($itemKey == $roleMapItem->role_value) {
                                    $resultArr[$itemKey][$roleMapItem->screen_code] = $roleMapItem->is_active;
                                }
                            }
                        }
                    }

                }
            }
        }

        return $resultArr;
    }

    /**
     * @param $roleMapScreen : array role map
     * Struct input as:
     * HELPER: generate acl file to config folder
     */
    public function generationAclFile()
    {
        $roleMapScreen = $this->getRoleMapArray();
        $fileName = 'acl';//fixed, warning: Must not dupplicate other config file, which existed.
        $fileAcl = base_path() . '/config/' . $fileName . '.php';

        //Create file validate if not existed
        if (file_exists($fileAcl)) {
            $fh = fopen($fileAcl, 'w');
        } else {
            $fh = fopen($fileAcl, 'w');
        }
        $contentFile = "<?php \n";
        $contentFile .= "//This is dev automatic generate \n ";
        //Generate content file

        $contentFile .= "return [\n";
        if (!empty($roleMapScreen)) {
            foreach ($roleMapScreen as $roleValue => $value) {
                $contentFile .= "\t'" . $roleValue . "'=>[\n";
                if (!empty($value)) {
                    foreach ($value as $screenCode => $isActive) {
                        $contentFile .= "\t\t'" . $screenCode . "'=>'" . $isActive . "',\n";
                    }
                }
                $contentFile .= "\t],\n";
            }
        }
        $contentFile .= '];';

        //Write content file
        fwrite($fh, $contentFile);
        fclose($fh);

    }

    /**
     * @param $name : name of config file. ex: 'acl' or 'app' or 'auth'....
     * @return mixed
     * HELPER: Read file config
     */
    public function getConfigDataFromFile($name)
    {
        $resultArray = Config::get($name);
        return $resultArray;
    }

    /**
     * @return array
     * generation screens list, insert to database and innitization system administrator role.
     */
    public function generationRoleDataToDB()
    {
        $data = $this->getListScreen();
        $systemAdminRole = Config::get('app.SYSTEM_ADMIN_ROLE_VALUE');
        $roleList = SDB::execSPsToDataResultCollection('DEV_GET_ROLES_LST');
        SDB::table('sys_screens')->truncate();
        SDB::table('sys_screens')->insert($data);
        SDB::table('sys_role_map_screen')->truncate();

        $id = 0;
        $dataRolesMapping = array();
        foreach ($roleList as $role) {

            foreach ($data as $item) {
                $id++;
                $isActive = 0;
                if ($role->role_value == $systemAdminRole) {
                    $isActive = 1;
                }
                $dataRolesMapping[] = array(
                    'id' => $id,
                    'role_value' => $role->role_value,
                    'screen_id' => $item['id'],
                    'is_active' => $isActive
                );
            }
        }

        SDB::table('sys_role_map_screen')->insert($dataRolesMapping);
        return $data;
    }


    /**
     * @return array
     * generation screens list, insert to database and innitization system administrator role.
     */
    public function generationTransDataToDB()
    {
        $dir = base_path() . '/resources/lang';
        $langList = array_diff(scandir($dir), array('..', '.'));
        $id = 0;
        SDB::execSPsToDataResultCollection('DEV_BACKUP_TRANSLATE_ACT');
        SDB::table('dev_translation')->truncate();
        if (!empty($langList)) {
            foreach ($langList as $lang) {
                $dir = base_path() . '/resources/lang/' . $lang;
                $typeTranslateList = array_diff(scandir($dir), array('..', '.'));
                Lang::setLocale($lang);
                if (!empty($typeTranslateList)) {
                    foreach ($typeTranslateList as $translateFileName) {
                        $typeTranslate = str_replace('.php', '', $translateFileName);
                        $tran = Lang::get($typeTranslate);
                        $dataTrans = array();
                        if (is_array($tran)&&!empty($tran)) {
                            foreach ($tran as $tranItemKey => $tranItemValue) {
                                if (!is_array($tranItemValue)) {
                                    $id++;
                                    $dataTrans[] = array(
                                        'id' => $id,
                                        'lang_code' => strtolower($lang),
                                        'input_type' => '',
                                        'code' => $tranItemKey,
                                        'text' => $tranItemValue,
                                        'translate_type' => $typeTranslate,
                                        'created_at' => now(),
                                        'is_deleted' => 0
                                    );
                                } else {
                                    if (is_array($tranItemValue) && !empty($tranItemValue)) {
                                        foreach ($tranItemValue as $inputTypeKey => $inputValueMss) {
                                            if (!is_array($inputValueMss)) {
                                                $id++;
                                                $dataTrans[] = array(
                                                    'id' => $id,
                                                    'lang_code' => strtolower($lang),
                                                    'input_type' => $inputTypeKey,
                                                    'code' => $tranItemKey,
                                                    'text' => $inputValueMss,
                                                    'translate_type_code' => $typeTranslate,
                                                    'created_at' => now(),
                                                    'is_deleted' => 0
                                                );
                                            }

                                        }
                                    }

                                }

                            }
                        }
                        if (!empty($dataTrans)) {
                            SDB::table('dev_translation')->insert($dataTrans);
                        }
                    }
                }
            }
        }
    }

    public function updateActiveAcl($roleMapId, $isActive)
    {
        SDB::execSPsToDataResultCollection("DEV_ROLE_UPDATE_ACTIVE_ACT", array($roleMapId, $isActive));
    }

    public function updateTranslateText($id, $transText)
    {
        SDB::execSPsToDataResultCollection("DEV_TRANSLATE_UPDATE_TEXT_ACT", array($id, $transText));
    }

    public function insertTranslationItem($transType, $transInputType, $transTextCode, $textTrans)
    {
        return SDB::execSPsToDataResultCollection("DEV_TRANSLATE_INSERT_NEW_TEXT_ACT", array($transType, $transInputType, $transTextCode, $textTrans));
    }
    public function generateEntityClass(){
        echo '<pre>';
        $spsList =  SDB::execSPsToDataResultCollection('DEV_GET_ALL_SP_LST');
        if($spsList->status==\SDBStatusCode::OK){
            foreach ($spsList->data as $row){
                SDB::generatetEntityClass($row->Name);
            }
        }
    }
    public function generateSpecEntityClass($spName){
        SDB::generatetEntityClass($spName);
    }
    public function getAllSPList():DataResultCollection{
        $spsList =  SDB::execSPsToDataResultCollection('DEV_GET_ALL_SP_LST');
        return $spsList;
    }
    /**
     * @return array
     */
    protected function getListScreen()
    {
        $controllers = [];
        $i = 0;
        $id = 0;
        $listRouter = Route:: getRoutes()->getRoutes();
        foreach ($listRouter as $route) {
            $action = $route->getAction();
            if (array_key_exists('controller', $action)) {
                $_module = strtolower(trim(str_replace('App\Http\Controllers', '', $action['namespace']), '\\'));
                $_module =  explode("\\",$_module)[0];
                if ($_module != 'dev') {
                    $id++;
                    $_action = explode('@', $action['controller']);

                    $_namespaces_chunks = explode('\\', $_action[0]);
                    $controllers[$i]['id'] = $id;
                    $controllers[$i]['module'] = $_module;
                    $controllers[$i]['controller'] = strtolower(end($_namespaces_chunks));
                    $controllers[$i]['action'] = strtolower(end($_action));
                }

            }
            $i++;
        }
        return ($controllers);
    }

    /**
     * @return array|mixed
     */
    protected function getCatagoryList()
    {
        $categoryData = SDB::execSPsToDataResultCollection('GET_CATEGORY_LST');
        return $categoryData;
    }

    public function test()
    {
        echo 'devservice';
    }
}


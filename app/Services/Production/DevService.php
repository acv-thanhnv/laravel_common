<?php
/**
 * Created by PhpStorm.
 * User: MSI
 * Date: 6/14/2018
 * Time: 10:28 AM
 */

namespace App\Services\Production;
use App\Dao\SDB;
use Illuminate\Support\Facades\Config;

use App\Services\Interfaces\DevServiceInterface;

class DevService extends  BaseService implements DevServiceInterface
{
    public function getLanguageCodeList(){
        $lang = SDB::execSPs('DEV_GET_LANGUAGE_CODE_LST');
        return $lang;
    }
    /**
     * @param $translateType
     * @return array
     * HELPER: Get data translated text by type ( validation, auth, label...)
     */
    public function getTranslateMessageArray($translateType)
    {
        $resuiltArr = [];
        $lang = SDB::execSPs('DEV_GET_LANGUAGE_CODE_LST');
        if (!empty($lang)) {

            foreach ($lang as $item) {
                $resuiltArr[$item->code] = array();
            }
            $rules = SDB::execSPs('DEV_GET_TRANSLATION_DATA_LST', array($translateType));
            if (!empty($resuiltArr)) {
                foreach ($resuiltArr as $itemKey => $itemValue) {
                    if (!empty($rules)) {
                        foreach ($rules as $ruleItem) {
                            if ($itemKey == $ruleItem->lang_code) {
                                if ($ruleItem->type_name == '') {
                                    $resuiltArr[$itemKey][$ruleItem->code] = $ruleItem->text;
                                } else {
                                    $resuiltArr[$itemKey][$ruleItem->code][$ruleItem->type_name] = $ruleItem->text;
                                }
                            }
                        }
                    }
                }

            }
        }
        return $resuiltArr;
    }

    /**
     * @param $validateArray
     * @param $fileName
     * HELPER: Generation Config File contain text translated.
     */
    public function generationTranslateFile($validateArray, $fileName)
    {
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
            //Generate content file
            if (!empty($langGroupContent)) {
                $contentFile .= "return [\n";
                if (!empty($langGroupContent)) {
                    foreach ($langGroupContent as $keycode => $value) {
                        if (!is_array($value)) {
                            $contentFile .= "\t'" . $keycode . "'=>'" . $value . "',\n";
                        } else {
                            $contentFile .= "\t'" . $keycode . "'=>[\n";

                            if (!empty($value)) {
                                foreach ($value as $inputType => $text) {
                                    $contentFile .= "\t\t'" . $inputType . "'=>'" . $text . "',\n";
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
    public function generationTranslateScript($validateArray, $fileName)
    {
        $folderLangPath = base_path() . '/public/js/' . $fileName . '.js';
        //Create file validate if not existed
        if (file_exists($folderLangPath)) {
            $fh = fopen($folderLangPath, 'w');
        } else {
            $fh = fopen($folderLangPath, 'w');
        }
        $contentFile = "var _validateMessage = \n";
        $txt = json_encode($validateArray);
        $contentFile .= $txt . ';';
        //Write content file
        fwrite($fh, $contentFile);
        fclose($fh);

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
     * @param $roleMapScreen
     * HELPER: generate acl file to config folder
     */
    public function generationAclFile($roleMapScreen)
    {
        $fileName= 'acl';//fixed, warning: Must not dupplicate other config file, which existed.
        $fileAcl = base_path() . '/config/' . $fileName . '.php';

        //Create file validate if not existed
        if (file_exists($fileAcl)) {
            $fh = fopen($fileAcl, 'w');
        } else {
            $fh = fopen($fileAcl, 'w');
        }
        $contentFile = "<?php \n";
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
     * @param $name
     * @return mixed
     * HELPER: Read file config
     */
    public function getConfigDataFromFile($name)
    {
        $resultArray = Config::get($name);
        return $resultArray;
    }
}

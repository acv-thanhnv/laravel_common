<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Dao\SDB;
use Symfony\Component\Console\Helper\Helper;
use Illuminate\Support\Facades\Validator;
use League\Flysystem\Filesystem;
class DevController extends Controller
{
    public function translation()
    {
        //form CRUD translate text
        return view("dev/translation");
    }
    public function generationLanguageFiles()
    {
        $lang = SDB::execSPs('DEV_GET_LANGUAGE_CODE_LST');
        $translateType = 'validation';
        $resuiltArr = $this->getTranslateMessageArray($translateType);
        echo '<pre>';
        print_r($resuiltArr);
        $this->generationTranslateFile($resuiltArr,'validation_test');
        $this->generationTranslateScript($resuiltArr,'validation_test_tmp');

    }

    /**
     * test
     */
    public function index()
    {
        $a=  $this->getConfigDataFromFile('acl');
        echo '<prev>';
        print_r($a);

    }
    /**
     * @param $translateType
     * @return array
     * Get data translated text by type ( validation, auth, label...)
     */
    protected function getTranslateMessageArray($translateType)
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
     * Generation Config File contain text translated.
     */
    protected function generationTranslateFile($validateArray,$fileName)
    {
        $folderLangPath = base_path() . '/resources/lang/';
        foreach ($validateArray as $langCode => $langGroupContent) {
            $langFolder = strtolower($folderLangPath . $langCode);
            if (!is_dir($langFolder)) {
                mkdir($langFolder);
            }
            $fileTranslate = $langFolder.'/'.$fileName.'.php';

            //Create file validate if not existed
            if (file_exists($fileTranslate)) {
                $fh = fopen($fileTranslate, 'w');
            } else {
                $fh = fopen($fileTranslate, 'w');
            }
            $contentFile = "<?php \n";
            //Generate content file
            if(!empty($langGroupContent)){
                $contentFile.="return [\n";
                if(!empty($langGroupContent)){
                    foreach ($langGroupContent as $keycode=>$value){
                        if(!is_array($value)){
                            $contentFile .="\t'".$keycode."'=>'".$value."',\n";
                        }else{
                            $contentFile .="\t'".$keycode."'=>[\n";

                            if(!empty($value)){
                                foreach ($value as $inputType=>$text) {
                                    $contentFile.="\t\t'".$inputType."'=>'".$text."',\n";
                                }
                            }
                            $contentFile .="\t],\n";
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
     * Generation Javascript File contain text translated.
     */
    protected function generationTranslateScript($validateArray,$fileName)
    {
        $folderLangPath = base_path() . '/public/js/'.$fileName.'.js';
        //Create file validate if not existed
        if (file_exists($folderLangPath)) {
            $fh = fopen($folderLangPath, 'w');
        } else {
            $fh = fopen($folderLangPath, 'w');
        }
        $contentFile = "var _validateMessage = \n";
        $txt =  json_encode ($validateArray);
        $contentFile .=$txt.';';
        //Write content file
        fwrite($fh, $contentFile);
        fclose($fh);

    }

    protected function getConfigDataFromFile($name){
        $resultArray = Config::get($name);
        return $resultArray;
    }
}

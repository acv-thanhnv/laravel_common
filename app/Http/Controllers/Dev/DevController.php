<?php

namespace App\Http\Controllers\Dev;

use App\Dao\SDB;
use App\Entities\DEV_ADD_TRANSLATE_COMBO_LST_1;
use App\Entities\DEV_GET_TRANSLATION_DATA_LST;
use App\Http\Controllers\Controller;
use App\Services\Dev\Interfaces\DevServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\CommonHelper;
use Validator;
class DevController extends Controller
{
    protected $devService;

    /**
     * Constructor
     */
    public function __construct(DevServiceInterface $devService)
    {
        $this->devService = $devService;
    }
    public function translationManagement()
    {
        //form CRUD translate text
        $langList = $this->devService->getLanguageCodeList();
        $dataTrans = $this->devService->getTranslateList('','');
        $dataComboFilter = $this->devService->getNewTransComboList();
        return view("dev/translation",compact(['dataTrans','langList','dataComboFilter']));
    }
    public function createNewTranslationItem(Request $request){
        $validator =
            Validator::make($request->all(), [
                'text_code' => 'required'
            ]);

        if($validator->fails() ){
            $error = array($validator->errors());
            return CommonHelper::generateResponeJSON(CommonHelper::convertVaidateErrorToCommonStruct($error));
        }else{
            $transType = $request->input('trans_type');
            $transInputType = $request->input('trans_input_type');
            $transTextCode = $request->input('text_code');
            $textTrans = $request->input('text_trans');
            $dataFromDB = $this->devService->insertTranslationItem($transType, $transInputType, $transTextCode, $textTrans);
            return CommonHelper::generateResponeJSON($dataFromDB);
        }

    }
    public function menu()
    {
        //form CRUD translate text
        $dataCategory = $this->devService->getCategoryWithLevelList();
        return view("dev/menu",compact('dataCategory'));
    }
    public function generationLanguageFiles()
    {
        $this->devService->generationTranslateFileAndScript();

    }
    public function generationAclConfigFiles()
    {
        $this->devService->generationAclFile();
    }


    public function importScreensList(){
        $this->devService->generationRoleDataToDB();
    }
    public function importTranslateToDB(){
        $this->devService->generationTransDataToDB();
    }
    public function initProject()
    {
        $this->devService->generationRoleDataToDB();
        $this->devService->generationAclFile();

        //generationTranslate validation
        $this->devService->generationTranslateFileAndScript();
    }
    public function index()
    {
        return view("dev/index");
    }
    public function generationAclFile(){
        $this->devService->generationAclFile();
        return null;
    }
    public function aclManangement(){
        $dataAcl =  $this->devService->getRoleInfoFromDB();
        return view("dev/acl",compact('dataAcl'));
    }
    public function updateAclActive(Request $request){
        $active =  $request->input('active');
        $roleMapId = $request->input('role_map_id');
        $isActive = 0;
        if(isset($active) && strtolower($active)  == 'true'){
            $isActive = 1;
        }
        $this->devService->updateActiveAcl($roleMapId,$isActive);
        return null;
    }
    public function updateTranslate(Request $request){
        $id =  $request->input('id');
        $transText = $request->input('text');
        $this->devService->updateTranslateText($id,$transText);
        return null;
    }
    public function newTextTrans(){
        $langList = $this->devService->getLanguageCodeList();
        $comboList = $this->devService->getNewTransComboList();
        return view("dev/addtranslate",compact(['langList','comboList']))->renderSections()['content'];
    }
    public function userAcl(){

    }
    public function test(){
        SDB::getDataAutomic('DEV_ROLE_UPDATE_ACTIVE_ACT');
        echo '<pre>';

        $a =SDB::execSPs('DEV_GET_TRANSLATION_DATA_LST',array('',''))  ;
        $foo = new MyClass($a);
        $b = new MyClass($a);
        $c= [0];

        foreach ($a as $b){


        }
        print_r($foo);


    }


}


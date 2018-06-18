<?php

namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\DevServiceInterface;
use Illuminate\Http\Request;

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
        return view("dev/translation",compact(['dataTrans','langList']));
    }
    public function menu()
    {
        //form CRUD translate text
        $dataCategory = $this->devService->getCategoryWithLevelList();
        return view("dev/menu",compact('dataCategory'));
    }
    public function generationLanguageFiles()
    {
        $translateType = 'validation';
        $this->devService->generationTranslateFile($translateType, 'validation_test');
        $this->devService->generationTranslateScript($translateType, 'validation_test_tmp');

    }
    public function generationAclConfigFiles()
    {
        $this->devService->generationAclFile();
    }

    public function readAclConfig()
    {
        $a = $this->devService->getConfigDataFromFile('acl');
        echo '<prev>';
        print_r($a);
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
        $translateType = 'validation';
        $this->devService->generationTranslateFile($translateType, 'validation_test');
        $this->devService->generationTranslateScript($translateType, 'validation_test_tmp');
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

}

<?php

namespace App\Http\Controllers\Dev;

use App\Dao\SDB;
use App\Http\Controllers\Controller;
use App\Services\Dev\Interfaces\DevServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

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
        $validatedData = $request->validate([
            'text_code' => 'required',
        ]);
        //if(!$validatedData->fails()){
            $transType =  $request->input('trans_type');
            $transInputType = $request->input('trans_input_type');
            $transTextCode = $request->input('text_code');
            $textTrans = $request->input('text_trans');
            $langs = $request->input('lang');
            $delimiter = Config::get('app.DELIMITER');
            $this->devService->insertTranslationItem($transType,$transInputType,$transTextCode,$textTrans,$langs,$delimiter);
            return response()->json(['success'=>'Record is successfully added']);
       // }else{
       //     return response()->json($validatedData->messages(), 200);
        //}
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
    public function test(){
        // $categoryData = SDB::execSPs('GET_CATEGORY_LST');

        $procName = 'GET_CATEGORY_LST';
        $isExecute= false;

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

        $results = [];
        do {
            try {
                $results[] = $stmt->fetchAll(\PDO::FETCH_OBJ);
            } catch (\Exception $ex) {

            }
        } while ($stmt->nextRowset());


        if (1 === count($results)) return $results[0];

    }

}

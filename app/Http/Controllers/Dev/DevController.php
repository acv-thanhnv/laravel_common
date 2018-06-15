<?php

namespace App\Http\Controllers\Dev;

use App\Http\Controllers\Controller;
use App\Services\Interfaces\DevServiceInterface;

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
        $dataTrans = $this->devService->getTranslateMessageArray('');
        print_r($dataTrans);
//      /  return view("dev/translation",compact('dataTrans'));
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
    public function aclManangement(){
        return view("dev/acl");
    }

}

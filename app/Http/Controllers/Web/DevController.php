<?php

namespace App\Http\Controllers\Web;

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
    public function translation()
    {
        //form CRUD translate text
        return view("dev/translation");
    }

    public function generationLanguageFiles()
    {
        $lang = $this->devService->getLanguageCodeList();
        $translateType = 'validation';
        $resuiltArr = $this->devService->getTranslateMessageArray($translateType);
        echo '<pre>';
        print_r($resuiltArr);
        $this->devService->generationTranslateFile($resuiltArr, 'validation_test');
        $this->devService->generationTranslateScript($resuiltArr, 'validation_test_tmp');

    }
    public function generationAclConfigFiles()
    {
        $roleMap = $this->devService->getRoleMapArray();
        $this->devService->generationAclFile($roleMap);

    }

    public function readAclConfig()
    {
        $a = $this->devService->getConfigDataFromFile('acl');
        echo '<prev>';
        print_r($a);
    }

    public function index()
    {
        $roleMap = $this->devService->getRoleMapArray();
        $this->devService->generationAclFile($roleMap);
        echo '<pre>';
        print_r($roleMap);
    }
}

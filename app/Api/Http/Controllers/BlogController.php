<?php

namespace App\Api\Http\Controllers;
use App\Core\Dao\SDB;
use App\Core\Helpers\CommonHelper;
use Session;
class BlogController extends Controller
{
    public function index(){

        $listModule = SDB::execSPsToDataResultCollection('ACL_GET_MODULES_LST');

        return CommonHelper::JsonDataResult($listModule);
    }
}

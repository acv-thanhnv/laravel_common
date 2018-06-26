<?php
/**
 * Created by PhpStorm.
 * User: MSI
 * Date: 6/14/2018
 * Time: 10:23 AM
 */
namespace App\Services\Dev\Interfaces;
use App\Dao\DataResultCollection;

interface DevServiceInterface
{
    public function test();
    public function getLanguageCodeList():DataResultCollection;
    public function getTranslateMessageArray( $translateType);
    public function getTranslateList($translateType,$lang):DataResultCollection;
    public function getCategoryWithLevelList():DataResultCollection;
    public function getAllSPList():DataResultCollection;
    public function getRoleInfoFromDB();
    public function generationTranslateFileAndScript();
    public function generationTranslateFile( $translateType, $fileName);
    public function generationTranslateScript( $translateType, $fileName);
    public function getRoleMapArray();
    public function generationAclFile();
    public function getConfigDataFromFile($name);
    public function generationRoleDataToDB();
    public function generationTransDataToDB();

    public function getNewTransComboList();

    public function updateActiveAcl($roleMapId,$isActive);
    public function updateTranslateText($id,$transText);
    function insertTranslationItem($transType,$transInputType,$transTextCode,$textTrans);
    public function generateEntityClass();
    public function generateSpecEntityClass($spName);
}

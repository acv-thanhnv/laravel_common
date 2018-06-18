<?php
/**
 * Created by PhpStorm.
 * User: MSI
 * Date: 6/14/2018
 * Time: 10:23 AM
 */
namespace App\Services\Interfaces;

interface DevServiceInterface
{
    public function test();
    public function getLanguageCodeList();
    public function getTranslateMessageArray( $translateType);
    public function getTranslateList();
    public function getCategoryWithLevelList();
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
}

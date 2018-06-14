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
    public function getLanguageCodeList();
    public function getTranslateMessageArray( $translateType);
    public function generationTranslateFile( $validateArray, string $fileName);
    public function generationTranslateScript( $validateArray, string $fileName);
    public function getRoleMapArray();
    public function generationAclFile( $roleMapScreen);
    public function getConfigDataFromFile(string $name);
}

<?php
/**
 * Created by PhpStorm.
 * User: MSI
 * Date: 6/21/2018
 * Time: 5:29 PM
 */
namespace App\Entities;
class Entity{
    public function __construct($object)
    {
        $props=  get_object_vars ($this);
        foreach ($props as $prop=>$value){
            $this->{$prop} = $object->{$prop};
        }
    }
}

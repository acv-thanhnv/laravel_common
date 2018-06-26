<?php 
//This is dev automatic generate 
 namespace App\Entities; 
class GET_CATEGORY_LST extends Entity{
	public $id;
	public $name;
	public $level;
	public $parent;
	public  function __construct($object){
		 parent::__construct($object);
	}
} 

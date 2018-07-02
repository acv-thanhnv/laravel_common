<?php 
//This is dev automatic generate 
 namespace App\Dev\Entities; 
use App\Core\Entities\Entity; 
class GET_CATEGORY_WITH_LEVEL_LIST extends Entity{
	public $id;
	public $name;
	public $level;
	public  function __construct($object){
		 parent::__construct($object);
	}
} 

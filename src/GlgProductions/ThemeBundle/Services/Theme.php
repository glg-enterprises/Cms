<?php
namespace GlgProductions\ThemeBundle\Services;

use Doctrine\ORM\EntityManager;

class Theme{
	
	/**
	* EntityManager
	* @var Doctrine\Orm\EntityManager
	*/
	protected static $em;

	public function __construct(EntityManager $em){
		self::$em = $em;
	}

    public static function get_theme(){
    	return self::$em->getRepository("ThemeBundle:Theme")->findOneBy(["active"=>true]);
    }
}
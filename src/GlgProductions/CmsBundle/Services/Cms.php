<?php
namespace GlgProductions\CmsBundle\Services;

use Doctrine\ORM\EntityManager;

class Cms{
	
	/**
	* EntityManager
	* @var Doctrine\Orm\EntityManager
	*/
	protected static $em;

	public function __construct(EntityManager $em){
		self::$em = $em;
	}

	public static function get_setting($type){
		return self::$em->getRepository("CmsBundle:SiteSetting")->findOneBy(["name" => $type]); 
    }

    public static function get_categories(){
    	return self::$em->getRepository("CmsBundle:Category")->findAll();
    }

    public static function get_featured(){
    	return self::$em->getRepository("CmsBundle:Post")->findBy(["featured" => true],["createdAt" => "DESC"],"10");
    }
}
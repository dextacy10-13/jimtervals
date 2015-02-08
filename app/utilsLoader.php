<?php
/**
 * Summary UtilsLoader
 *
 * Description. Class Autoloader - For the autoloading of Model, View and Controller Classes as well as Utility Classes such as general static string,
 * validation and sanitization files.  It uses camelCase to denote directory tree hierarchy; for instance the model ModelCurlIntervalsTask 
 * would be a file model.curlIntervalsTask.php in the directory \mvc\model\curl\intervals\
 *
 * @link @mr_james_myers - www.mrjamesmyers.co.uk
 * @since 02FEB2015
 *
 * @package JimTervals
 * @subpackage Core Configuration Files
 * @author James Myers
 */
class UtilsLoader {

	public static $loader;

	public static function init() {
		if (self::$loader == NULL)
			self::$loader = new self();

		return self::$loader;
	}

	public function __construct() {
		spl_autoload_register(array($this, "loader"));
	}

	public function loader($class) {
		$path = dirname(strtolower(preg_replace('/([a-z])([A-Z])/', '$1/$2', $class)));

		$tagName = str_replace(array('Controller','Model','View'),'',$class);
		$class = strtolower(substr($tagName,0,1)) . substr($tagName,1);
        //models
		if( file_exists('app/mvc/' . ( $path ? $path . '/' : null ) . 'model.' . $class . '.php') ){			
			include( 'app/mvc/' . ( $path ? $path . '/' : null ) . 'model.' . $class . '.php');
		}
        //controllers
		if( file_exists('app/mvc/' . ( $path ? $path . '/' : null ) . 'controller.' . $class . '.php') ){
			include( 'app/mvc/' . ( $path ? $path . '/' : null ) . 'controller.' . $class . '.php');
		}
        //views
		if( file_exists('app/mvc/' . ( $path ? $path . '/' : null ) . 'class.view.' . $class . '.php') ){
			include( 'app/mvc/' . ( $path ? $path . '/' : null ) . 'class.view.' . $class . '.php');
		}
        
		//utility classes
		if( file_exists('class/class.' . $class . '.php') ){		
			include( 'class/class.' . $class . '.php');
		}
	}
}
UtilsLoader::init();
?>
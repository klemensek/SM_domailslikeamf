<?php




define('REDBEAN_MODEL_PREFIX', '../Model_');
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../vendor/rb.php';

/*
require '../vendor/autoload.php';
$fvm = \RedBeanFVM\RedBeanFVM::getInstance();

gabordemooij\redbean\RedBeanPHP

*/
R::setup( 'mysql:host=localhost;dbname=smemailmf',
		 'root', '' ); 



use Zend\Session\Config\StandardConfig;
use Zend\Session\SessionManager;

$config = new StandardConfig();
$config->setOptions(array(
	'remember_me_seconds' => 1800000,
	'name'                => 'mailmf',
));
$manager = new SessionManager($config);

//var_dump($manager);
	


use Zend\Session\Storage\ArrayStorage;

$populateStorage = array('foo' => 'bar');
$storage         = new ArrayStorage($populateStorage);
$manager         = new SessionManager();
$manager->setStorage($storage);


//var_dump($manager);



/*
$book = R::dispense("mail");
$book->author = "Santa Claus";
$book->title = "Secrets of Christmas";
$id = R::store( $book );

*/

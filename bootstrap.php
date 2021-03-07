<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";
require "module_4/config.php";
// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode                 = true;
$proxyDir                  = null;
$cache                     = null;
$useSimpleAnnotationReader = false;
$config                    = Setup::createAnnotationMetadataConfiguration( array( __DIR__ . "module_4/" ), $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader );

// database configuration parameters
$conn = array(
	'dbname'   => $dbname,
	'user'     => $username,
	'password' => $password,
	'host'     => $host,
	'driver'   => 'pdo_mysql',
);

$en = EntityManager::create( $conn, $config );

// init database here
//try {
//	$sql = file_get_contents( "module_4/data/init.sql" );
//	$en->getConnection()->executeQuery( $sql );
//	echo "Database and table users created successfully.";
//} catch ( \Doctrine\ORM\ORMException | \Doctrine\DBAL\Exception $error ) {
//	echo $sql . "<br>" . $error->getMessage();
//}

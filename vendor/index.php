<?php
require_once'./autoload.php';

$faker = Faker\Factory::create('es_ES');

$dbh = new PDO('mysql:host=localhost;dbname=faker',
'root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

foreach(range(1,10) as $registro){
    $dbh->query("INSERT INTO tabla_faker(nombre,email)VALUES('$faker->name','$faker->email')");
         
}    

?>
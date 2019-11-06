<?php
$host = 'localhost';
$user = 'root';
$password = 'root';

$mysqli = new mysqli($host,$user,$password);
if ($mysqli->connect_errno) {
    printf("Connection failed: %s\n", $mysqli->connect_error);
    die();
}

if ( !$mysqli->query('CREATE DATABASE accounts') ) {
    printf("Errormessage: %s\n", $mysqli->error);
}

$mysqli->query('
CREATE TABLE `accounts`.`users`
(
    `id` INT NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(50) NOT NULL,
     `last_name` VARCHAR(50) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    `hash` VARCHAR(32) NOT NULL,
    `active` BOOL NOT NULL DEFAULT 0,
PRIMARY KEY (`id`)
);') or die($mysqli->error);
?>

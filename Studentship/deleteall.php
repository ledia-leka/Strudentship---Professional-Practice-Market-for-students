<?php 
session_start();
$uni =$_GET['uni'];
$pdo = require 'config.php';
try{
$query = " UPDATE student join student_profile sp on student.pid=sp.pid SET sp.ssid = '2' WHERE iduni= :uni;";
$stmt = $pdo->prepare($query);
$p = ['uni' => $uni];
$stmt->bindParam(':uni', $uni, PDO::PARAM_INT);

$stmt->execute($p);}
catch(PDOException $e){
    echo($e->getMessage());}

$pdo = null;

header("Location: showStudents.php");
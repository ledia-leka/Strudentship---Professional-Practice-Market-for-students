<?php
session_start();
$pid = $_GET['pid'];
    $pdo = require 'config.php'; 
    $sql= "UPDATE student_profile SET ssid = '2' WHERE pid = :pid";
    $stmt = $pdo->prepare($sql);
  
    $p = ['pid' => $pid];
    $stmt->bindParam(':pid', $pid, PDO::PARAM_INT);
    $stmt->execute($p);
   
    $pdo = null;

   header("Location: showStudents.php");

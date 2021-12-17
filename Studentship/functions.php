<?php
function get_student($uni,$limit = null )
{
    $pdo = require 'config.php';

    $query = /*"select s.pid,s.studentid,s.fullname , s.email,u.uniname,d.degree_name , ur.repId from student as s
    join university as u on s.iduni= u.uniId
    join degrees as d on  d.did=s.degree_id 
    join universityregister as ur on u.uniId=ur.iduni
    join representative as r on ur.repId= r.repId;";
    */ " select s.pid,s.studentid,s.fullname , s.email,u.uniname,d.degree_name from student as s
   join student_profile sp on s.pid=sp.pid
   join university as u on s.iduni= u.uniId
   join degrees as d on  d.did=s.degree_id where s.iduni=$uni and sp.ssid='1'";if ($limit) {
        $query = $query .' LIMIT :resultLimit';
    }
    $stmt = $pdo->prepare($query);
    $stmt->bindParam('resultLimit', $limit, PDO::PARAM_INT);
    $stmt->execute();
    $people = $stmt->fetchAll();

    return $people;


}
function delete_all($uni,$limit = null )
{
    $pdo = require 'config.php';

    $query = " UPDATE student join student_profile sp on student.pid=sp.pid SET sp.ssid = '1' WHERE iduni= :uni;
    ";if ($limit) {
        $query = $query .' LIMIT :resultLimit';
    }
    $stmt = $pdo->prepare($query);
    $stmt->bindParam('resultLimit', $limit, PDO::PARAM_INT);
    $p = ['uni' => $uni];
    $stmt->execute($p);
    
    $pdo = null;

   header("Location: showStudents.php");
}

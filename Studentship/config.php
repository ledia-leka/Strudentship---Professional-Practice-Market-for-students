<?php
$config= array(
    'database_dns' => 'mysql:dbname=Studentship;host:localhost',
    'database_user'=>'root',
    'database_pass'=> null,
);
try{
$conn = new PDO($config['database_dns'], $config['database_user'],$config['database_pass']);
// set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Error in connection" . $e -> getMessage();
}
$sql= "use studentship";
$conn -> exec($sql);

return $conn;

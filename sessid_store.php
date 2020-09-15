<?php
session_start();
$database=new PDO("pgsql:host=localhost;dbname=postgres","postgres","<password>") or die('unable to reach the database'); 
if(isset($_GET['user'])){
$name=$_GET['user'];
$sessid=$_COOKIE['PHPSESSID'];
$cmd="INSERT INTO SESSIONS (name,sessid) values('$name','$sessid')";
echo $cmd;
$execution=$database->prepare($cmd);
$resut=$execution->execute();
}else{
try{
$sessid=$_COOKIE['PHPSESSID'];
$execution=$database->prepare("SELECT NAME FROM SESSIONS WHERE SESSID='$sessid'");
$execution->execute();
print_r($execution->fetchAll());
}catch(exception $error){echo $error;}
}
?>

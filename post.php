<?php

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$textarea=$_POST['textarea'];





$arr = array('name'=>$name,
'email'=>$email,
'password'=> $password,
'textarea'=>$textarea,



);


echo json_encode($arr);


?>
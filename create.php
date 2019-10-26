<?php

require_once 'classes/Db.php';
require_once 'classes/Employees.php';
$res="";
$GLOBALS['res'] = ''; 
function _autoload($class)
{
	require_once "classes/$class.php";
}


//if(isset($_POST['submit']))
//{
	
	//header(("Location:index.php"));
	$name=$_POST['name'];
	$age=$_POST['age'];
	$designation=$_POST['designation'];
	$email=$_POST['email'];

$fields=[
'name'=>$name,
'age'=>$age,
'designation'=>$designation,
'email'=>$email];

$employee=new Employees;
$res =$employee->Insert($fields);
//$employee->Insert();
echo $res;
//}



?>

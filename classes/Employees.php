<?php

class Employees extends Db{

public function select()
{
	$sql="select * from employees";
$result= $this->connect()->query($sql);
if($result->rowcount()>0)
{
while ($row=$result->fetch()) {
	$data[]=$row;
}

return $data;
}

}
public function select1()
{
	echo "string";
	}

public function Insert($fields)
{
	//echo "string";
	//header(("Location:index.php"));
	
$implodeColumn= implode(', ',array_keys($fields));
$implodeColumnholder= implode(', :',array_keys($fields) );

$sql="Insert into employees($implodeColumn) values (:".$implodeColumnholder.")";
 
$stmt=$this->connect()->prepare($sql);

foreach ($fields as $key => $value) {
	$stmt->bindValue(':'.$key,$value);
}

$stmtExec=$stmt->execute();

if ($stmtExec) {
	header(("Location:index.php"));
}
}

public function Selectone($id)
{
	$sql="select * from employees where id= :id";
	$stmt=$this->connect()->prepare($sql);
	$stmt->bindValue(":id",$id);
	$stmt->execute();
	$result=$stmt->fetch(PDO::FETCH_ASSOC);
	return $result;
}

public function Update($fields,$id)
{
$st="";
$counter=1;
$total_fields=count($fields);
foreach ($fields as $key => $value) {
	if ($counter===$total_fields) {
		$set="$key=:".$key;
		$st=$st.$set;
	}
	else
	{
		$set="$key=:".$key.",";
		$st=$st.$set;
		$counter++;
	}
}
$sql="";
$sql.="update employees set ".$st;
$sql.=" where id=" .$id;
//echo $sql;

$stmt=$this->connect()->prepare($sql);

foreach ($fields as $key => $value) {
	$stmt->bindValue(':'.$key, $value);
}

$stmtExec=$stmt->execute();

if ($stmtExec) {
	header("location:index.php");
}
else
{
	//echo "string";
}
}

public function delete_rec($id)
{
	//$sql="DELETE from employees where id= :id";
	//$stmt=$this->connect()->prepare($sql);
	//$stmt->bindValue(":id",$id);
	//$stmtExec=$stmt->execute();
	$sql="delete from employees where id= :id";
	$stmt=$this->connect()->prepare($sql);
	$stmt->bindValue(":id",$id);
	//$stmt->execute();
	$stmtExec=$stmt->execute();
	echo $id;
	if ($stmtExec) {
	//echo "stringooo";
}
else
{
	echo "string";
}
}

}
?>
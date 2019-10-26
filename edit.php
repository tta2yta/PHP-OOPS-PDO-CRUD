<?php

require_once 'classes/Db.php';
require_once 'classes/Employees.php';


function _autoload($class)
{
	require_once "classes/$class.php";
}

if(isset($_GET['id']))
{
  $uid=$_GET['id'];
  $employee=new Employees;
  $result=$employee->Selectone($uid);
}



if(isset($_POST['submit']))
{
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

  $id=$_POST['id'];
$employee=new Employees;
$employee->update($fields,$id);
//$employee->Insert();
}

?>
<!DOCTYPE html>

<html>
<head>
	<title>Employees</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<!-- navbar -->


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Power Employee</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
      <!--
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li>
  -->
      <!--
      <li class="nav-item">
        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
      </li>
  -->
    </ul>
    <form class="form-inline my-2 my-lg-0">


      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

<!-- table list of employees -->

<div class="container mt-4">
	<div class="col-lg-12">
		<div class="jumbotron">
			<h4 class="mb-4">Edit  Employess</h4>


			<form action="" method="post">
  <div class="form-group">
<input type="hidden" name="id" value="<?php echo $result['id']; ?>">

    <label for="Name">Name</label>
    <input type="text" class="form-control" name="name" value="<?php echo $result['name']; ?>" aria-describedby="nameHelp" placeholder="Enter Name">
    
  </div>
  <div class="form-group">
    <label for="age">age</label>
    <input type="text" class="form-control" name="age" value="<?php echo $result['age']; ?>" placeholder="age">
  </div>

  <div class="form-group">
    <label for="age">Designation</label>
    <input type="text" class="form-control" name="designation" value="<?php echo $result['designation']; ?>" placeholder="designation">
  </div>

  <div class="form-group">
    <label for="age">Email</label>
    <input type="text" class="form-control" id="email" name="email" value="<?php echo $result['email']; ?>"" placeholder="email">
  </div>
  
  <input  type="submit" name="submit" class="btn btn-primary">
</form>
			
		</div>
	</div>
	
</div>
</body>
</html>

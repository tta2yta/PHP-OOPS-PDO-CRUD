<?php

require_once 'classes/Db.php';
require_once 'classes/Employees.php';


function _autoload($class)
{
	require_once "classes/$class.php";
}

if (isset($_GET['del'])) {
	$id=$_GET['del'];

	$employee=new Employees;
	$employee->delete_rec($id);
	//echo $id;
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
			<h4 class="mb-4">All Employess</h4>
			<h5 class="mb-4"><a href="add_emp.html">Add New Employee</a></h5>
			<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">age</th>
      <th scope="col">Designation</th>
       <th scope="col">Email</th>
        <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
<?php
$employee= new Employees;
$rows=$employee->select();

foreach ($rows as $row) {
	?>
	<tr>
      <th scope="row"><?php echo $row['id'];?></th>
      <td><?php echo $row['name'];?></td>
      <td><?php echo $row['age'];?></td>
      <td><?php echo $row['designation'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><a href="edit.php?id=<?php echo $row['id'];?>" class="btn btn-sm btn-primary ">Edit</a>&nbsp;<a href="index.php?del=<?php echo $row['id'];?>" class="btn btn-sm btn-danger">Delete</a></td>
    </tr>
	<?php
}
?>

    
    
  </tbody>
</table>
		</div>
	</div>
	
</div>
</body>
</html>

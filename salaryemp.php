<?php

require_once('process/dbh.php');
$sql = "SELECT employee.id,employee.firstName,employee.lastName,salary.base,salary.bonus,salary.total from employee,`salary` where employee.id=salary.id";

$result = mysqli_query($conn, $sql);

?>



<html>

<head>
	<title>Salary Table | Employee Management System</title>
	<link rel="stylesheet" type="text/css" href="style/styleview.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

	<header>
		<nav>
			<h1>EMS</h1>
			<ul id="navli">
				<li><a class="homeblack" href="aloginwel.php">HOME</a></li>

				<li><a class="homeblack" href="addemp.php">Add Employee</a></li>
				<li><a class="homeblack" href="viewemp.php">View Employee</a></li>
				<li><a class="homeblack" href="assign.php">Assign Project</a></li>
				<li><a class="homeblack" href="assignproject.php">Project Status</a></li>
				<li><a class="homered" href="salaryemp.php">Salary Table</a></li>
				<li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
				<li><a class="homeblack" href="alogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>

	<div class="divider"></div>
	<div id="divimg">

	</div>

	<table class="table table-hover">
		<thead>
		<tr>
			<th scope="col">Emp. ID</th>
			<th scope="col">Name</th>
			<th scope="col">Base Salary</th>
			<th scope="col">Bonus</th>
			<th scope="col">TotalSalary</th>
		</tr>
		</thead>
		<tbody>
		<?php
		while ($employee = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<td>" . $employee['id'] . "</td>";
			echo "<td>" . $employee['firstName'] . " " . $employee['lastName'] . "</td>";

			echo "<td>" . $employee['base'] . "</td>";
			echo "<td>" . $employee['bonus'] . " %</td>";
			echo "<td>" . $employee['total'] . "</td>";
		}


		?>
		</tbody>
	</table>
</body>

</html>
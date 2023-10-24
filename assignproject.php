<?php

require_once('process/dbh.php');
$sql = "SELECT * from `project` order by subdate desc";

$result = mysqli_query($conn, $sql);

?>

<html>

<head>
	<title>Project Status | Admin Panel | Employee Management System</title>
	<link rel="stylesheet" type="text/css" href="style/styleview.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		th{
			background: none;
			color: black;
			margin: 30px;
		}
		
		
	</style>
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
				<li><a class="homered" href="assignproject.php">Project Status</a></li>
				<li><a class="homeblack" href="salaryemp.php">Salary Table</a></li>
				<li><a class="homeblack" href="empleave.php">Employee Leave</a></li>
				<li><a class="homeblack" href="alogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>

	<div class="divider"></div>

	<table class="table table-hover" style="width: 80%;margin-left:80px;margin-top:60px">
		<thead >
			<tr>
				<th scope="col" ">projetID</th>
				<th scope="col">employeID</th>
				<th scope="col">pName</th>
				<th scope="col">dueDate</th>
				<th scope="col">subDate</th>
				<th scope="col">mark</th>
				<th scope="col">status</th>
				<th scope="col">Mark</th>
			</tr>
		</thead>
		<tbody>
			<?php
		while ($employee = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			echo "<th scope='row'>" . $employee['pid'] . "</th>";
			echo "<td>" . $employee['eid'] . "</td>";
			echo "<td>" . $employee['pname'] . "</td>";
			echo "<td>" . $employee['duedate'] . "</td>";
			echo "<td>" . $employee['subdate'] . "</td>";
			echo "<td>" . $employee['mark'] . "</td>";
			echo "<td>" . $employee['status'] . "</td>";
			echo "<td><a href=\"mark.php?id=$employee[eid]&pid=$employee[pid]\">Mark</a>";
			echo "</tr>";
		}
		
		
		?>
		</tbody>

	</table>


</body>

</html>
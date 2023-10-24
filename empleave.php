<?php

require_once('process/dbh.php');

$sql = "Select employee.id, employee.firstName, employee.lastName, employee_leave.start, employee_leave.end, employee_leave.reason, employee_leave.status, employee_leave.token From employee, employee_leave Where employee.id = employee_leave.id order by employee_leave.token";

$result = mysqli_query($conn, $sql);

?>



<html>

<head>
	<title>Employee Conge | Admin | Employee Management System</title>
	<link rel="stylesheet" type="text/css" href="style/styleview.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>

	<header>
		<nav>
			<h1>EMS</h1>
			<ul id="navli">
				<li><a class="homeblack" href="aloginwel.php">HOME</a></li>

				<li><a class="homeblack" href="addemp.php">ajouter Employee</a></li>
				<li><a class="homeblack" href="viewemp.php">voir Employee</a></li>
				<li><a class="homeblack" href="assign.php">Assign Project</a></li>
				<li><a class="homeblack" href="assignproject.php">Projet Status</a></li>
				<li><a class="homeblack" href="salaryemp.php">salaire Table</a></li>
				<li><a class="homered" href="empleave.php">Employee conge</a></li>
				<li><a class="homeblack" href="alogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>

	<div class="divider"></div>
		<table class="table table-striped"> 
			<thead>
			<tr >
				<th scope="col">Emp. ID</th>
				<th scope="col">nb</th>
				<th scope="col">Nom</th>
				<th scope="col"> Date Date</th>
				<th scope="col"> Date Fin</th>
				<th scope="col">Total jours</th>
				<th scope="col">raison</th>
				<th scope="col">Status</th>
				<th scope="col">Options</th>
			</tr>
			</thead>
			<tbody>
			<?php
			while ($employee = mysqli_fetch_assoc($result)) {

				$date1 = new DateTime($employee['start']);
				$date2 = new DateTime($employee['end']);
				$interval = $date1->diff($date2);
				$interval = $date1->diff($date2);
				echo "<tr>";
				echo "<td>" . $employee['id'] . "</td>";
				echo "<td>" . $employee['token'] . "</td>";
				echo "<td>" . $employee['firstName'] . " " . $employee['lastName'] . "</td>";

				echo "<td>" . $employee['start'] . "</td>";
				echo "<td>" . $employee['end'] . "</td>";
				echo "<td>" . $interval->days . "</td>";
				echo "<td>" . $employee['reason'] . "</td>";
				echo "<td>" . $employee['status'] . "</td>";
				echo "<td><a href=\"approve.php?id=$employee[id]&token=$employee[token]\"  onClick=\"return confirm('Are you sure you want to Approve the request?')\">Approve</a> | <a href=\"cancel.php?id=$employee[id]&token=$employee[token]\" onClick=\"return confirm('Are you sure you want to Canel the request?')\">Cancel</a></td>";
			}


			?>
			</tbody>
		</table>

</body>

</html>
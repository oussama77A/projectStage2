<?php
$id = (isset($_GET['id']) ? $_GET['id'] : '');
require_once('process/dbh.php');
$sql1 = "SELECT * FROM `employee` where id = '$id'";
$result1 = mysqli_query($conn, $sql1);
$employeen = mysqli_fetch_array($result1);
$empName = ($employeen['firstName']);

$sql = "SELECT id, firstName, lastName,  points FROM employee, rank WHERE rank.eid = employee.id order by rank.points desc";
$sql1 = "SELECT `pname`, `duedate` FROM `project` WHERE eid = $id and status = 'Due'";

$sql2 = "Select * From employee, employee_leave Where employee.id = $id and employee_leave.id = $id order by employee_leave.token";

$sql3 = "SELECT * FROM `salary` WHERE id = $id";

//echo "$sql";
$result = mysqli_query($conn, $sql);
$result1 = mysqli_query($conn, $sql1);
$result2 = mysqli_query($conn, $sql2);
$result3 = mysqli_query($conn, $sql3);
?>



<html>

<head>
	<title>Employee Panel | Employee Management System</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style/styleemplogin.css">
	<style>
		table {
			margin-bottom: 80px;
		}
		th{
			background-color: white;
			color: black;
		}
	</style>
</head>

<body>

	<header>
		<nav>
			<h1>Employee Management System</h1>
			<ul id="navli">
				<li><a class="homered" href="eloginwel.php?id=<?php echo $id ?>"">HOME</a></li>
				<li><a class=" homeblack" href="myprofile.php?id=<?php echo $id ?>"">My Profile</a></li>
				<li><a class=" homeblack" href="empproject.php?id=<?php echo $id ?>"">My Projects</a></li>
				<li><a class=" homeblack" href="applyleave.php?id=<?php echo $id ?>"">Apply Leave</a></li>
				<li><a class=" homeblack" href="elogin.html">Log Out</a></li>
			</ul>
		</nav>
	</header>

	<div class="divider"></div>
	<div id="divimg">
		<div>

			<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Empolyee Leaderboard </h2>
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="col">Seq.</th>
						<th scope="col">Emp. ID</th>
						<th scope="col">Name</th>
						<th scope="col">Points</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$seq = 1;
					while ($employee = mysqli_fetch_assoc($result)) {
						echo "<tr>";
						echo "<th scope='row'>" . $seq . "</th>";
						echo "<td>" . $employee['id'] . "</td>";

						echo "<td>" . $employee['firstName'] . " " . $employee['lastName'] . "</td>";

						echo "<td>" . $employee['points'] . "</td>";

						$seq += 1;
					}


					?>
				</tbody>
			</table>

			<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Due Projects</h2>


			<table>

				<tr>
					<th align="center">Project Name</th>
					<th align="center">Due Date</th>

				</tr>



				<?php
				while ($employee1 = mysqli_fetch_assoc($result1)) {
					echo "<tr>";

					echo "<td>" . $employee1['pname'] . "</td>";

					echo "<td>" . $employee1['duedate'] . "</td>";
				}


				?>

			</table>



			<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Salary Status</h2>


			<table>

				<tr>

					<th align="center">Base Salary</th>
					<th align="center">Bonus</th>
					<th align="center">Total Salary</th>

				</tr>



				<?php
				while ($employee = mysqli_fetch_assoc($result3)) {


					echo "<tr>";


					echo "<td>" . $employee['base'] . "</td>";
					echo "<td>" . $employee['bonus'] . " %</td>";
					echo "<td>" . $employee['total'] . "</td>";
				}





				?>

			</table>










			<h2 style="font-family: 'Montserrat', sans-serif; font-size: 25px; text-align: center;">Leave Satus</h2>


			<table>

				<tr>

					<th align="center">Start Date</th>
					<th align="center">End Date</th>
					<th align="center">Total Days</th>
					<th align="center">Reason</th>
					<th align="center">Status</th>
				</tr>



				<?php
				while ($employee = mysqli_fetch_assoc($result2)) {
					$date1 = new DateTime($employee['start']);
					$date2 = new DateTime($employee['end']);
					$interval = $date1->diff($date2);
					$interval = $date1->diff($date2);

					echo "<tr>";


					echo "<td>" . $employee['start'] . "</td>";
					echo "<td>" . $employee['end'] . "</td>";
					echo "<td>" . $interval->days . "</td>";
					echo "<td>" . $employee['reason'] . "</td>";
					echo "<td>" . $employee['status'] . "</td>";
				}





				?>

			</table>





			<br>
			<br>
			<br>
			<br>
			<br>







		</div>


		</h2>




	</div>
</body>

</html>
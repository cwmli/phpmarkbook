<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="theme.css">
		<link rel="stylesheet" type="text/css" href="animate.css">
		<link rel="stylesheet" type="text/css" href="font_data.css">
		<script src="scripts/buttons.js" type="text/javascript"></script>
		<title>Online Markbook</title>
	</head>
<body>
	<?php
		$database = new mysqli("SERVER", "USER", "PASS", "ALIAS");
		if(!$database){
			echo "<script>console.log('Could not connect: $database->connect_error')</script>";
		}
		else{
			echo "<script>console.log('Connected to database');</script>";
		}

		include_once("sqlquery.php");
		//creates the floating form
		if(isset($_POST["menu_edit"])){
			echo "<div id='floatcontainer'>
			<input type='button' id='action_CLOSE' value='X' onclick='StartRemove(this.id)'>
			<br>
				<form method='post'>
				New Entry:
					<table align='center'>
						<tr><td class='subform'>First Name: <input class='float_form' type='text' name='f_name' required></td></tr>
						<tr><td class='subform'>Last Name: <input class='float_form' type='text' name='l_name' required></td></tr>
						<tr><td class='subform'>Student Number: <input class='float_form' type='number' name='s_num' required></td></tr>
						<tr><td class='subform'><input class='float_form' type='submit' name='add' value='ADD STUDENT' id='action_EDIT'></td></tr>
					</table>
				</form>
				<form method='post' style='margin-top: 3vw;'>
				Delete Entry:
					<table align='center'>
						<tr><td class='subform'>Name/Student Number:<input class='float_form' type='text' name='entry' required></td></tr>
						<tr><td class='subform'><input type='submit' id='action_DELETE' name='del' value='DELETE'></td></tr>
					</table>
				</form>
				<form method='post' style='margin-top: 3vw;'>
				Modify Entry:
					<table align='center'>
						<tr><td class='subform'>First Name:<input class='float_form' type='text' name='e_f_name'></td></tr>
						<tr><td class='subform'>Last Name:<input class='float_form' type='text' name='e_l_name'></td></tr>
						<tr><td class='subform'>Student Number:<input class='float_form' type='text' name='e_s_num'></td></tr>
						<tr><td class='subform'>Subject:<input class='float_form' type='text' name='e_subj'></td></tr>
						<tr><td class='subform'>Mark:<input class='float_form' type='text' name='e_mark'></td></tr>
						<tr><td class='subform'><input type='submit' id='action_EDIT' name='edit' value='UPDATE'></td></tr>
					</table>
				</form>
			</div>";
		}
		//process form information for adding new student
		if(isset($_POST["add"])){
			$fname = $_POST["f_name"];
			$sname = $_POST["l_name"];
			$num = $_POST["s_num"];

			$sql = AddNewStudent($fname, $sname, $num);
			QuerySQL($sql, $database);
		}
		//process form information for deleting a student
		if(isset($_POST["del"])){
			$info = $_POST["entry"];

			if(is_numeric($info)){
				$sql = DeleteStudent($info, 'StudentNum');
				QuerySQL($sql, $database);
			}
			else{//check first name
				$sql = DeleteStudent($info, 'FirstName');
				$res = QuerySQL($sql, $database);
				if($res == 1){//failed firstname,check last name
					$sql = DeleteStudent($info, 'LastName');
					QuerySQL($sql, $database);
				}
			}
		}
		//process form information for editing a student
		if(isset($_POST["edit"])){
		}
	?>
	<div class="menublock">
		<div class="menutitlecontainer">
			<div class="menutitle">PHP & MYSQL <sub>ONLINEMARKBOOK</sub></div>
		</div>
		<ul class="menucontainer">
			<li><div class="menuitem">
				<form method="post">
					<input type="submit" name="menu_edit" value="EDIT" id="menu_button"></div>
				</form></li>
			<li><div class="menuitem"><a href="../index.html">&#8629;</a></div></li>
		</ul>
	</div>
	<div class="maincontainer">
		<div class="subcontainer_phpmb">
				<?php
					$sql = SelectData('*','Markbook');
					$tabledata = QuerySQL($sql, $database);

					if($tabledata->num_rows > 0){
						//table headings
						echo "<table align='center'><tr class='first_col'>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Student Number</th>
								</tr>";
						//table content
						while($field = mysqli_fetch_assoc($tabledata)){
							echo "<tr class='highlightable_row'><td>".$field['FirstName']."</td>";
							echo "<td>".$field['LastName']."</td>";
							echo "<td>".$field['StudentNum']."</td></tr>";
						}
						//close the table
						echo "</table>";
					}
					else{
						echo "There are no markbook entries to view. Press EDIT to add an entry.";
					}
				?>
		</div>
	</div>
</body>
</html>

<?php
if (!empty('roll_no')||!empty('name')||!empty('reg_no')||!empty('age')||!empty('gender')) {
	$link=mysqli_connect("localhost","root","");
	mysqli_select_db($link,"student");
	if (mysqli_connect_error()) {
		die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
	}
}


if(isset($_POST["insert"]))//Insert Records
{
	mysqli_query($link,"insert into details values('$_POST[t1]','$_POST[t2]','$_POST[t3]','$_POST[t4]','$_POST[t5]','$_POST[t6]')");
	echo "Insert Data Successfully...!";
}

if(isset($_POST["delete"]))//Delete Records
{
	mysqli_query($link,"delete from details where roll_no='$_POST[t1]'");
	echo "Deleted Data Successfully...!";
}

if(isset($_POST["update"]))//Update Data
{
	mysqli_query($link,"update details set roll_no='$_POST[t1]',name='$_POST[t2]',reg_no='$_POST[t3]',class='$_POST[t4]',age='$_POST[t5]',gender='$_POST[t6]' where roll_no='$_POST[t1]'");
}
echo "<br/>";
if(isset($_POST["display"]))//Display Data
{
    echo "<table border=1 align=center>";
	echo "<tr bgcolor=#CCCCCC>";
	echo "<td>Roll_No</td>";
	echo "<td>Name</td>";
	echo "<td>Reg_No</td>";
	echo "<td>Class</td>";
	echo "<td>Age</td>";
	echo "<td>Gender</td>";
	echo "</tr>";
	$res=mysqli_query($link,"select * from details");
	while ($rs=mysqli_fetch_object($res))
	{
        echo"<tr>";
	    echo"<td>"; echo $rs->roll_no; echo"</td>";
	    echo"<td>"; echo $rs->name; echo"</td>";
	    echo"<td>"; echo $rs->reg_no; echo"</td>";
	    echo"<td>"; echo $rs->class; echo"</td>";
	    echo"<td>"; echo $rs->age; echo"</td>";
	    echo"<td>"; echo $rs->gender; echo"</td>";
        echo"</tr>";
    }
}

if(isset($_POST["search"]))//Search Data
{
	echo "<table border=1 align=center>";
	echo "<tr bgcolor=#CCCCCC>";
	echo "<td>Roll_No</td>";
	echo "<td>Name</td>";
	echo "<td>Reg_No</td>";
	echo "<td>Class</td>";
	echo "<td>Age</td>";
	echo "<td>Gender</td>";
	echo "</tr>";
	$res=mysqli_query($link,"select * from details where name='$_POST[t2]'");
	while ($rs=mysqli_fetch_object($res))
	{
		echo"<tr>";
	    echo"<td>"; echo $rs->roll_no; echo"</td>";
	    echo"<td>"; echo $rs->name; echo"</td>";
	    echo"<td>"; echo $rs->reg_no; echo"</td>";
	    echo"<td>"; echo $rs->class; echo"</td>";
	    echo"<td>"; echo $rs->age; echo"</td>";
	    echo"<td>"; echo $rs->gender; echo"</td>";
        echo"</tr>";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Details</title>
</head>
<body>
	<form name="form1" action="" method="post">
	<h1 align="center">Student Database Application</h1>
	<hr size="3" color="#FF0000">
	<table align="center">
		<tr>
			<td>Roll_No:</td>
			<td><input type="text" name="t1" placeholder="Roll_No" required=""></td>
		</tr>
		<tr>
			<td>Name:</td>
			<td><input type="text" name="t2" placeholder="Name" required=""></td>
		</tr>
		<tr>
			<td>Reg_No:</td>
			<td><input type="text" name="t3" placeholder="Reg_No" required=""></td>
		</tr>
		<tr>
			<td>Class:</td>
			<td><input type="text" name="t4" placeholder="Class" required=""></td>
		</tr>
		<tr>
			<td>Age:</td>
			<td><input type="text" name="t5" placeholder="Age" required=""></td>
		</tr>
		<tr>
			<td colspan="1">Gender:</td>
			<td><select name="t6" required="">
				<option>--Please Select--</option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				<option value="Others">Others</option>
			</select></td>
		</tr>
		<tr>
			<td colspan="2">
				<input type="submit" name="insert" value="Insert">
				<input type="submit" name="delete" value="Delete">
				<input type="submit" name="update" value="Update">
				<input type="submit" name="display" value="Display">
				<input type="submit" name="search" value="Search">
			</td>
		</tr>
	</table>
</form>
</table>
</body>
</html>
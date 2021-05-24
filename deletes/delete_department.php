<?php
include("../connect.php");
$id=$_GET['id'];
$clinic_id=$_GET['clinic'];
#to check if the selected department has doctors
$sel=mysqli_query($conn,"SELECT * FROM doctor where department_id='$id' and clinic_id='$clinic_id'");
if (mysqli_num_rows($sel) > 0) {
	# code...
	echo "<script type='text/javascript'>alert('This department has doctors. please remove those doctors first..')</script>";
	echo "<script language='javascript'>window.location.href = '../add_department.php'</script>";
}else{
$del=mysqli_query($conn,"DELETE FROM department WHERE department_id='$id' and clinic_id='$clinic_id'");
if ($del) {
	# code...
	header("location:../add_department.php");
}
}
?>
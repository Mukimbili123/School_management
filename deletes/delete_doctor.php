<?php
include("../connect.php");
$id=$_GET['id'];
$clinic_id=$_GET['clinic'];
#delete doctor
$del=mysqli_query($conn,"DELETE FROM doctor WHERE doctor_id='$id' and clinic_id='$clinic_id'");
if ($del) {
	# code...
	header("location:../add_doctor.php");
}

?>
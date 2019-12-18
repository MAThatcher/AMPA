<?php
session_start(); 

if ($_POST) {

  	$username = "java";
	$password = "java";

	$db_conn_str =
	"(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)
				   (HOST = cedar.humboldt.edu)
				   (PORT = 1521))
			(CONNECT_DATA = (SID = STUDENT)))";

	// Attempt to log into Oracle
	$conn = oci_connect($username, $password, $db_conn_str);

	if (! $conn) {
		echo "Could not connect to database!";
		exit;	
	}
	
	$_SESSION['apn'] = (int)$_POST['apn'];
	$_SESSION['permit'] = $_POST['permit'];
	$_SESSION['age'] = $_POST['age'];
	$_SESSION['prox'] = $_POST['prox'];
	$_SESSION['comp'] = $_POST['comp'];
	$_SESSION['cond'] = $_POST['cond'];
	$_SESSION['soil'] = $_POST['soil'];
	$_SESSION['slope'] = $_POST['slope'];
	$_SESSION['score'] = (int)$_POST['hidden_score'];

	// Query will check if there is already a parcel with the submitted APN
	$compiled = oci_parse($conn, "SELECT * FROM parcel WHERE apn = :parcel_num");
	oci_bind_by_name($fetch_rows, ':parcel_num', $_SESSION['apn']);
	// Execute the compiled statement
	oci_execute($compiled);

	// If no rows are returned, this is a new parcel, so we send them to the new parcel page
	if (oci_num_rows($compiled) == 0) {
		header('Location: ../public/new_parcel.php');
	} else {
		$permit = $_POST['permit'];
		$age = $_POST['age'];
		$proximity = $_POST['prox'];
		$compliant = $_POST['comp'];
		$condition = $_POST['cond'];
		$soil = $_POST['soil'];
		$slope = $_POST['slope'];
		$score = (int)$_POST['hidden_score'];

		//echo($permit.$age.$proximity.$compliant.$condition.$soil.$slope);

		// Attempt to log into Oracle
		$conn = oci_connect($username, $password, $db_conn_str);

		if (! $conn) {
			echo "Could not connect to database!";
			exit;	
		}

		$insert_stmt = "INSERT INTO ranking (apn, permit_on_file, age_of_system, proximity, currently_compliant, slope, condition, soil, total_score)
										VALUES (:parcel_num, :permit, :age, :proximity, :compliant, :slope, :condition, :soil, :score)";
		
		$compiled = oci_parse($conn, $insert_stmt);

		oci_bind_by_name($compiled, ':parcel_num', $parcel_num);
		oci_bind_by_name($compiled, ':permit', $permit);
		oci_bind_by_name($compiled, ':age', $age);
		oci_bind_by_name($compiled, ':proximity', $proximity);
		oci_bind_by_name($compiled, ':compliant', $compliant);
		oci_bind_by_name($compiled, ':slope', $slope);
		oci_bind_by_name($compiled, ':condition', $condition);
		oci_bind_by_name($compiled, ':soil', $soil);
		oci_bind_by_name($compiled, ':score', $score);

		oci_execute($compiled);

		header('Location: ../public/index.php');
	}
}
?>


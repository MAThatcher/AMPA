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

	/*
	FIRST: Insert into parcel
	*/
	$zip = (int)$_POST['parcel_zip'];

	$compiled = oci_parse($conn, "INSERT INTO parcel (APN, parcel_city, parcel_zip, parcel_street, occupied)
																VALUES (:apn, :parcel_city, :parcel_zip, :parcel_street, :occupied)");
	oci_bind_by_name($compiled, ':apn', $_SESSION['apn']);
	oci_bind_by_name($compiled, ':parcel_city', $_POST['parcel_city']);
	oci_bind_by_name($compiled, ':parcel_zip', $zip);
	oci_bind_by_name($compiled, ':parcel_street', $_POST['parcel_street']);
	oci_bind_by_name($compiled, ':occupied', $_POST['parcel_occ']);
	oci_execute($compiled);
	oci_free_statement($compiled);
	/*
	Second: Insert into owner if we choose so
	*/
	if($_POST['owner_select'] == "NA"){//NA: We are adding a new owner
		$compiled = oci_parse($conn, "INSERT INTO owner
									VALUES (:apn, :owner_name, :owner_address, :owner_city, :owner_state, :owner_zip)");
		oci_bind_by_name($compiled, ':apn', $_SESSION['apn']);
		oci_bind_by_name($compiled, ':owner_name', $_POST['owner_name']);
		oci_bind_by_name($compiled, ':owner_address', $_POST['owner_add']);
		oci_bind_by_name($compiled, ':owner_city', $_POST['owner_city']);
		oci_bind_by_name($compiled, ':owner_state', $_POST['owner_state']);
		oci_bind_by_name($compiled, ':owner_zip', $_POST['owner_zip']);
		oci_execute($compiled);
		oci_free_statement($compiled);

	}else{
		/*TODO: Select the owner with the name matching owner_select
				Insert into owner their info plus the new APN
		*/
	}
	/*
	third: Insert into ranking
	*/
	$compiled = oci_parse($conn, "INSERT INTO ranking (apn, permit_on_file, age_of_system, proximity, currently_compliant, slope, condition, soil, total_score)
																VALUES (:parcel_num, :permit, :age, :proximity, :compliant, :slope, :condition, :soil, :score)");
	oci_bind_by_name($compiled, ':parcel_num', $_SESSION['apn']);
	oci_bind_by_name($compiled, ':permit', $_SESSION['permit']);
	oci_bind_by_name($compiled, ':age', $_SESSION['age']);
	oci_bind_by_name($compiled, ':proximity', $_SESSION['prox']);
	oci_bind_by_name($compiled, ':compliant', $_SESSION['comp']);
	oci_bind_by_name($compiled, ':slope', $_SESSION['slope']);
	oci_bind_by_name($compiled, ':condition', $_SESSION['cond']);
	oci_bind_by_name($compiled, ':soil', $_SESSION['soil']);
	oci_bind_by_name($compiled, ':score', $_SESSION['score']);
	oci_execute($compiled);
	oci_free_statement($compiled);

	header('Location: ../public/index.php');
}
?>
 <html>
    <head>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="../styles/style.css">

		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

		<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
		
		
		</head>
		<body>
		<nav class="navbar navbar-dark bg-dark">
			<a class="navbar-brand" href="../public/index.php">
				<img src="assets/drop.png" class="pr-2">
				Advanced Management Protection Application
			</a>
			<ul class="nav justify-content-center">
				<li class="nav-item">
					<a class="nav-link" href="../public/index.php">Add Ranking</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="../public/map.html">AMPA Map</a>
				</li>
			</ul>
		</nav>
 <?php 
session_start();
	if ($_POST){
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
	$table_query = "SELECT owner_name,
					owner_address,
					owner_city,
					owner_state,
					owner_zip, 
					total_score	
					FROM owner o, ranking r
					WHERE o.APN = r.APN
					AND r.total_score >= :a 
					ORDER BY total_score DESC, owner_name ASC";
	
	$letter_stmt = oci_parse($conn, $table_query);
	
	$number = $_POST['number'];
	
	oci_bind_by_name($letter_stmt, ':a', $number);
	
	$compiled = oci_parse($conn, $table_query);
	
	oci_execute($letter_stmt, OCI_DEFAULT);

	?>

	<table>
        <th> Owners to recieve letters </th>
        <tr>
			<th scope="col"> Score </th>
             <th scope="col"> Name </th>
             <th scope="col"> Street</th>
             <th scope="col"> City</th>
             <th scope="col"> State </th> 
             <th scope="col"> Zip </th>
		</tr>

<?php
            while (oci_fetch($letter_stmt))
            {
                $curr_name = oci_result($letter_stmt, "OWNER_NAME");
                $curr_add = oci_result($letter_stmt, "OWNER_ADDRESS");
                $curr_city = oci_result($letter_stmt, "OWNER_CITY");
                $curr_state = oci_result($letter_stmt, "OWNER_STATE");
                $curr_zip = oci_result($letter_stmt, "OWNER_ZIP");
				$curr_score = oci_result($letter_stmt, "TOTAL_SCORE");
            ?>
			<tr>
				<td> <?= $curr_score ?> </td>
                 <td> <?= $curr_name ?> </td>
                 <td> <?= $curr_add ?> </td>
                 <td> <?= $curr_city ?> </td>
                 <td> <?= $curr_state ?> </td>
                 <td> <?= $curr_zip ?> </td>
				 
            </tr>
	
 <?php
            }
		}
  ?>
</table>
	<form method="post" action="./test.php">
        <input type="submit" name="finish" value="Go Back" />
	</form>
	<form method="post" action="../public/index.php">	
        <input type="submit" name="go_back" value="Finish and Close" />
	</body>
</html>
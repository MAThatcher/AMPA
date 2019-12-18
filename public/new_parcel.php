<!DOCTYPE html>
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
		<?php
			session_start(); 
		?>
		<nav class="navbar navbar-dark bg-dark">
			<a class="navbar-brand" href="./index.php">
				<img src="assets/drop.png" class="pr-2">
				Advanced Management Protection Application
			</a>
			<ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link" href="./index.php">Add Ranking</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="./map.html">AMPA Map</a>
                </li>
            </ul>
		</nav>

		<div class="m-5 p-4 parcel_wizard">

			<h1 style="margin: auto;">Parcel Wizard</h1>

			<div class="parcel_form">
			<form id="parcel_form" action="../scripts/submit_parcel.php" method="post">
	
				<div class="row">
				<div class="col">
					<h3>Parcel Information</h3>
				  <input class="form-control" name="parcel_city" placeholder="City..."><br>
					<input class="form-control" name="parcel_street" placeholder="Street..."><br>
					<input class="form-control" name="parcel_zip" placeholder="ZIP Code..."><br>
					Occupied?<br>
					<input type="radio" value="Yes" name="parcel_occ" checked>Yes<br>
					<input type="radio" value="No" name="parcel_occ">No<br><br>
				</div>

				<div class="col">
					<h3>Owner Information</h3>
					<input id="owner_name" class="form-control" name="owner_name" placeholder="Name..."><br>
					<input id="owner_add" class="form-control" name="owner_add" placeholder="Address..."><br>
					<input id="owner_city" class="form-control" name="owner_city" placeholder="City..."><br>
					<input id="owner_zip" class="form-control" name="owner_zip" placeholder="ZIP Code..."><br>
					State<br>
					<select id="owner_state" class="form-control" name="owner_state">
							<option value="">N/A</option>
							<option value="AK">Alaska</option>
							<option value="AL">Alabama</option>
							<option value="AR">Arkansas</option>
							<option value="AZ">Arizona</option>
							<option value="CA">California</option>
							<option value="CO">Colorado</option>
							<option value="CT">Connecticut</option>
							<option value="DC">District of Columbia</option>
							<option value="DE">Delaware</option>
							<option value="FL">Florida</option>
							<option value="GA">Georgia</option>
							<option value="HI">Hawaii</option>
							<option value="IA">Iowa</option>
							<option value="ID">Idaho</option>
							<option value="IL">Illinois</option>
							<option value="IN">Indiana</option>
							<option value="KS">Kansas</option>
							<option value="KY">Kentucky</option>
							<option value="LA">Louisiana</option>
							<option value="MA">Massachusetts</option>
							<option value="MD">Maryland</option>
							<option value="ME">Maine</option>
							<option value="MI">Michigan</option>
							<option value="MN">Minnesota</option>
							<option value="MO">Missouri</option>
							<option value="MS">Mississippi</option>
							<option value="MT">Montana</option>
							<option value="NC">North Carolina</option>
							<option value="ND">North Dakota</option>
							<option value="NE">Nebraska</option>
							<option value="NH">New Hampshire</option>
							<option value="NJ">New Jersey</option>
							<option value="NM">New Mexico</option>
							<option value="NV">Nevada</option>
							<option value="NY">New York</option>
							<option value="OH">Ohio</option>
							<option value="OK">Oklahoma</option>
							<option value="OR">Oregon</option>
							<option value="PA">Pennsylvania</option>
							<option value="PR">Puerto Rico</option>
							<option value="RI">Rhode Island</option>
							<option value="SC">South Carolina</option>
							<option value="SD">South Dakota</option>
							<option value="TN">Tennessee</option>
							<option value="TX">Texas</option>
							<option value="UT">Utah</option>
							<option value="VA">Virginia</option>
							<option value="VT">Vermont</option>
							<option value="WA">Washington</option>
							<option value="WI">Wisconsin</option>
							<option value="WV">West Virginia</option>
							<option value="WY">Wyoming</option>
						</select>
						<br><br>Existing Owner<br>
						<select class="form-control" id="owner_select" name="owner_select">
							<option value="NA">N/A</option>
							<?php
							$conn = oci_connect("java", "java", "(DESCRIPTION = (ADDRESS = (PROTOCOL = TCP)
																												 (HOST = cedar.humboldt.edu)
																											  (PORT = 1521))
																									(CONNECT_DATA = (SID = STUDENT)))");

    					$result = oci_parse($conn, "select DISTINCT owner_name from owner");
							oci_execute($result);

							while (oci_fetch($result)) {
								$curr_name = oci_result($result, 'OWNER_NAME');
								
								echo "<option>".$curr_name."</option>";
							}

							?> 
						</select>
				</div>
				<div class="col">
					<h3>Ranking Information</h3>

					<div class="row">
						<div class="col">
						<ul class="list-group">
							<li class="list-group-item"><strong>APN: </strong><?=$_SESSION['apn'];?></li>
							<li class="list-group-item"><strong>Permit: </strong><?=$_SESSION['permit'];?></li>
							<li class="list-group-item"><strong>Age: </strong><?=$_SESSION['age'];?></li>
							<li class="list-group-item"><strong>Proximity: </strong><?=$_SESSION['prox'];?></li>
						</div>
						<div class="col">
							<li class="list-group-item"><strong>Compliance: </strong><?=$_SESSION['comp'];?></li>
							<li class="list-group-item"><strong>Parcel Condition: </strong><?=$_SESSION['cond'];?></li>
							<li class="list-group-item"><strong>Soil: </strong><?=$_SESSION['soil'];?></li>
							<li class="list-group-item"><strong>Slope: </strong><?=$_SESSION['slope'];?></li>
							<li class="list-group-item"><strong>Score: </strong><?=$_SESSION['score'];?></li>
						</ul>
						</div>
					</div>	
				</div>
				</div>

				<br><button id="btnSubmit" type="button" class="btn btn-primary">Submit</button>
				</form> 
				</div>
		</div>
	</body>

	<script>
	$(document).ready(function(){
		var selected_owner = "";

		$("#owner_select").select2({ width: '70%'});
		$('#owner_state').select2();

		$("#btnSubmit").click(function(){
			$("#parcel_form").submit();
		}); 

		$("#owner_select").change(function() {
			selected_owner = $("#owner_select option:selected").text();
			if(selected_owner == "N/A") {
				$('#owner_name').prop("disabled", false);
				$('#owner_add').prop("disabled", false);
				$('#owner_city').prop("disabled", false);
				$('#owner_zip').prop("disabled", false);
				$('#owner_state').prop("disabled", false);
			}else{
				$('#owner_name').prop("disabled", true);
				$('#owner_add').prop("disabled", true);
				$('#owner_city').prop("disabled", true);
				$('#owner_zip').prop("disabled", true);
				$('#owner_state').prop("disabled", true);
			}
		});
	})
		
	</script>

	<!-- 
    create table parcel
		(APN            number not null,
		old_apn         number,
		parcel_city		varchar2(25),
		parcel_zip		number,
		parcel_street	varchar2(50),
		occupied        varchar2(4),
		primary key (apn)
		);

		create table owner
		(APN 				number not null,
		owner_name			varchar2(215),
		owner_address		varchar2(215),
		owner_city			varchar2(25),
		owner_state			varchar2(25),
		owner_zip			varchar2(25),
		foreign key (apn) references ranking,
		primary key (apn)
		);

		create table update_table
		(APN				number not null,
		DATE_OF_CHANGE		date default sysdate,
		old_field			varchar2(25),
		old_field_val		varchar2(25),
		old_ranking			varchar2(25),
		old_comments		varchar2(215),
		foreign key (apn) references ranking,
		primary key (apn, date_of_change)
		);
	-->
</html>


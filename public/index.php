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
		<script type="text/javascript" src="../scripts/app.js"></script>
		<script type="text/javascript" src="../scripts/transform.js"></script>
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

		<div class="m-2">
		<div class="row m-5">

			<div class="col p-4 rank_buttons">
				<div class="row">
					<div class="col" align="center">
						<h3>Please answer to the best of your ability.</h3>
						<h3>If you there is no data available choose "Don't Know"</h3>
						<hr class="my-4">
					</div>
				</div>
				
			<!-- DELETE ME !-->	
				<form action="../scripts/test.php">
					<input type="submit">
				</form>
			<!-- DELETE ME !-->
			
				<div class="row mt-3 justify-content-center">
					<form id="rank_form" action="../scripts/submit.php" method="post">
					<div class="row">
						<div class="col p">
									Parcel Number:<br>
									<input id="apn" type="text" name="apn"><br><br>

									<input type="text" name="hidden_score" hidden>
						
									Is there a permit on file?<br>
									<input type="radio" value="Yes" name="permit" checked>Yes<br>
									<input type="radio" value="No" name="permit">No<br><br>
						
									What is the age of the system?<br>
									<input type="radio" value="Before 1980" name="age" checked>Before 1980<br>
									<input type="radio" value="1980-1990" name="age">1980-1990<br/>
									<input type="radio" value="1990-2000" name="age">1990-2000<br/>
									<input type="radio" value="2000-2010" name="age">2000-2010<br/>
									<input type="radio" value="2010-2017" name="age">2010-2017<br/>
									<input type="radio" value="2017 to Present" name="age">2017 to Present<br/>
									<input type="radio" value="Don't know" name="age">Don't Know<br><br>
						
									What is the proximity to surface water?<br>
									<input type="radio" value="Under 50ft" name="prox" checked>Under 50ft<br>
									<input type="radio" value="50-100ft" name="prox">50-100ft<br>
									<input type="radio" value="100-150ft" name="prox">100-150ft<br>
									<input type="radio" value="150-200ft" name="prox">150-200ft<br>
									<input type="radio" value="Don't know" name="prox">Don't Know<br>
						</div>
						<div class="col pl-3">
									Is it compliant with current regulations?<br>
									<input type="radio" value="Yes" name="comp" checked>Yes<br>
									<input type="radio" value="No" name="comp">No<br><br>

									What is the condition of the system?<br>
									<input type="radio" value="Good" name="cond" checked>Good<br>
									<input type="radio" value="Moderate" name="cond">Moderate<br>
									<input type="radio" value="Poor" name="cond">Poor<br>
									<input type="radio" value="Failing" name="cond">Failing<br>
									<input type="radio" value="Don't know" name="cond">Don't Know<br><br>

									What are the soil conditions?<br>
									<input type="radio" value="Zone-4" name="soil" checked>Zone 4<br>
									<input type="radio" value="Zone-3" name="soil">Zone 3<br>
									<input type="radio" value="Zone-2" name="soil">Zone 2<br>
									<input type="radio" value="Zone-1" name="soil">Zone 1<br>
									<input type="radio" value="Don't know" name="soil">Don't Know<br><br>

									What is the slope?<br>
									<input type="radio" value="0-5%" name="slope" checked>0-5%<br>
									<input type="radio" value="5-10%" name="slope">5-10%<br>
									<input type="radio" value="10-15%" name="slope">10-15%<br>
									<input type="radio" value="15-20%" name="slope">15-20%<br>
									<input type="radio" value="20-30%" name="slope">20-25%<br>
									<input type="radio" value="Don't know" name="slope">Don't Know<br><br>
						</div>
					</div>
					</form>
				</div>
			</div>

			<div class="col ranking">
				<div class="jumbotron m-4">
					<h2 class="display-5">Ranking Information</h2><br>

					<hr class="my-4">

					<ul>
						<li><strong>Parcel Number: </strong> </li>
						<li><p name="rank_parcel_num"></p></li>
					</ul>

					<hr class="my-4">

					<ul>
						<li><strong>Score: </strong> </li>
						<li><p name="rank_score"></p></li>
						<li>/ 52</li>
					</ul>
					
					<hr class="my-4">

					<button id="btnSubmit" type="button" class="btn btn-primary btn-lg">Add Ranking</button>
					
					<br><br><p>Note: If this is a new parcel, you will be redirected to the Parcel Wizard form to create one.</p>
					<div id="alert_success" class="alert alert-primary" role="alert" hidden>
  						Successfuly Posted!
					</div>
				</div>
			</div>

		</div>

		</div>
	</body>
</html>
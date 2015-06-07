<!doctype html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Roam</title>
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<style type="text/css">
			.navbar {
				margin: 0px;
				font-size: 20px;
			}
			.navbar .brand {
				padding-top: 0px;
				padding-bottom: 0px;
			}
			.navbar-nav li a {
 				line-height: 38px;
			}
			.container {
				width: 100%;
			}
			.fist_block{
				padding-left: 17%;
				padding-top: 15%;
				height: 400px;
				background-image: url("pictures/IMG_0026.gif");
				background-repeat: no-repeat;
				background-size: 1200px;
				/*background-color: #2B2B68;*/
				color: white;
			}
			.second_block{
				padding-left: 17%;
			}
			#second_block_text{
				padding-top: 40px;
				text-align: center;
				padding-bottom: 30px;
			}
			.third_block{
				padding-left: 17%;
				padding-top: 40px;
				padding-bottom: 50px;
				background-color: #2B2B68;
				color: white;
			}
			.third_block_text {
				margin-left: 0px;
			}
			.third_block_pic{
				display: inline;
			}
			#logo_pic{
				width: 115px;
			}
			.tour_pic{
				display: block;
				height: 200px;
				padding-right: 20px;
			}
			.btn {
				background-image: none;
				background-color: #FC730B;
			}

		</style>

	</head>
	<body>
			<div class="navbar">
			  <div class="navbar-inner">
			    <a class="brand" href="#">
			    	<img id="logo_pic" src="pictures/ROAM_header.png">
			    </a>
			    <ul class="nav navbar-nav">
			      	<li class="active"><a href="#">Home</a></li>
			      	<li><a href="#">Book a Tour</a></li>
			    	<li><a href="#">How It Works</a></li>
			      	<ul class="dropdown-menu">
						<li><a href="#">Trust &mp; Safety</a></li>
						<li><a href="quiz">Frequently Asked Questions</a></li>
					</ul>
			    </ul>
			    <ul class="nav navbar-nav pull-right">
			      	<li><a href="#">Log In</a></li>
			      	<li><a href="#">Sign Up</a></li>
			  	</ul>
			    </ul>
			  </div>
			</div>
			<div class="container">
			<div class="fist_block">
				<div class="fist_block_text">
				<h1>Roam The Town</h1>
				<h3>Explore A City With A Local Student</h3>
				<form class="form-inline">
				  	<input type="text" class="input-large" placeholder="Enter City">
				  	<input type="text" class="input-medium" placeholder="Date">
				  	<select class="input-medium" placeholder="Time">
  						<option>Time</option>
						<option>8:00 am</option>
						<option>9:00 am</option>
						<option>10:00 am</option>
						<option>11:00 am</option>
						<option>12:00 pm</option>
						<option>1:00 pm</option>
						<option>2:00 pm</option>
						<option>3:00 pm</option>
						<option>4:00 pm</option>
						<option>5:00 pm</option>
						<option>6:00 pm</option>
						<option>7:00 pm</option>
						<option>8:00 pm</option>
						<option>9:00 pm</option>
						<option>10:00 pm</option>
						<option>11:00 pm</option>
					</select>
				  	<button type="submit" class="btn">Find Tours</button>
				</form>
			</div>
			</div>
			<h1 id="second_block_text">Tours Near You!</h1>
			<div class="second_block">
				<div class="row">
				  <div class="span3 tour_pic">
				  	<img src="pictures/greentown_labs.jpg" alt="Greenton Labs Tour">
				  </div>
				  <div class="span3 tour_pic">
				  	<img src="pictures/boston_commons.jpg" alt="Boston Commons Tour">
				  </div>
				  <div class="span3 tour_pic">
				  	<img src="pictures/quincy_market.jpg" alt="Quincy Market Tour">
				  </div>
				</div>
			</div>
			<div class="third_block">
				<h1>How Roam Works</h1>
				<div class="third_block_text">
					<h5>We connect traveling student to local students to provide tour ... </h5>
				</div>
				<div class="third_block_pic">
					<h4>picture</h4>
				</div>
			</div>
			<div class="fourth_block">
				<div class="span3">

				</div>
				<div class="span3">

				</div>
				<br>
				<p>Roam With Us On</p>

			</div>
		</div>
	</body>
</html>
<!DOCTYPE html>

<html>

<head>
	<meta charset="utf-8" />
	 <title>Track My Parcel  | Deprixa</title>
	<meta name="description" content="Courier Deprixa V3.2.2 "/>
	<meta name="keywords" content="Courier DEPRIXA-Integral Web System" />
	<meta name="author" content="Jaomweb">	
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<link rel="shortcut icon" type="image/png" href="deprixa/img/favicon.png"/>
	
    <!-- style -->
    <link href="deprixa_components/content/cssefe4.css" rel="stylesheet"/>  
    <link href="deprixa_components/styles/track-order.css" rel="stylesheet" />
	
	<!-- Validate Input -->

	
	<style type="text/css">
		.userform{width: 400px;}
		.userform p {
			width: 100%;
		}
		.userform label {
			width: 120px;
			color: #333;
			float: center;
		}
		input.error {
			border: 2px dotted red;

		}
		label.error{
			width: 100%;
			color: red;
			font-style: italic;
			margin-center: 120px;
			margin-bottom: 15px;
		}
		.userform input.submit {
			margin-center: 120px;
		}
	</style>

</head>

   <!-- Menu -->
<?php include_once "menu.php"; ?>
    <!-- /Menu -->

<div class="slide">   
    </div>
		<main class="slide">
			<div class="fw">
				<section class="title">
					<header>
						<h1><img src="dashboard/img/tracking-search.png" />Is it nearly there yet?</h1>
						
						<p class="mobHide">
							The tracking number is assigned example something like <strong>AWB-472304198</strong> Just input This unique number into the box below and, you can find out exactly Where it is!
						</p>
					</header>
					<div class="media-left">
						
					</div>
				</section>
			</div>
			<div class="container">
				<section class="track-num">
					<h2 for="track">Please consult your guide (tracking)</h2>
				</section>	
			  <ul class="nav nav-tabs">
				<li class="active"><a href="#home">CONSULT LOCAL SHIPPING</a></li>
				<li><a href="#menu1">CONSULT SHIPPING ONLINE</a></li>
			  </ul>

			  <div class="tab-content">
					<div id="home" class="tab-pane fade in active">
						<div class="">
							<section class="track-num">
								
								<br>
								<form action="tracking-result.php" id="userForm" method="post">
									<div class="search-bar">					
										<div class="form-group mob-track">
											<div class="input-group">
												<input class="form-control" name="shipping" id="shipping" type="text" placeholder="Example AWB-472304198">
											</div>
										</div>
										<button type="submit" name="button" id="send" class="btn btn-default"><img src="dashboard/img/tracking.png" alt="x" />&nbsp;Track my parcel Local</button>
									</div>
								</form>
							</section>
						</div>
					</div>
					<div id="menu1" class="tab-pane fade">
						<div class="">
							<section class="track-num">
								<br>
								<form action="tracking-online.php" id="userForm2" method="post">
									<div class="search-bar">					
										<div class="form-group mob-track">
											<div class="input-group">
												<input class="form-control" name="shipping_online" id="shipping_online" type="text" placeholder="Example AWB-1000001">
											</div>
										</div>
										<button type="submit" name="button" id="send" class="btn btn-info"><img src="dashboard/img/tracking.png" alt="x" />&nbsp;Track my parcel Online</button>
									</div>
								</form>
							</section>
						</div>
					</div>				
				</div>
			</div>
        </main>

    <!-- Footer -->
 <?php include_once "footer.php"; ?>
    <!-- /Footer -->
    </div>
	<script src="process/jquery.min.js"></script>
	<script src="process/jquery.validate.js"></script>

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
	$.validator.setDefaults({
		submit: function() {
			alert("submitted!");
		}
	});

	$(document).ready(function() {
		$("#userForm").validate({
			rules: {
				name: "required",
				shipping: {
					required: true,
					minlength: 6
				},
			   
			},
			messages: {
				name: "Please enter your name",           
				shipping: {
						required: "Please enter a valid tracking number...",
						minlength: "Your tracking number must consist of at least 13 characters"
				},           
			}
		});
	});
	
	$(document).ready(function() {
		$("#userForm2").validate({
			rules: {
				name: "required",
				shipping_online: {
					required: true,
					minlength: 6
				},
			   
			},
			messages: {
				name: "Please enter your name",           
				shipping_online: {
						required: "Please enter a valid tracking number...",
						minlength: "Your tracking number must consist of at least 13 characters"
				},           
			}
		});
	});
	</script>
	<script>
	$(document).ready(function(){
		$(".nav-tabs a").click(function(){
			$(this).tab('show');
		});
	});
	</script>
</body>
</html>

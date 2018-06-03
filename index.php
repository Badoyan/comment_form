<!DOCTYPE html>
	<html>
		<head>
			<title>Honey Hunters</title>
			<meta charset="utf-8">
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.5/validator.min.js"></script>
			<script src="assets/js/scripts.js?v=<?=rand(0,100); ?>"></script>
			<link rel="stylesheet" type="text/css" href="assets/css/styles.css?v=<?=rand(0,100); ?>">
		</head>
		<body>
			<div class="head-wrapper">
				<div class="container">
					<div class="header">
						<a class="col-xs-5 col-sm-4 col-lg-3" href="/">
	        				<img class="logo" alt="Logo" src="assets/images/logo.png" >
	      				</a>
	      				<div class="col-lg-12 text-center before-form">
	      					<img src="assets/images/email.png">
	      				</div>
	      				<div class="form-container">
	      					<span class="ajax-error col-lg-12"></span>
	      					<form data-toggle="validator" role="form"  id="comment_form" action="" method="post">
	      						<div class="form-row">
		      						<div class="col-md-7 part-one">
		      							<div class="form-group">
		      								<label for="name" class="control-label">Имя</label>
			    							<input type="text" class="form-control" name="name" id="name" required data-error="пожалуйста заполните это поле.">
		      							</div>
		    							<div class="form-group">
		    								<label for="email" class="control-label">E-Mail</label>
			    							<input type="email" class="form-control" name="email" id="email" required data-error="пожалуйста заполните это поле.">
		    							</div>
		  							</div>
		  							<div class="col-md-5">
		  								<div class="form-group">
		  									<label for="message" class="control-label">Комментарий</label>
									    	<textarea class="form-control" name="message" id="message" rows="6" required data-error="пожалуйста заполните это поле."></textarea>
		  								</div> 
	  								</div>
	  							</div>
	  							<div class="col-lg-12 button-container">
	  								<button id="submit" class="btn btn-danger pull-right" type="submit">Записать</button>
	  							</div>
	      					</form>
	      				</div>			
					</div>
				</div>
			</div>
			<div class="body-wrapper">
				<div class="container">
					<h2 class="text-center">Выводим комментарии</h2>
					<img class="ajax_loader" src="assets/images/ajax-loader.gif">
					<div id="comments_container"></div>
				</div>
			</div>
			<footer class="footer">
				<div class="container">
					<a class="col-xs-4 col-sm-3 col-lg-3 footer-logo" href="/">
	        			<img class="logo" alt="Logo" src="assets/images/logo.png" >
	      			</a>
	      			<div class="social pull-right">
	      				<a href="//vk.com"><img src="assets/images/vk.png"></a>
	      				<a href="//facebook.com"><img src="assets/images/fb.png"></a>
	      			</div>
				</div>
			</footer>
		</body>
	</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Tweeple Search</title>	
	<link href='http://fonts.googleapis.com/css?family=Syncopate' rel='stylesheet' type='text/css'>
	<!--
	<script type="text/javascript" src="scripts/jquery-1.10.2.min.js"></script>
	<script type="text/javascript" src="scripts/script.js"></script>
	-->
	
	<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" media="screen" />
</head>
<body>	
	<div id="container-home">		
			<section id="content-home">			
				<div id="bird">				
				</div>
				<div id="form-home">
				<?php echo form_open('index.php/search/index'); ?>				
					<header>
						<div id="app-name">
							<p>Tweeple Search</p>			
						</div>
					</header>
					
					<div id="logo-container">
						<div id="logo"></div>					
					</div>
					
					
					<div class="input-parent">
					<div class="input-child">					
					<p><input type="input" name="username" placeholder="@UserName" class="input-field"/></p>
					<p><?php echo validation_errors(); ?></p>
					</div>
					</div>
					<div class="submit-parent">
					<div class="submit-child">					
					<input type="submit" name="submit" value="Search" class="button" />					
					</div>
					</div>					
					
					<footer>c</footer>
				<!-- form_close(); -->
				</form>			
				</div>				
			</section>			
	</div>	
</body>
</html>

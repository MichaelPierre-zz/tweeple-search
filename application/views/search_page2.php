<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Twitter App</title>	
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
					<h1>Tweeple Search</h1>
					</header>
					<div id="input-home">
					<p><input type="input" name="username" placeholder="@UserName" class="input-field"/></p>
					</div>
					<div id="submit-home">
					<p><input type="submit" name="submit" value="Search" class="button" /></p>	
					</div>
					<p><?php echo validation_errors(); ?></p>
					<footer>c</footer>
				</form>				
				</div>				
			</section>			
	</div>	
</body>
</html>

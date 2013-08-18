<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Twitter App</title>		
	<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" media="screen" />
</head>
<body>	
	
	<div id="container-result">			
	<?php echo validation_errors(); ?>
	<?php echo form_open('index.php/search/index'); ?>
		<header id="header-result">
		<div class="input-parent">
		<div class="input-child">
			<input type="input" name="username" placeholder="@UserName" class="input-field" />			
		</div>
		</div>
		
		<div class="submit-parent">
		<div class="submit-child">
			<input type="submit" name="submit" value="Search" class="button" />
		</div>
		</div>
		</header>
		</form>
		<section id="content-container">
			<div id="user-summary-container">
			<div id="user-summary">

			<div id="profile-image-parent">
			<div id="profile-image-child">
				<p><img src="<?php echo $data['profile_image_url'];?>" alt="me"></p>
			</div>
			</div>			
			
			<div id="real-name">
				<h1><?php echo $data['name']; ?></h1>				
			</div>			
			
			<div id="screen-name">
				<h2><?php echo '@' . $data['screen_name']; ?></h2>
			</div>
			
			<div id="description">
				<p><?php echo $data['description']; ?></p>
			</div>
			
			<div id="friend-follower-container">
			<div id="friend-count">
				Friends: <?php echo $data['friends_count']; ?>
			</div>			
			<div id="follower-count">
				Followers: <?php echo $data['followers_count']; ?>
			</div>
			</div>
			
			</div>	
			</div>
			<div id="tweets-container">	
			<div id="user-tweets">
			<div id="user-timeline">
				<h1>Recent Tweets</h1>
				<p class="tweets"><?php
				$user_timeline = $data['timeline'];
				
				if(count( $user_timeline ) == 0){
					echo "No Tweets Found!";
				} else {
					echo '<hr />';
					foreach($user_timeline as $tweet) {
						echo $tweet['text']; 
						echo '<hr />';						
				}
				}				
				?></p>
			</div>
			<div id="user-favorites">
				<h1>Favorites</h1>
				<p><?php
				$favorites_list = $data['fav'];				
				
				if(count($favorites_list) == 0){
					echo "No Favorites Found!";
				} else {
					echo '<hr />';
					foreach($favorites_list as $fav){
						echo $fav['text'];
						echo '<hr />';
				}
				}
				?></p>
			
			</div>
			</div>
			<footer>
			</footer>
		</section>	
		</div>
	</div>			
</body>
</html>

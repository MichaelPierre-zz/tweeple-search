<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Twitter App</title>		
	<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" media="screen" />
</head>
<body>	
	<div id="container-result">
	<div id="content-result">
	<?php echo validation_errors(); ?>
	<?php echo form_open('index.php/search/index'); ?>
		<div id="input-result">
			<p><input type="input" name="username" placeholder="@UserName" class="input-field" />
			<input type="submit" name="submit" value="Search" class="button" /></p>		
		</div>
		<div id="submit-result">
			<!-- input now in div above -->
		</div>
		</form>
		<section>			
			<div id="user-summary">
			<div id="stackit">
			<div id="profile-image">
				<p><img src="<?php echo $data['profile_image_url'];?>" alt="me"></p>
			</div>
			<div id="name">
				<p><?php echo $data['name']; ?></p>				
			</div>			
			<div id="screen-name">
				<p><?php echo '@' . $data['screen_name']; ?></p>
			</div>
			<div id="description">
				<p><?php echo $data['description']; ?></p>
			</div>
			<div id="friend-count">
				<p>Friends: <?php echo $data['friends_count']; ?></p>
			</div>
			<div id="follower-count">
				<p>Followers: <?php echo $data['followers_count']; ?></p>
			</div>
			</div>			
						
			</div>			
			<div id="user-tweets">
			<div id="user-timeline">
				<p>Recent Tweets:</p>
				<p><?php
				$user_timeline = $data['timeline'];
				
				if(count( $user_timeline ) == 0){
					echo "No Tweets Found!";
				} else {				
					foreach($user_timeline as $tweet) {
						echo $tweet['text'] . '<br />';
				}
				}				
				?></p>
			</div>
			<div id="user-favorites">
				<p>Favorites:</p>
				<p><?php
				$favorites_list = $data['fav'];				
				
				if(count($favorites_list) == 0){
					echo "No Favorites Found!";
				} else {
					foreach($favorites_list as $fav){
						echo $fav['text'] . '<br />';
				}
				}
				?></p>
			</div>
			</div>
		</section>
	</div>
	</div>			
</body>
</html>

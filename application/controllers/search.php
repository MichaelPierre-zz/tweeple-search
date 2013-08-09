<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Search extends CI_Controller { 	
	public function view($page = 'search_page2', $data = 'test')
	{
		if( !file_exists('application/views/'.$page.'.php'))
		{
			show_404();
		}
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->view($page, $data);
	}

	public function index()
	{		
		$this->load->library('encrypt');
		$this->config->load('twitter_settings');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		$settings = array(
			'oauth_access_token' => $this->config->item('oauth_access_token'),
			'oauth_access_token_secret' => $this->config->item('oauth_access_token_secret'),
			'consumer_key' => $this->config->item('consumer_key'),
			'consumer_secret' => $this->encrypt->decode($this->config->item('consumer_secret'))
		);
			
		$this->load->library('/twitter/TwitterAPIExchange', $settings);		
				
		$this->form_validation->set_rules('username', 'username', 'required');
		$username = strtolower($this->input->post('username'));	
				
		if($this->form_validation->run() === FALSE || $this->val_username($username) === FALSE)
		{
			$data = 'Validation Problems';			
			$this->view('search_page2',$data);
		} else	{				
			$twitter = new TwitterAPIExchange($settings);			
			$friends_list_url = 'https://api.twitter.com/1.1/users/show.json';
			$user_timeline_url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
			$favorites_list_url = 'https://api.twitter.com/1.1/favorites/list.json';
						
			$friends_list = json_decode($this->get_user_data($username, $twitter, $friends_list_url), true);
			$user_timeline = json_decode($this->get_user_data($username, $twitter, $user_timeline_url), true);
			$favorites_list = json_decode($this->get_user_data($username, $twitter, $favorites_list_url), true);						
						
			if ( $this->screen_name_exists($username, $friends_list) ) {
				$data['profile_image_url'] = $friends_list['profile_image_url'];
				$data['name'] = $friends_list['name'];				
				$data['screen_name'] = $friends_list['screen_name'];
				$data['description'] = $friends_list['description'];
				$data['friends_count'] = $friends_list['friends_count']; 	
				$data['followers_count'] = $friends_list['followers_count'];
				$data['listed_count'] = $friends_list['listed_count'];		
				$data['fav_count'] = $friends_list['favourites_count'];				
				$data['timeline'] = $user_timeline;								
				$data['fav'] = $favorites_list;				
			
				$data['data'] = $data;									
				$this->view('search_page3',$data);								
			} else {
				//$data['user_not_found_error'] = $username . " does not exist.";
				//$this->view('search_page2', $data);
				echo $username . " does not exist.";
			}			
		}				
	}	
	
	private function val_username($username)
	{		
		return (bool)preg_match('/^([a-zA-Z0-9_]|^@[a-zA-Z0-9_]){1,20}$/', $username);				
	}
	
	function screen_name_exists($username, $friends_list) 
	{
		if( array_key_exists('screen_name', $friends_list) && strtolower($friends_list['screen_name']) == $username)		
			return true;		
		elseif (array_key_exists('errors', $friends_list) && $friends_list['errors'][0]['code'] == 34 ) // error code 34: Page does not exist
			return false;
		else {			
			echo "An error occured in screen_name_exists();";
			return false;
		}
	}
	
	private function get_user_data($username, $twitter, $url)
	{
		$getfield = '?screen_name=' . $username;		
		$request_method = 'GET';						
				
		return $twitter->setGetfield($getfield)
				   ->buildOauth($url, $request_method)
				   ->performRequest();										
	}				
}
/* End of file search.php */
/* Location: ./application/controllers/search.php */

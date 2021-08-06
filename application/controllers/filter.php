<?php 
class filter extends CI_Controller
{
	public function index()
	{
		include_once APPPATH . "libraries/vendor/autoload.php";
		$google_client= new Google_Client();
		$google_client->setClientId('67569114553-2is4352h1uete0jm45ind6f0opglr2e3.apps.googleusercontent.com');
		$google_client->setClientSecret('EQQ0-lkwhlAKIWFRY57ydURb');
		$google_client->setRedirectUri('http://localhost/shoppingweb/filter');
		$google_client->addScope('email');
		$google_client->addScope('profile');
		if(isset($_GET["code"]))
		{
			$token=$google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
			if(!isset($token["error"]))
			{
				$google_client->setAccessToken($token['access_token']);
				$this->session->set_userdata('access_token',$token['access_token']);
				$google_service= new Google_Service_Oauth2($google_client);
				$data=$google_service->userinfo->get();
				$current_datetime=date('Y-m-d H:i:s');
				if($this->eweb->is_already_registered($data['id']))
				{
					$user_data=array('first_name'=>$data['given_name'],
						'last_name'=>$data['family_name'],
						'email_address'=>$data['email'],
						'profile_picture'=>$data['picture'],
						'updated_at'=>$current_datetime);
					$this->eweb->update_user_data($user_data,$data['id']);
				}
				else
				{
					$user_data=array('login_oauth_uid'=>$data['id'],
						'first_name'=>$data['given_name'],
						'last_name'=>$data['family_name'],
						'email_address'=>$data['email'],
						'profile_picture'=>$data['picture'],
						'created_at'=>$current_datetime);
					$this->eweb->insert_user_data($user_data);
				}
				$this->session->userdata('user_data',$user_data);
			}
		}
		$login_button='';
		if(!$this->session->userdata('access_token'))
		{
			$login_button='<a href="'.$google_client->createAuthUrl().'"><img src="'.base_url().'images/google.png"/></a>';
			$data['login_button']=$login_button;
		}
		//$data['login_button']=$login_button;
		//print_r($data);
		$this->load->model('eweb');
		$data['brand']=$this->eweb->filter('product_brand');
		$data['ram']=$this->eweb->filter('product_ram');
		$data['storage']=$this->eweb->filter('product_storage');
		//print_r($data);
		//print_r($ram);
		//exit;
		//else
		//{
		$this->load->view('Eweb/login',$data);//['result'=>$result,'ram'=>$ram,'storage'=>$storage]);
	    //}
	}
	public function logout()
	{
		$this->session->unset_userdata('access_token');
		$this->session->unset_userdata('user_data');
		redirect('filter');
	}
	public function fetch_data()
	{
		//$connect=new PDO("mysql:host='localhost';dbname='shoppingweb'","root","");
		$minimum_price=$this->input->post('minimum_price');
		//print_r($minimum_price);
		//exit;
		$maximum_price=$this->input->post('maximum_price');
		$brand=$this->input->post('brand');
		$ram=$this->input->post('ram');
		$storage=$this->input->post('storage');
		$output=$this->eweb->fetch_data($minimum_price,$maximum_price,$brand,$ram,$storage);
			echo json_encode($output);
		
	}
	public function prodcart($id)
	{
		$product=$this->eweb->getRows($id);
		$id=$product["product_id"];
		$price=$product["product_price"];
		$name=$product["product_name"];
		$name=preg_replace("/[^A-Za-z0-9 ]/", '', $name);
		$image=$product["product_image"];
		$data=array(
			'id'=>"$id",
			'qty'=>1,
			'price'=>$price,
			'name'=>$name,
			'image'=>$image,
			);
		//echo "<pre>";
		//print_r($data);
		//exit;
		$this->load->library('session');
		$this->load->library('cart');
		$this->cart->insert($data);
		return redirect('cart/index');

	}
}
?>
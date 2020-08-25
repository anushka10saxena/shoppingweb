<?php 
class filter extends CI_Controller
{
	public function index()
	{
		$this->load->model('eweb');
		$data['brand']=$this->eweb->filter('product_brand');
		$data['ram']=$this->eweb->filter('product_ram');
		$data['storage']=$this->eweb->filter('product_storage');
		//print_r($result);
		//print_r($ram);
		//exit;
		$this->load->view('Eweb/filter',$data);//['result'=>$result,'ram'=>$ram,'storage'=>$storage]);
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
	public function cart($id)
	{
		$product=$this->eweb->getRows($id);
		$data=array('id' =>$product['id'] ,
		'qty'=>1,
		'price'=>$product['price'],
		'name'=>$product['name'],
		'image'=>$product['image']
		 );
		$this->cart->insert($data);
		redirect('cart');

	}
		
}
?>
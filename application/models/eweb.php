<?php
class eweb extends CI_Model
{
	function filter($type)
	{
		$q=$this->db->select("$type")
		            ->distinct()
		            ->where(['product_status'=>1])
		            ->get('product');
		         return $q->result(); 
	}
     function make_query($minimum_price,$maximum_price,$brand,$ram,$storage)
	{
			$query= "SELECT * FROM product WHERE product_status='1'";
			if(isset($_POST["minimum_price"],$_POST["maximum_price"]) && !empty($_POST["minimum_price"] && $_POST["maximum_price"]))
			{
				$query .="AND product_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'";
			}
			if(isset($_POST["brand"]))
			{
				$brand_filter= implode("','",$brand);
				$query .="AND product_brand IN('".$brand_filter."')";
			}
			if(isset($_POST["ram"]))
			{
				$ram_filter= implode("','",$ram);
				$query .="AND product_ram IN('".$ram_filter."')";
			}
			if(isset($_POST["storage"]))
			{
				$storage_filter= implode("','",$storage);
				$query .="AND product_storage IN('".$storage_filter."')";
			}
			return $query;
	}
	function fetch_data($minimum_price,$maximum_price,$brand,$ram,$storage)
	{
		$query=$this->make_query($minimum_price,$maximum_price,$brand,$ram,$storage);
		$data=$this->db->query($query);
		$output='';
		if($data->num_rows()>0)
		{
			foreach ($data->result_array() as $row) 
			{
				$output .='<div class="col-sm-4 col-lg-3 col-md-3" >
				<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:350px;">
				<img src="'.base_url().'images/'.$row['product_image'].'" alt="" width="auto" height="120" class="img-responsive" >
				<p align="center"><strong><a href="#">'.$row['product_name'].'</a></strong></p>
				<h4 style="text-align:center;" class="text-danger">Rs.'.$row['product_price'].'</h4>
				<a href="'.base_url().'filter/prodcart/'.$row['product_id'].'" class="btn btn-warning" style="margin-bottom:16px; margin-top:5px;">Add to Cart</a>
				</div>
				</div>';
			}
		}
		else
		{
			$output.='<h3>No Data Found</h3>';
		}
		return $output;
	}
	public function getRows($id)
	{
		$q=$this->db->select('')
		         ->where(['product_id'=>$id,'product_status'=>1])
		         ->get('product');
		         //return  $q->result();
		         $result=$q->row_array();
		         //print_r($result);
		         //exit;
		         return $result;
    }
    public function insertcustomer($data)
    {
    	if(!array_key_exists("created", $data)){
    		$data['created']=date("Y-m-d H:i:s");
    	}
    	if(!array_key_exists("modified", $data)){
    		$data['modified']=date("Y-m-d H:i:s");
    	}
    	$insert=$this->db->insert('customer',$data);
    	return $insert?$this->db->insert_id():false;
    }
    public function insertorder($data)
    {
    	if(!array_key_exists("created", $data)){
    		$data['created']=date("Y-m-d H:i:s");
    	}
    	if(!array_key_exists("modified", $data)){
    		$data['modified']=date("Y-m-d H:i:s");
    	}
    	$insert=$this->db->insert('orders',$data);
    	return $insert?$this->db->insert_id():false;
    }
    public function insertorderitem($data)
    {
    	$insert=$this->db->insert_batch('order_item',$data);
    	return $insert?true:false;
    }
    public function is_already_registered($id)	
    {
    	$q=$this->db->where(['login_oauth_uid'=>$id])
    	         ->get('user');
    	         if ($q->num_rows()>0)
    	         {
    	         	return true;
    	         }
    	         else
    	         {
    	         	return false;
    	         }
    }	
    public function update_user_data($data,$id)  
    {
    	$this->db->where(['login_oauth_uid'=>$id])
    	         ->update('user',$data);
    }
    public function insert_user_data($user_data)
    {
    	$this->db->insert('user',$user_data);
    }
}
?>
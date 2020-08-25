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
				$output .='<div class="col-sm-4 col-lg-3 col-md-3">
				<div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:350px;">
				<img src="'.base_url().'images/'.$row['product_image'].'" alt="" class="img-responsive">
				<p align="center"><strong><a href="#">'.$row['product_name'].'</a></strong></p>
				<h4 style="text-align:center;" class="text-danger">Rs.'.$row['product_price'].'</h4>
				<a href="'.base_url().'filter/cart/'.$row['product_id'].'" class="btn btn-warning">Add to Cart</a>
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
		    
}
?>
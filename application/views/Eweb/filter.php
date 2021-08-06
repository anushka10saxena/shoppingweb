<!DOCTYPE html>
<html>
<head>
	<title>Product Filter</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet"href=" https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
	<!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>-
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
</head>
<body>
<div class="container">
		<a href="<?php echo base_url('cart');?>" class="cart-link" title="View Cart">
		<i class="glyphicon glyphicon-shopping-cart"></i>
		<span>(<?php echo $this->cart->total_items();?>)</span>
	    </a>
		<div class="row">
			</br>
			<div class="col-md-3">
				<div class="list-group">
					<h3>Price</h3>
					<input type="hidden" id="hidden_minimum_price" value="0">
					<input type="hidden" id="hidden_maximum_price" value="65000">
					<p id="price_show">1000-65000</p>
					<div id="price_range"></div>
				</div>
				<div class="list-group">
					<h3>Brand</h3>
					<div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
						<?php foreach ($brand as $row ):?>
						<div class="list-group-item checkbox">
							<label><input type="checkbox" class="common_selector brand" value="<?php echo $row->product_brand;?>" ><?php echo $row->product_brand;?></label>
						</div>
						<?php endforeach;?>
					</div>
				</div>
				<div class="list-group">
					<h3>RAM</h3>
					<div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
						<?php foreach ($ram as $row ):?>
						<div class="list-group-item checkbox">
							<label><input type="checkbox" class="common_selector ram" value="<?php echo $row->product_ram;?>"><?php echo $row->product_ram;?>GB</label>
						</div>
						<?php endforeach;?>
					</div>
				</div>
				<div class="list-group">
					<h3>Storage</h3>
					<div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
						<?php foreach ($storage as $row ):?>
						<div class="list-group-item checkbox">
							<label><input type="checkbox" class="common_selector storage" value="<?php echo $row->product_storage;?>" ><?php echo $row->product_storage;?>GB</label>
						</div>
						<?php endforeach;?>
					</div>
				</div>
			</div>
			<div class="col-md-9">
				</br>
				<div class="row filter_data">
					
				</div>
			</div>
		</div>
	</div>
		<style>
		#loading
		{
			text-align: center;
			background: url('<?php echo base_url();?>loader.gif') no-repeat center;
			height: 150px;
		}
	    </style>
	<script>
		$(document).ready(function(){
			filter_data();
			function filter_data()
			{
				$('.filter_data').html('<div id="loading" style=""></div>');
				var action='fetch_data';
				var minimum_price=$('#hidden_minimum_price').val();
				var maximum_price=$('#hidden_maximum_price').val();
				var brand= get_filter('brand');
				var ram= get_filter('ram');
				var storage= get_filter('storage');

				$.ajax({
					url:"<?php echo base_url();?>filter/fetch_data",
					method:"POST",
					dataType:"JSON",
					data:{action: action, minimum_price: minimum_price, maximum_price: maximum_price, brand: brand, ram: ram,storage: storage},
					success:function(data){
						$('.filter_data').html(data);
					}
				});

			}
			function get_filter(class_name)
			{
				var filter=[];
				$('.'+class_name+':checked').each(function(){
					filter.push($(this).val());
				});
				return filter;
			}
			$('.common_selector').click(function(){
				filter_data();
			});

			//$(function(){
			  $('#price_range').slider({
				range:true,
				min:1000,
				max:65000,
				values:[1000,65000],
				step:500,
				stop:function(event,ui)
				{
					$('#price_show').html(ui.values[0] + '-' + ui.values[1]);
					$('#hidden_minimum_price').val(ui.values[0]);
					$('#hidden_maximum_price').val(ui.values[1]);
					filter_data();
				}
			});
		//});
	});
	</script>
</body>
</html>
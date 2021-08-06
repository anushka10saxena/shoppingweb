<html>
<head>
	<title>Cart</title>
	<link rel="stylesheet"href=" https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
</head>
<body>

	<div class="container">
		<h2>Order Preview</h2>
		<div class="row checkout">
			<div class="col-lg-8">
			<table class="table">
				<thead>
					<tr>
						<th width="13%"></th>
						<th width="34%">Product</th>
						<th width="18%">Price</th>
						<th width="13%">Quantity</th>
						<th width="22%">Subtotal</th>
					</tr>
				</thead>
				<tbody>
					<?php if($this->cart->total_items()>0):?>
						<?php foreach ($cartItems as $item): ?>
							<tr>
								<td>
									<img src="<?php echo base_url('images/'.$item['image']);?>" width="75"/>
								</td>
								<td><?php echo $item["name"];?></td>
								<td><?php echo 'Rs.'.$item["price"]. ' INR' ;?></td>
								<td><?php echo $item['qty'];?></td>
								<td><?php echo 'Rs.'.$item["subtotal"].' INR';?></td>
							</tr>
						<?php endforeach ?>
						<?php else:?>
							<tr><td colspan="5"><p>Your Cart is empty!</p></td></tr>
					<?php endif;?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="4"></td>
						<?php if($this->cart->total_items()>0):?>
							<td class="text-center">
								<strong>Total <?php echo 'Rs.'.$this->cart->total().' INR';?></strong>
							<?php endif;?>
						</td>
					</tr>
				</tfoot>
			</table>
		</div>
		<div class="col-lg-4">
			<form class="form-horizontal" method="post" action="pgRedirect.php">
				<div class="ship-info">
					<h4>Shipping Info</h4>					
					<div class="form-group">
						<label class="control-label col-sm-2">Name:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?php echo !empty($custdata['name'])?$custdata['name']:'';?>">
							<?php echo form_error('name','<p class="text-danger">','</p>');?>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Email:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="email" value="<?php echo !empty($custdata['email'])?$custdata['email']:'';?>" placeholder="Enter Email">
							<?php echo form_error('email','<p class="text-danger">','</p>');?>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Phone no.:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="phone_no" placeholder="Enter Mobile no." value="<?php echo !empty($custdata['phone_no'])?$custdata['phone_no']:'';?>">
							<?php echo form_error('phone_no','<p class="text-danger">','</p>');?>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2">Address:</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="address" placeholder="Enter Address" value="<?php echo !empty($custdata['address'])?$custdata['address']:'';?>">
							<?php echo form_error('address','<p class="text-danger">','</p>');?>
						</div>
					</div>
					<input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>">
						<input type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001">
						<input type="hidden"id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
						<input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
						<input type="hidden" title="TXN_AMOUNT" tabindex="10"
						type="text" name="TXN_AMOUNT"
						value="1">
				</div>
				<tfoot>
					<tr>
						<td>
					<a href="<?php echo base_url('cart');?>" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i>Back to Cart</a>
					</td>
						<td colspan="3"></td>
					<td><button type="submit" name="placeorder" class="btn btn-success">Place Order<i class="glyphicon glyphicon-menu-right"></i></button></td>
				</tr>
			</tfoot>
			</form>
		</div>
		</div>
	</div>
</body>
</html>
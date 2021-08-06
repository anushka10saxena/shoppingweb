<!DOCTYPE html>
<html>
<head>
	<title>Cart</title>
	<link rel="stylesheet"href=" https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
	<script>
		function updatecartitem(obj,rowid){
			$get("<?php echo base_url('cart/updateitemqty');?>",{rowid:rowid,qty:obj.value},function(resp){
				if (resp=='ok'){
					location.reload();
				}
				else
				{
					alert('Cart update failed');
				}
			});
		}
	</script>
</head>
<body>
	<div class="container">
		<h2>Shopping Cart</h2>
		<div class="row cart">
			<table class="table">
				<thead>
					<tr>
						<th width="10%"></th>
						<th width="30%">Product</th>
						<th width="15%">Price</th>
						<th width="13%">Quantity</th>
						<th width="20%">Subtotal</th>
						<th width="12%"></th>
					</tr>
				</thead>
				<tbody>
					<?php if($this->cart->total_items()>0):?>
						<?php foreach ($cartItems as $item): ?>
							<tr>
								<td>
									<img src="<?php echo base_url('images/'.$item["image"]);?>" width="50"/>
								</td>
								<td><?php echo $item["name"];?></td>
								<td><?php echo 'Rs.'.$item["price"]. ' INR' ;?></td>
								<td><input type="number" class="form-control text-center" value="<?php echo $item["qty"];?>" onchange="updatecartitem(this,'<?php echo $item['rowid'];?>')"></td>
								<td><?php echo 'Rs.'.$item["subtotal"].'INR';?></td>
								<td><a href="<?php echo base_url('cart/removeitem/'.$item["rowid"]);?>" class="btn btn-danger" onclick="return confirm('Are you Sure?')"><i class="glyphicon glyphicon-trash"></i></a></td>
							</tr>
						<?php endforeach ?>
						<?php else:?>
							<tr><td colspan="6"><p>Your Cart is empty!</p></td></tr>
					<?php endif;?>
				</tbody>
				<tfoot>
					<tr>
						<td>
							<a href="<?php echo base_url('filter');?>" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i>Continue Shopping</a>
						</td>
						<td colspan="3"></td>
						<?php if($this->cart->total_items()>0):?>
							<td class="text-left">Grand Total:<b><?php echo 'Rs.'.$this->cart->total().'INR';?></b></td>
							<td><a href="<?php echo base_url('checkout');?>" class="btn btn-success"><i class="glyphicon glyphicon-menu-right">CheckOut</i></td>
							<?php endif;?>
					</tr>
				</tfoot>
</body>
</html>
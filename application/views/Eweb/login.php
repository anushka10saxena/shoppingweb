<!DOCTYPE html>
<html>
<head>
	<title>Product Filter</title>
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<link rel="stylesheet"href=" https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
	<!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>-->
	<!--<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>-->
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>-
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>-->
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>-->
</head>
<body>
	<?php 
	if(!isset($login_button))
	{
		//$user_data=$this->session->userdata('user_data');
		include('dashboard.php');
		//echo '<div class="panel-heading">Welcome</div><div class="panel-body">';
		//echo '<img src="'.$user_data['profile_picture'].'" class="img-responsive img-circle img-thumbnail"/>';
		//echo '<h3><b>name:</b>'.$user_data["first_name"].' '.$user_data["last_name"].'</h3>';
		//echo '<h3><a href="'.base_url().'filter/logout">logout</div>';
	}
	else
	{
	echo '<div align="center">'.$login_button.'</div>';
    }
    ?>
</body>
</html>
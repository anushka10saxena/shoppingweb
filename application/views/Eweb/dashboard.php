<html>
<head>
	<title>E-commerce</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
<link rel="stylesheet"href=" https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
 <div class="container-fluid">
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-menu" aria-expanded="false">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="#">LIBRARY MANAGEMENT</a>
</div>
<div class="collapse navbar-collapse" id="main-menu">
<ul class="nav navbar-nav">
  <li class="active"><a class="nav-link" href="admin_dash/bookinfo">Add Books<span class="sr-only">(current)</span></a>
  </li>
 <li><a class="nav-link" href="admin_dash/user">Issue/Return</a></li>
 <li>
  <form class="form-inline">
  <font color="white"><i class="fa fa-search" style="margin-top: 19px;"></i></font>
      <input class="form-control" type="search" placeholder="Search by book name,author" aria-label="Search" id="myInput">
      <button class="btn btn-outline-success" type="submit">Search</button>
  </form>
</li>
 <li class="active"><a class="nav-link" href="admin_dash/student">User Information<span class="sr-only">(current)</span></a>
  </li>
  <li><a class="nav-link" href="admin_dash/placeorder">Place Order</a></li>
  <li class="active"><a class="nav-link" href="filter/logout">Logout<span class="sr-only">(current)</span></a>
  </li>
  </ul>
  </div>
</div>
</nav>
</div>
<div class="container">
	<div id="myBanner" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#myBanner" data-slide-to="0" class="active"></li>
			<li data-target="#myBanner" data-slide-to="1"></li>
			<li data-target="#myBanner" data-slide-to="2"></li>
			<li data-target="#myBanner" data-slide-to="3"></li>
		</ol>
		<div class="carousel-inner" role="listbox">
			<div class="item-active">
				<img src="<?php echo base_url('images/banner1.jpg');?>" class="img-responsive">
			</div>
			<div class="item">
				<img src="<?php echo base_url('images/banner2.jpg');?>" class="img-responsive">
			</div>
			<div class="item">
				<img src="<?php echo base_url('images/banner3.jpg');?>" class="img-responsive">
			</div>
			<div class="item">
				<img src="<?php echo base_url('images/banner4.jpg');?>" class="img-responsive">
			</div>
		</div>
		<a class="left carousel-control" href="#myBanner" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#myBanner" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>
</body>
</html>
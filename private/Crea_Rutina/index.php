<?php
	session_start();
	if(!isset($_SESSION['uid'])){
	header('Location:../modulos/index.php');
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nutri5tech</title>
	<link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="http://kenwheeler.github.io/slick/slick/slick-theme.css"/>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment-with-locales.min.js"></script>
	<link rel="stylesheet" href="../../public/alertifyjs/css/alertify.min.css">
</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top"  id="topnav">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="../modulos/index.php" class="navbar-brand" style="color: #1FDE82;">Nutri5tech</a>
			</div>
			<a class="navbar-brand" href="#" style="font-size: 15px; margin-left:45px;">Inicio</a>
			<a class="navbar-brand" href="#" style="font-size: 15px;">Informacion</a>
			<a class="navbar-brand" href="#" style="font-size: 15px;">FAQ</a>
			<?php 
			if($_SESSION['usuario'] == 'admin'){
               echo "	<a class='navbar-brand' href='Agregar.php' style='font-size: 15px; margin-left:45px;'>Agregar Reseta</a>";
			}
			?>


			<ul class="nav navbar-nav navbar-right">
				<li id='shoppingcart' style="right:300px;"><a id="carticon" href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-floppy-saved"></span>Guardadas <span class="badge">2</span>	</a>
					<div class="dropdown-menu" style="width: 400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3"><strong>N.R</strong></div>
									<div class="col-md-3"><strong>Imagen de reseta</strong></div>
									<div class="col-md-3"><strong>Nombre de reseta</strong></div>
									<div class="col-md-3"><strong>Calorias $</strong></div>
								</div>
								<hr>
								<div id="cartmenu">
								<!--<div class="row">
									<div class="col-md-3">S. No.</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in $</div>
								</div>-->
								</div>
							</div>
							<div class="panel-body"></div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>Hola, <?php echo $_SESSION['usuario']; ?></a>
				<ul class="dropdown-menu">
					<li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart-large"></span> Rutina Creada</a></li>
					<li><a href="Compartidos.php">Rutina Compartidas</a></li>
					<li><a href="../modulos/cerrar.php">Cerrar</a></li>
				</ul>

				</li>

				</ul>
			
		</div>
	</div>
	<br><br><br><br><br><br>
	<!-- Slider Begins -->

	 <div class="one-time">
	    <div><img src="assets/images/Nutricion1.jpg"></div>
	    <div><img src="assets/images/Nutricion2.jpg"></div>
		<div><img src="assets/images/Nutricion3.jpg"></div>
		<div><img src="assets/images/Nutricion4.jpg"></div>
  	</div>

	<!-- Slider ends -->

	<br>



	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2">
			<div id="get_cat"></div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Categories</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div>-->
				<div id="get_brand"></div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Brands</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div>-->
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-12" id="cartmsg">
					
					</div>
				</div>
				<div class="panel panel-info" style="background: #1FDE82;">
					<div class="panel-heading text-center" style="background: #e9e4e6; color: black;">--Resetas Para Escoger De bajo peso--
							
					</div>
					<div class="panel-body">
					<div id="get_product"></div>
						<!--<div class="col-md-4">
							<div class="panel panel-info">
								<div class="panel-heading">Samsung Galaxy</div>
								<div class="panel-body"><img src="assets/prod_images/samsung_galaxy.jpg"></div>
								<div class="panel-heading">$500.00
								<button class="btn btn-danger btn-xs" style="float:right;">Add to Cart</button>
								</div>
							</div>
						</div>-->
					</div>
					<div class="panel-footer">&copy; Nutri5Tech 2020</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<center>
					<ul class='pagination' id='pageno'>
						
					</ul>
				</center>
			</div>


			<!-- Modal -->
				
				<div class="modal fade" id="prod_detail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel">Detalles</h4>
				      </div>
				      <div class="modal-body" id='dynamic_content'>
				        ...
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				        
				      </div>
				    </div>
				  </div>
				</div>

			 <!-- Modal ends-->
		</div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
    <script src="../../public/alertifyjs/alertify.min.js"></script>
	<script src="assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	<script src="main.js"></script>
	
</body>
</html>
<?php
	session_start();
	if(!isset($_SESSION['uid'])){
	header('Location:index.php');
	}
 ?>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Nutri5Tech</title>
	<link rel="stylesheet" type="text/css" href="../assets/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" href="../../../public/alertifyjs/css/alertify.min.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
	<div class="navbar navbar-default navbar-fixed-top" id="topnav">
		<div class="container-fluid">
			<div class="navbar-header">
				<a href="index.php" class="navbar-brand">Nutri5Tech</a>
			</div>

			
		</div>
	</div>
	<p><br><br></p>
	<p><br><br></p>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
			<div class="row">
				<div class="col-md-12" id="cart_msg"></div>
			</div>
				<div class="panel panel-primary text-center">
					<div class="panel-heading" style='background: #1FDE82;'>Lista De comida</div>
					<div class="panel-body"></div>
					<div class="row">
						<div class="col-md-2"><b></b></div>
						<div class="col-md-2"><b>Imagen</b></div>
						<div class="col-md-2"><b>Nombre</b></div>
						<div class="col-md-2"><b>Tiempo de Comida</b></div>
						<div class="col-md-2"><b>Cantidad porcion</b></div>
						<div class="col-md-2"><b>Total Calorias</b></div>
					</div>
					<br><br>
					<div id='cartdetail'>
					<!--<div class="row">
						<div class="col-md-2"><a href="#" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a>
						<a href="#" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span></a>
						</div>
						<div class="col-md-2"><img src="assets/prod_images/tshirt.JPG" width="60px" height="60px"></div>
						<div class="col-md-2">Tshirt</div>
						<div class="col-md-2">$700</div>
						<div class="col-md-2"><input class="form-control" type="text" size="10px" value='1'></div>
						<div class="col-md-2"><input class="form-control" type="text" size="10px" value='700'></div>
					</div>-->
					</div>
					<!--<div class="row">
						<div class="col-md-8"></div>
						<div class="col-md-4">
							<b>Total: $500000</b>
						</div>
					</div>-->
					<div class="panel-footer">

					</div>
				</div>
			
				<!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Compartir
     </button>

	 <?php   

$link = mysqli_connect("localhost","root","");
if($link){
  mysqli_select_db($link,"proyec_nutricion");
  mysqli_query($link,"SET NAMES 'utf8'");
}
?>
<!-- Modal -->
<form method="POST" action="compartir.php">
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Compartir a Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        	
      <select name="idUsuario" id="" required class="campoTexto" style="height: auto;">
    <option value="">Selecione Usuario</option>

     <?php 
     $v = mysqli_query($link,"SELECT * FROM login");
     while($tiempos = mysqli_fetch_row($v)){
        ?>
      <option value="<?php echo $tiempos[0]?>"><?php echo $tiempos[2]?></option>
      <?php 
     }
      ?>
</select>
<input class="text" name="idEnvia" style="display: none;" required value="<?php echo $_SESSION['uid']; ?>"></input>
<input class="text" name="NameUser" style="display: none;"  required value="<?php echo $_SESSION['usuario']; ?>"></input>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Enviar</button>
      </div>
    </div>
  </div>
</div>
</form>
			</div>

			<div class="col-md-2"></div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
	<script src="../assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	<script src="../../../public/alertifyjs/alertify.min.js"></script>
	<script src="main.js"></script>	
</body>
</html>
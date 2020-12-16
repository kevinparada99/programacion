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
					<div class="panel-heading" style='background: #1FDE82;'>Rutinas Compartidas</div>
					<div class="panel-body"></div>
					<div class="row">
                        <div class="col-md-2"><b></b></div>
						<div class="col-md-2"><b>Imagen</b></div>
						<div class="col-md-2"><b>Nombre</b></div>
						<div class="col-md-2"><b>Calorias</b></div>
						<div class="col-md-2"><b>Cantidad porcion</b></div>
						<div class="col-md-2"><b>Enviado Por:</b></div>
					</div>
					<br><br>
					<div id='cartdetail'>
<?php  
include('dbconnect.php');
$uid=$_SESSION['uid'];
$sql="SELECT * FROM compartir WHERE Userc ='$uid' AND peso = 3 ORDER BY product_cat";
$run_query=mysqli_query($conn,$sql);
$count=mysqli_num_rows($run_query);



if($count>0){
    $i=1;
    $total_amt=0.00;
while($row=mysqli_fetch_array($run_query))
{
    $sl=$i++;
    $id=$row['id'];
    $pid=$row['p_id'];
    $NameUser=$row['NameUser'];
    $product_image=$row['product_image'];
    $product_title=$row['product_title'];
    $product_price=$row['price'];
    $cat_id =$row['product_cat'];
    $total=$row['total_amount'];
    $price_array=array($total);
    $total_sum=array_sum($price_array);
    $total_amt+=$total_sum;

     $sqli = "SELECT * FROM categories WHERE cat_id  = '$cat_id '";
     $run_quer = mysqli_query($conn,$sqli);
     $ro = mysqli_fetch_array($run_quer); 
     $cat_nom = $ro['cat_title'];
     
    
        echo "
        <div class='row'>
        
            <div class='col-md-2'>
            </div>
            <div class='col-md-2'><img src='../assets/prod_images/$product_image' width='60px' height='60px'></div>
            <div class='col-md-2'>$product_title</div>
            <div class='col-md-2'><input class='form-control price' type='text' size='10px' pid='$pid' id='price-$pid' value='$product_price' disabled></div>
            <div class='col-md-2'>$cat_nom</div>
            <div class='col-md-2'>$NameUser</div>
        </div>
        
           ";
   
     
   
    }
    echo "
   <div class='row'>
   <div class='col-md-8'></div>
   <div class='col-md-4'>
    <b>Total Calorias: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$total_amt</b>
   </div>
  </div>
  <a type='button' onclick='eliminar()' id='eliminar' class='btn btn-danger eli' >Eliminar</a>";

  if($sl == 8){
    echo " <a type='button' href='pdf_descarga/desCompartida.php' class='btn btn-success'>Descargar</a>";
  }
}


?>
					
					<script>
					var elimina = document.querySelector(".eli");
						
					function eliminar(){
						alertify.confirm('Nutri5tech... ',"Desea eliminar la rutina Compartida?",
                     function(){
						 window.location.href='eliminarCo.php?id=<?php echo $NameUser ?>';
                     alertify.success('La rutina se ha elimino..');
                         },
                    function(){
                          alertify.error('Cancelada..');
                        });
					}

					</script>
					
					
					
					<div class="panel-footer">

					</div>
				</div>
				

	
			</div>
           
			<div class="col-md-2"></div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.6.0/slick.min.js"></script>
	<script src="../../../public/alertifyjs/alertify.min.js"></script>
	<script src="../assets/bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</body>
</html>
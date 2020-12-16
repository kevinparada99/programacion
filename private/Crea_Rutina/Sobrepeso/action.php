<?php 

/**
 * @author 5 tech <usis003118@ugb.edu.sv>
    *proseso para guardar y mostrar la creacion de la rutina diaria
 */

 /**
  * session_start que el usuario tenga iniciada la seccion
  * include dbconect.php es la conecion de la base de datos
  */

	session_start();
	include('dbconnect.php');
	/**si por el metodo post biene el id de la categoria aga una consulta a la bd y imprima las categorias en la pagina con el ciclo while*/
	if(isset($_POST["category"])){
		$category_query="SELECT * FROM categories";
		$run_query=mysqli_query($conn,$category_query);
		echo "<div class='nav nav-pills nav-stacked'>
					<li class='active'><a href='#' style='background: #1FDE82;'><h4>Tiempos De Comida</h4></a></li>";
		if(mysqli_num_rows($run_query)){
			while($row=mysqli_fetch_array($run_query)){
				$cid=$row['cat_id'];
				$cat_name=$row['cat_title'];
				echo "<li><a href='#' style='color: black;' class='category' cid='$cid'>$cat_name</a></li>";
			}
			echo "</div>";
		}
	}
	
	/**
	 * si por el metodo post biene el id de se puso en la categiria
	 * consulta a la bd en la tabla de los productos y imprimirlos en su categoria por su id
	 */
	if(isset($_POST['page']))
	{
		$sql="SELECT * FROM products where peso = 3";
		$run_query=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($run_query);
		$pageno=ceil($count/6);
		for($i=1;$i<=$pageno;$i++)
		{
			echo "
				<li><a href='#' page='$i' class='page'>$i</a></li>
			";
		}
	}
	
/**
 * resive el orden que el usuario quiere dar a los productos en este caso aun no se esta utilizando 
 * puede ordenar los productos por el total de calorias si asi lo desea o randon
 */

	if(isset($_POST['getProduct'])){

		$limit=	6;
		if(isset($_POST['setPage'])){
			$pageno=$_POST['pageNumber'];
			$start=($pageno * $limit)-$limit;
		}
		else{$start=0;}
		if(isset($_POST['price_sorted'])){
			$product_query="SELECT * FROM products where peso = 3 ORDER BY product_price";
		}
		elseif(isset($_POST['pop_sorted'])){
			$product_query="SELECT * FROM products where peso = 3 ORDER BY RAND()";
		}
		else{
		$product_query="SELECT * FROM products where product_cat = 1 and peso = 3 LIMIT $start,$limit";
		}
		$run_query=mysqli_query($conn,$product_query);
		/**
		 * 
		 * trae todos los productos con todos los datos ya almacenados y crea la vista de cada uno con el ciclo while 
		 */
		if(mysqli_num_rows($run_query)){
			while($row=mysqli_fetch_array($run_query)){
				$pro_id=$row['product_id'];
				$pro_cat=$row['product_cat'];
				$brand=$row['product_brand'];
				$title=$row['product_title'];
				$price=$row['product_price'];
				$img=$row['product_image'];
				$fecha=$row['fecha'];
/**
 * si el usuario es admin que muestre otros botones como elde eliminar y modificar
 */
				if($_SESSION['usuario'] == 'admin'){
					$btns = " <a pid='$pro_id' class='btn btn-success btn-xs' href='modificar.php?id=$pro_id' style='float:right;'>Modificar</a>&nbsp;
					<a pid='$pro_id' class='btn btn-danger btn-xs' href='eliminar.php?id=$pro_id' style='float:right;'>Eliminar</a>";
				  }else{
					 $btns = "";
				  }
/**imprime la vista de los detalles del producto */
				echo "<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading' style='background: #e9e4e6; color: black;'>$title $btns</div>
								<div class='panel-body'>
								<a href='#' class='imageproduct' pid='$pro_id'>
									<img src='../assets/prod_images/$img' style='width:200px; height:250px;' >
								</a>
								</div>
								<div class='panel-heading' style='background: #e9e4e6; color: black;'>Calorias $price
								<button pid='$pro_id' class='quicklook btn btn-danger btn-xs' style='float:right;'>Detalles</button>&nbsp;
								<button pid='$pro_id' class='product btn btn-success btn-xs' style='float:right;'>Agregar</button>
								<h4 id='fecha$pro_id'></h4>
								</div>
								<script>
							moment.locale('es');
							var hace = moment('$fecha', 'YYYY/MM/DD h:mm:ss a').startOf(24,'hour').fromNow();
							document.querySelector('#fecha$pro_id').innerHTML = hace;
							</script>
							</div></div>";
			}
		}
	}
/** ordena los productos segun la categoria selecionada */
	if(isset($_POST['get_selected_Category']) || isset($_POST['get_selected_brand']) || isset($_POST['search']) || isset($_POST['price_sorted']))
	{
		if(isset($_POST['get_selected_Category'])){
			$cid=$_POST['cat_id'];
			$sql="SELECT * FROM products WHERE product_cat=$cid and peso = 3";
		}
		elseif(isset($_POST['get_selected_brand'])){
			$bid=$_POST['brand_id'];
			$sql="SELECT * FROM products WHERE product_brand=$bid";
			if(isset($_POST['price_sorted'])){
			$sql="SELECT * FROM products where peso = 3 ORDER BY product_price";
			}
		}
		/**sepuede buscar un producto aun no terminado */
		elseif(isset($_POST['search'])){
			$keyword=$_POST['keyword'];
			$sql="SELECT * FROM products WHERE product_keywords LIKE '%$keyword%'";
			if(isset($_POST['price_sorted'])){
			$sql="SELECT * FROM products ORDER BY product_price";
		}
		}

		/** trae los productos segun su categoria y los imprime  */
		$run_query=mysqli_query($conn,$sql);
		while($row=mysqli_fetch_array($run_query)){
			$pro_id=$row['product_id'];
				$pro_cat=$row['product_cat'];
				$brand=$row['product_brand'];
				$title=$row['product_title'];
				$price=$row['product_price'];
				$img=$row['product_image'];
				$fecha=$row['fecha'];
/**
 * si el usuario es admin que muestre otros botones como elde eliminar y modificar
 */
				if($_SESSION['usuario'] == 'admin'){
					$btns = " <a pid='$pro_id' class='btn btn-success btn-xs' href='modificar.php?id=$pro_id' style='float:right;'>Modificar</a>&nbsp;
					<a pid='$pro_id' class='btn btn-danger btn-xs' href='eliminar.php?id=$pro_id' style='float:right;'>Eliminar</a>";
				  }else{
					 $btns = "";
				  }

				echo "<div class='col-md-4'>
							<div class='panel panel-info'>
								<div class='panel-heading' style='background: #e9e4e6; color: black;'>$title $btns</div>
								<div class='panel-body' class='imageproduct' pid='$pro_id'><img src='../assets/prod_images/$img' style='width:200px; height:250px;'></div>
								<div class='panel-heading'style='background: #e9e4e6; color: black;'>Calorias $price
								<button pid='$pro_id' class='quicklook btn btn-danger btn-xs' style='float:right;'>Detalles</button>&nbsp;
								<button pid='$pro_id' class='product btn btn-success btn-xs' style='float:right;'>Agregar</button>
								<h4 id='fecha$pro_id'></h4>
								</div>
								<script>
							moment.locale('es');
							var hace = moment('$fecha', 'YYYY/MM/DD h:mm:ss a').startOf(24,'hour').fromNow();
							document.querySelector('#fecha$pro_id').innerHTML = hace;
							</script>
							</div></div>
							
							";
		}
		

	}
/**si el usuario no ha iniciado seccion que muestre un msm */
		if(isset($_POST['addToProduct'])){
			if(!(isset($_SESSION['uid']))){echo "
				<script>
				alertify.warning('Tienes que iniciar seccion:>');
				</script>
					";}
			else{
				/**consulta los rutinas que ya se an registrado */
			$pid=$_POST['proId'];
			$uid=$_SESSION['uid'];
			$sql = "SELECT * FROM cart WHERE p_id = '$pid' AND user_id = '$uid'";
			$run_query=mysqli_query($conn,$sql);
			$count=mysqli_num_rows($run_query);
			if($count>0)/**si la reseta ya fue registrada que mande una alerta */
			{
				echo "
				<script>
				alertify.warning('Esta Reseta Ya esta registrada');
				</script>
				";
			}
			else
			{
				/**consulta los productos donde el id es el selecionado */
				$sql = "SELECT * FROM products WHERE product_id = '$pid'";
				$run_query = mysqli_query($conn,$sql);
				$row = mysqli_fetch_array($run_query);
				$cat = $row["product_cat"];
/**con sulta la rutina ya creada con el id del tiempo de comida y el id del usuario */
				$sqli = "SELECT * FROM cart WHERE product_cat = '$cat' AND user_id = '$uid' AND peso = 3";
				$run_queryi=mysqli_query($conn,$sqli);
				$counti=mysqli_num_rows($run_queryi);

				if($cat == '1'){
                    if($counti>1){/**si ya hay 2 de el mismo tiempo registrado */
						echo "
						<script>
				     	alertify.warning('Ya ha agregado los desayunos correspondientes');
				     	</script>
						";
					}else{
						
				$sql = "SELECT * FROM products WHERE product_id = '$pid'";
				$run_query = mysqli_query($conn,$sql);
				$row = mysqli_fetch_array($run_query);
				$id = $row["product_id"];
				$pro_title = $row["product_title"];
				$pro_image = $row["product_image"];
				$pro_price = $row["product_price"];
				$idCategoria = $row["product_cat"];
				$peso = $row["peso"];
				$sql="INSERT INTO cart(p_id,ip_add,user_id,product_title,product_image,qty,price,total_amount,product_cat,peso) VALUES('$pid','0.0.0.0','$uid','$pro_title','$pro_image','1','$pro_price','$pro_price','$idCategoria','3')";
				$run_query = mysqli_query($conn,$sql);
				if($run_query){
					echo "
					<script>
					alertify.success('La Reseta se ha agrego Con exito');
					</script>
					
					";
				}
					}
					
				}elseif($cat == '2'){
					if($counti>0){
						echo "
						<script>
						alertify.warning('Ya ha agregado todos los de media mañana');
						</script>
						";
					}else{
						
			       	$sql = "SELECT * FROM products WHERE product_id = '$pid'";
			     	$run_query = mysqli_query($conn,$sql);
				   $row = mysqli_fetch_array($run_query);
				   $id = $row["product_id"];
				  $pro_title = $row["product_title"];
				   $pro_image = $row["product_image"];
			     	$pro_price = $row["product_price"];
			     	$idCategoria = $row["product_cat"];
				    $peso = $row["peso"];

				  $sql="INSERT INTO cart(p_id,ip_add,user_id,product_title,product_image,qty,price,total_amount,product_cat,peso) VALUES('$pid','0.0.0.0','$uid','$pro_title','$pro_image','1','$pro_price','$pro_price','$idCategoria','3')";
				  $run_query = mysqli_query($conn,$sql);
				  if($run_query){
					echo "
					<script>
					alertify.success('La Reseta se ha agrego Con exito');
					</script>
					";
				}
					}
				}elseif ($cat == '3'){
					if($counti>0){
						echo "
						<script>
						alertify.warning('Ya ha Completado el Almuezos correspondientes');
						</script>
						";
					}else{
						
			       	$sql = "SELECT * FROM products WHERE product_id = '$pid'";
			     	$run_query = mysqli_query($conn,$sql);
				   $row = mysqli_fetch_array($run_query);
				   $id = $row["product_id"];
				  $pro_title = $row["product_title"];
				   $pro_image = $row["product_image"];
			     	$pro_price = $row["product_price"];
			     	$idCategoria = $row["product_cat"];
					 $peso = $row["peso"];

					 $sql="INSERT INTO cart(p_id,ip_add,user_id,product_title,product_image,qty,price,total_amount,product_cat,peso) VALUES('$pid','0.0.0.0','$uid','$pro_title','$pro_image','1','$pro_price','$pro_price','$idCategoria','3')";
					  $run_query = mysqli_query($conn,$sql);
				  if($run_query){
					echo "
					<script>
					alertify.success('La Reseta se ha agrego Con exito');
					</script>
					";
				}
					}
			}elseif($cat == '4'){
				if($counti>1){
					echo "
					<script>
					alertify.warning('Ya ha Completado la merienda correspondientes');
					</script>";
				}else{
					
				   $sql = "SELECT * FROM products WHERE product_id = '$pid'";
				 $run_query = mysqli_query($conn,$sql);
			   $row = mysqli_fetch_array($run_query);
			   $id = $row["product_id"];
			  $pro_title = $row["product_title"];
			   $pro_image = $row["product_image"];
				 $pro_price = $row["product_price"];
				 $idCategoria = $row["product_cat"];
				 $peso = $row["peso"];

				 $sql="INSERT INTO cart(p_id,ip_add,user_id,product_title,product_image,qty,price,total_amount,product_cat,peso) VALUES('$pid','0.0.0.0','$uid','$pro_title','$pro_image','1','$pro_price','$pro_price','$idCategoria','3')";
				 $run_query = mysqli_query($conn,$sql);
			  if($run_query){
				echo "
				<script>
				alertify.success('La Reseta se ha agrego Con exito');
				</script>
				";
			}
				}
			}else{
				if($counti>1){
					echo "
					<script>
					alertify.warning('Ya ha Completado la cena correspondientes');
					</script>";
				}else{
					
				   $sql = "SELECT * FROM products WHERE product_id = '$pid'";
				 $run_query = mysqli_query($conn,$sql);
			   $row = mysqli_fetch_array($run_query);
			   $id = $row["product_id"];
			  $pro_title = $row["product_title"];
			   $pro_image = $row["product_image"];
				 $pro_price = $row["product_price"];
				 $idCategoria = $row["product_cat"];
				 $peso = $row["peso"];

				 $sql="INSERT INTO cart(p_id,ip_add,user_id,product_title,product_image,qty,price,total_amount,product_cat,peso) VALUES('$pid','0.0.0.0','$uid','$pro_title','$pro_image','1','$pro_price','$pro_price','$idCategoria','3')";
				  $run_query = mysqli_query($conn,$sql);
			  if($run_query){
				echo "
				<script>
				alertify.success('La Reseta se ha agrego Con exito');
				</script>
				";
			}
				}
			}






			}
			}
		}
	

	if(isset($_POST['cartmenu']) || isset($_POST['cart_checkout']))
	{
		$uid=$_SESSION['uid'];
		$sql="SELECT * FROM cart WHERE user_id='$uid' AND peso = 3 ORDER BY product_cat";
		$run_query=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($run_query);
		if($count>0){
			$i=1;
			$total_amt=0.00;
		while($row=mysqli_fetch_array($run_query))
		{
			$sl=$i++;
			$pid=$row['p_id'];
			$product_image=$row['product_image'];
			$product_title=$row['product_title'];
			$product_price=$row['price'];
			$cat_id =$row['product_cat'];
			$qty=$row['qty'];
			$total=$row['total_amount'];
			$price_array=array($total);
			$total_sum=array_sum($price_array);
			$total_amt+=$total_sum;


			$sqli = "SELECT * FROM categories WHERE cat_id  = '$cat_id '";
			$run_quer = mysqli_query($conn,$sqli);
			$ro = mysqli_fetch_array($run_quer); 
			$cat_nom = $ro['cat_title'];


			if(isset($_POST['cartmenu']))
			{
				echo "
				<div class='row'>
									<div class='col-md-3'>$sl</div>
									<div class='col-md-3'><img src='../assets/prod_images/$product_image' width='60px' height='60px'></div>
									<div class='col-md-3'>$product_title</div>
									<div class='col-md-3'>Calorias $product_price</div>
				</div>
			";
			}
			else
			{
				echo "
					<div class='row'>
						<div class='col-md-2'><a href='#' remove_id='$pid' class='btn btn-danger remove'><span class='glyphicon glyphicon-trash'></span></a>
						<a href='#' update_id='$pid' class='btn btn-success update'><span class='glyphicon glyphicon-ok-sign'></span></a>
						</div>
						<div class='col-md-2'><img src='../assets/prod_images/$product_image' width='60px' height='60px'></div>
						<div class='col-md-2'>$product_title</div>
						<div class='col-md-2'>$cat_nom</div>
						<div class='col-md-2'><input class='form-control qty' type='text' size='10px' pid='$pid' id='qty-$pid' value='$qty'></div>
						<div class='col-md-2'><input class='total form-control price' type='text' size='10px' pid='$pid' id='amt-$pid' value='$total' disabled></div>
						<div class='col-md-2'><input class='form-control price' style='display:none' type='text' size='10px' pid='$pid' id='price-$pid' value='$product_price' disabled></div>
					</div>
				";
			}
		}
		if(isset($_POST['cart_checkout'])){
		echo "
			<div class='row'>
						<div class='col-md-8'></div>
						<div class='col-md-4'>
							<b>Total Calorias: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$total_amt</b>
						</div>
					</div>
				
		";
		if($sl == 8){
			echo "
			<a href='pdf_descarga/descarga.php' class='btn btn-success btn-lg active' role='button' aria-pressed='true'>Descargar</a>
				
		";
		}
		}
	}
}

	if(isset($_POST['removeFromCart']))
	{
		$pid=$_POST['pid'];
		$uid=$_SESSION['uid'];
		$sql="DELETE FROM cart WHERE p_id='$pid' AND user_id='$uid'";
		$run_query=mysqli_query($conn,$sql);
		if($run_query){
			echo "
			<script>
			alertify.error('La Reseta se ha Eliminado');
			</script>
			";
		}	
	}

	if(isset($_POST['updateProduct']))
	{
		$pid=$_POST['updateId'];
		$uid=$_SESSION['uid'];
		$qty=$_POST['qty'];
		$price=$_POST['price'];
		$total=$_POST['total'];
		$sql="UPDATE cart SET qty='$qty', price='$price', total_amount='$total' WHERE p_id='$pid' AND user_id='$uid'";
		$run_query=mysqli_query($conn,$sql);
		if($run_query){
			echo "
			<script>
			alertify.success('Haz actualizado tu porcion');
			</script>
			";
		}

	}

	if(isset($_POST['cartcount'])){
		if(!(isset($_SESSION['uid']))){echo "0";}else{
		$uid=$_SESSION['uid'];
		$sql="SELECT * FROM cart WHERE user_id='$uid' AND peso = 3";
		$run_query=mysqli_query($conn,$sql);
		$count=mysqli_num_rows($run_query);
		echo $count;
		}
	}


	if(isset($_POST['payment_checkout'])){
		$uid=$_SESSION['uid'];
		$sql="SELECT * FROM cart WHERE user_id='$uid' AND peso = 3";
		$run_query=mysqli_query($conn,$sql);
		$i=rand();
		while($cart_row=mysqli_fetch_array($run_query))
		{
			$cart_prod_id=$cart_row['p_id'];
			$cart_prod_title=$cart_row['product_title'];
			$cart_qty=$cart_row['qty'];
			$cart_price_total=$cart_row['total_amount'];

			$sql2="INSERT INTO customer_order (uid,pid,p_name,p_price,p_qty,p_status,tr_id) VALUES ('$uid','$cart_prod_id','$cart_prod_title','$cart_price_total','$cart_qty','CONFIRMED','$i')";
			$run_query2=mysqli_query($conn,$sql2);
		}
		$i++;
		$sql3="DELETE FROM cart WHERE user_id='$uid'";
		$run_query3=mysqli_query($conn,$sql3);
	}

	if(isset($_POST['product_detail'])){
		$pid=$_POST['pid'];
		$sql="SELECT * FROM products WHERE product_id='$pid'";
		$run_query=mysqli_query($conn,$sql);
		$row=mysqli_fetch_array($run_query);
		$pro_id=$row['product_id'];
		$image=$row['product_image'];
		$title=$row['product_title'];
		$price=$row['product_price'];
		$desc=$row['product_desc'];
		$tags=$row['product_keywords'];

		echo "
				<div class='row'>
					<div class='col-md-6 pull-right'>
						<img src='../assets/prod_images/$image' style='width:250px;height:300px;'>
					</div>
					<div class='col-md-6'>
						<div class='row'> <div class='col-md-12'><h1>$title</h1></div></div>
						<div class='row'> <div class='col-md-12'>Calorias:<h3 class='text-muted'>$price</h3></div></div>
						<div class='row'> <div class='col-md-12'>Ingredientes:<h4 class='text-muted'>$desc</h4></div></div><br><br>
						<div class='row'> <div class='col-md-12'>Preparacion:<h4 class='text-muted'>$tags</h4></div></div>
						<button pid='$pro_id' class='product btn btn-danger'>Agregar a Mi Rutina</button>
						
					</div>
				</div>
		";
	}

 ?>


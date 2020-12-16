<?php 
$link = mysqli_connect("localhost","root","");
if($link){
    mysqli_select_db($link,"proyec_nutricion");
    mysqli_query($link,"SET NAMES 'utf8'");
  }

  $idUser = $_POST['idUsuario'];
  $idEnvia = $_POST['idEnvia'];
  $NameUser = $_POST['NameUser'];
    if($idUser == $idEnvia){
        echo'
        <script type="text/javascript">
         alert("No Se puede compartir Ati Mismo!!");
         window.location.href="cart.php";
         </script>';
     }else{
      $resultado=$link->query("SELECT EXISTS (SELECT * FROM compartir WHERE user_id ='$idEnvia' AND peso = '2');");
      $row=mysqli_fetch_row($resultado);
      
      if ($row[0]=="1") {                 
        echo'
        <script type="text/javascript">
         alert("El Usuario Y tiene una Rutina Compartida");
         window.location.href="index.php";
         </script>';
        
       }else{
        $ficha22 = "INSERT INTO compartir(p_id,product_title,user_id,product_image,price,total_amount,NameUser,product_cat,Userc,peso) 
        select p_id,product_title,'$idEnvia',product_image,price,total_amount,'$NameUser',product_cat,'$idUser','2' from cart where user_id = '$idEnvia' AND peso = '2' ";
        $insetar = mysqli_query($link,$ficha22);
      
      
        if($ficha22){
          echo'
             <script type="text/javascript">
              alert("Se ha Enviado correctamente!!");
              window.location.href="index.php";
              </script>';
      }else{
          echo'
          <script type="text/javascript">
           alert("No se pudo Guardar intente Mas tarde");
           window.location.href="index.php";
           </script>';
      }
      
         }   


 
}

?>
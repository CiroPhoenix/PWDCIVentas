
<?php
include "conexion.php"; 
session_start();

if(!isset($_SESSION['Nombre_Usuario'])){
    header("Location: login.php");
}

$id = $_SESSION['ID_Usuario'];

$sql ="SELECT Foto_Usuario from usuario where ID_Usuario=$id";
$mostrarfoto=mysqli_query($conn,$sql);




$id= $_REQUEST['Curso'];
$id_curso= $_REQUEST['Curso'];
$sql ="SELECT * from curso_comprados WHERE Curso='$id'";

$result=mysqli_query($conn,$sql);


function categoryTree($parent_id = 0, $sub_mark = ''){
  global $conn;
  
  $ID= $_REQUEST['ID_Curso'];
  $query = $conn->query("SELECT * FROM niveles WHERE nivelpadre_id = $parent_id AND Curso = $ID ORDER BY nivel_nombre ASC");
  if($query->num_rows > 0){
      while($row = $query->fetch_assoc()){
          echo '<option value="'.$row['idnivel'].'">'.$sub_mark.$row['nivel_nombre'].'</option>';
         
          categoryTree($row['idnivel'], $sub_mark.'-');
 
         
      }
  }
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del curso</title>
    <link rel="stylesheet" href="css/estilos.css" />
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js"></script>
   <link rel="stylesheet" 
   href="https://use.fontawesome.com/releases/v5.15.4/css/all.css">
   <script src="js/jquery.js"></script>

<style>

.cards:hover{
  box-shadow: 20px 20px 100px -50px #000;
  transition: 0.3s;
}

</style>

</head>
<body style="background-image: url('img/SaturnoBackground.jpg');">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
      

        <a class="navbar-brand" href="index.php">
          
            <img src="img/SaturnoLogo.png" alt="logo" width="150px">
          </a>
         
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="navbar-nav">
           <a class="navbar-brand" href="index.php">
            <img src="img/SaturnoLogo.png" alt="logo" width="150px">
          </a>

           </li>  
            
            
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Cursos
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Ptyhon</a></li>
                  <li><a class="dropdown-item" href="#">Desarrollo De Videojuegos</a></li>
                  <li><a class="dropdown-item" href="#">Dibujo</a></li>
                  <li><a class="dropdown-item" href="#">Graficas 3D</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Otros</a></li>
                </ul>
              </li>
              <div class="user-pic">
              <img src="img/ProfilePicture.png" class="user-pic" onclick="toggleMenu()" >
            </div>
            </ul>
          
            <form class="d-flex">
             


     

            </form>


          

          </div>
        </div>

      



      </nav>


      <div class="sub-menu-wrap" id="subMenu">

<div class="sub-menu">
  <div class="user-info">
    
  
  <?php 
while($foto=mysqli_fetch_assoc($mostrarfoto)){
?>



<img  src= "data:image/jpeg;base64, <?php echo base64_encode($foto['Foto_Usuario']); ?> "/>


   
<?php
}
?>




    <p><?php echo $_SESSION['Rol_Usuario']; ?></p>
    <br>
    <h3><h3><?php echo $_SESSION['Nombre_Usuario']; ?></h3></h3>
    <h3><?php echo $_SESSION['NomPatr_Usuario']; ?></h3>
   <h3><?php echo $_SESSION['NomMatr_Usuario']; ?></h3>
  </div>
  <hr>

<a href="editar.php" class="sub-menu-link">

<img src="img/Profile.png">
<p>Editar Perfil</p>
<span>></span>

</a>


<a href="Cursos_Comprados.php" class="sub-menu-link">

  <img src="img/Cursos.png">
  <p>Mis cursos</p>
<span>></span>

  </a>


    <a href="logout.php" class="sub-menu-link">

      <img src="img/Logout.png">
      <p>Cerrar Sesion</p>
    <span>></span>
    
      </a>


</div>
</div>
      





    
    
      </div>









</div>




<div class="contenedor-detalles" style="background-color: aliceblue;">
  <div class="cart" >
    <div class="pt-3 pl-0 pb-0 pr-0" style="height: auto; width: auto;">
 
    </div>
   

    
     </div>

     <?php



$sql ="SELECT * from curso where ID_Curso=$id";
$banner=mysqli_query($conn,$sql);


    while($filas = $banner->fetch_assoc()){

    ?>

<div class="col-md-3 mt-5" >
 

 <div class="cards p-2">
   
     

<h5>Curso:</h5>
<p class="lead"> <?php echo $filas['Titulo_Curso']?></p>

<img  height="40px" src= "data:image/jpeg;base64, <?php echo base64_encode($filas['Foto_Curso']); ?> "/>

  
<video width="400px" controls>
    <source src="<?php echo $filas["path_video"]; ?>" type="<?php echo $filas["content_type"]; ?>">
              Tu navegador no soporta la etiqueta de video HTML5.
 
 
</video>


<?php



}


?>
  
     <?php 

$filas = $result->fetch_assoc();
?>
    

<div class="row">

    <div class="col-md-6 order-md-1">

    



    




    </div>
    <div class="col-md-6 order-md-2">
    <form class="formulario" action="guardar_comentario.php?Curso=<?php echo $filas['Curso']?>" method="POST" id="form" enctype="multipart/form-data">

<h5>Deja tu reseña</h5>
<div class="contenedor">
           <div class="input-contenedor">
           
               <textarea id="w3review" name="Palabra_Comentario" rows="4" cols="50"></textarea>
          
           </div>


           <div class="input-contenedor">
               <input type="number" name="Calificacion_Comentario" id="Calificacion_Comentario" placeholder="Clasificacion" >
          
           </div>



           <input type="submit" value="Comentar" name="Comentar" class="button">
           

</form>
<h5>Contenido</h5>
<?php



$query ="SELECT * FROM Niveles where Curso = '$id_curso'";
    $resultado=$conn->query($query);

    while($filas = $resultado->fetch_assoc()){

    ?>

<div class="col-md-3 mt-5" >
 

 <div class="cards p-2">
   
     

<p class="lead"> <?php echo $filas['nivel_nombre']?></p>

<?php


$idCate=$filas['idnivel'];
$query2 ="SELECT * FROM SubNiveles where NivelPadre=$idCate";
    $resultado2=$conn->query($query2);

    while($filas2 = $resultado2->fetch_assoc()){

    ?>
  
<video width="330px" controls>
 <source src="<?php echo $filas2["path_video"]; ?>" type="<?php echo $filas2["content_type"]; ?>">
              Tu navegador no soporta la etiqueta de video HTML5.
 
 
</video>

<button>Termine la seccion</button> 




</div>

  



<?php

}

}


?>


    </div>

    <button>Finalizar Curso</button>
</div>

</div>

<?php

?>


<div class="row pr-md-5 d-flex justify-content-center justify-content-md-end bg-info">
  <div class="col-md-6 col-lg-4 mr-lg-5 border p-3 pb-4 rounded-lg bg-white ml-md-0" id="cart" style="position:
  absolute;z-index: 1;top: 80px;overflow: auto;">
  
  
  <div class="d-flex">
  <div class="col-md-3">
  <h5>Productos</h5>
  </div>
  <div class="col-md-3 d-flex flex-wrap align-content-center">
  <h5>Title</h5>
  </div>
  <div class="col-md-3 d-flex flex-wrap align-content-center">
  <h5>Qty</h5>
  </div>
  <div class="col-md-2 d-flex flex-wrap align-content-center">
  <h5>Price</h5>
  </div>
  <div class="col-md-1"></div>
  
  
  </div>
  
  <div id="order" style="overflow: auto;height: 250px;">
  
  
  </div>
  <div id="cart_footer" >
  <div id="order_btn" class="text-center text-white w-100 bg-dark p-2 font-weight-bold" style="letter-spacing: 
  1.2px; font-size: 20px;">
    Order
  </div>
  
  </div>
  
  
  </div>
  
  </div>
  

  <script>

    let subMenu = document.getElementById("subMenu");
  
    function toggleMenu(){
  
  subMenu.classList.toggle("open-menu");
  
    }
  
  
  </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>


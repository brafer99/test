<?php include("template/cabecera.php"); ?>
<?php 

include("administrador/config/bd.php");
$sentencia_sql = $conexion->prepare("SELECT * FROM libro;");
$sentencia_sql->execute();
//CARGA TODOS LOS DATOS FETCH_ASSOC
$lista_libros = $sentencia_sql->fetchAll(PDO::FETCH_ASSOC)
?>

<?php foreach($lista_libros as $libro ){ ?>

  <div class="col-md-3">
    <div class="card">
        <img class="card-img-top" src="./img/<?php echo $libro['sql_libro_imagen']?>" alt="">
        <div class="card-body">
            <h4 class="card-title"><?php echo $libro['sql_libro_nombre']?></h4>
            <a name="" id="" class="btn btn-primary" href="" role="button">Ver más</a>
        </div>
    </div> 
  </div> 

<?php } ?>
  
 

<?php include("template/pie.php") ?>
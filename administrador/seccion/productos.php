<?php include("../template_admin/cabecera.php");?>

<?php

$var_txt_id = (isset($_POST['txt_id'])) ? $_POST['txt_id'] :"";
$var_txt_nombre = (isset($_POST['txt_nombre'])) ? $_POST['txt_nombre'] :"";
$var_txt_imagen = (isset($_FILES['txt_imagen']['name'])) ? $_FILES['txt_imagen']['name'] :"";
$var_accion = (isset($_POST['accion'])) ? $_POST['accion'] :"";

include("../config/bd.php");

switch($var_accion){
    case "Agregar":

        //ingresamos la sentencia SQL, en los VELUES agregamos parametros:
        $sentencia_sql = $conexion->prepare("INSERT INTO libro (sql_libro_nombre,sql_libro_imagen) VALUES (:param_nombre,:param_imagen);");
        
        //utilizamos funcion bindParam para relacionar los parametros SQL con variables php:
        $sentencia_sql->bindParam(':param_nombre',$var_txt_nombre);
        $sentencia_sql->bindParam(':param_imagen',$var_txt_imagen);
        $sentencia_sql->execute();
        break;

    case "Modificar":
        echo "Presionado Boton Seleccionar";
        break;
    case "Cancelar":
        echo "Presionado Boton Cancelar";
        break;
    case "Seleccionar":
        
        $sentencia_sql = $conexion->prepare("SELECT * FROM libro WHERE sql_libro_id=:param_id;");
        $sentencia_sql->bindParam(':param_id',$var_txt_id);
        $sentencia_sql->execute();

        //FETCH_LAZY CARGA LOS DATOS UNO A UNO:
        $libro = $sentencia_sql->fetch(PDO::FETCH_LAZY);
        $var_txt_nombre=$libro['sql_libro_nombre'];
        $var_txt_imagen=$libro['sql_libro_imagen'];




        //echo "Presionado Boton Seleccionar";
        
        break;

    case "Borrar":
        $sentencia_sql = $conexion->prepare("DELETE FROM libro WHERE sql_libro_id=:param_id;");
        $sentencia_sql->bindParam(':param_id',$var_txt_id);
        $sentencia_sql->execute();
        //echo "Presionado Boton Borrar";
        break;
}

$sentencia_sql = $conexion->prepare("SELECT * FROM libro;");
$sentencia_sql->execute();
//CARGA TODOS LOS DATOS FETCH_ASSOC
$lista_libros = $sentencia_sql->fetchAll(PDO::FETCH_ASSOC)

?>

<div class="col-md-5">

    <div class="card">
        <div class="card-header">
            Datos de Libro
        </div>
        <div class="card-body">

        <!--Propiedad "enctype" ayuda a recepcionar todo tipo de dato-->
            <form method="POST" enctype="multipart/form-data">

                <div class = "form-group">  
                    <label for="txt_id">ID:</label>
                    <input type="text" class="form-control" value= "<?php echo $var_txt_id; ?>" name="txt_id" id="txt_id" placeholder="ID">
                </div>  

                <div class = "form-group">
                    <label for="txt_nombre">Nombre:</label>
                    <input type="text" class="form-control" value= "<?php echo $var_txt_nombre; ?>" name="txt_nombre" id="txt_nombre" placeholder="Nombre">
                </div>

                <div class = "form-group">
                    <label for="txt_imagen">Imagen:</label>
                    <?php echo $var_txt_imagen; ?>
                    <input type="file" class="form-control" name="txt_imagen" id="txt_imagen" placeholder="ID">
                </div>

                <div class="btn-group" role="group" aria-label="">
                    <button type="submit" name="accion" value= "Agregar" class="btn btn-success">Agregar</button>
                    <button type="submit" name="accion" value= "Modificar" class="btn btn-warning">Modificar</button>
                    <button type="submit" name="accion" value= "Cancelar" class="btn btn-info">Cancelar</button>
                </div>

            </form>
        </div>

    </div>
</div>

<div class="col-md-7">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach($lista_libros as $libro) { ?>
            
            <tr>
                <td><?php echo $libro['sql_libro_id']; ?></td>
                <td><?php echo $libro['sql_libro_nombre']; ?></td>
                <td><?php echo $libro['sql_libro_imagen']; ?></td>

                <!-- botones  -->
                <td>

                    <form method="POST">

                        <input type="hidden" name="txt_id" id="txt_id" value = "<?php echo $libro['sql_libro_id']; ?>"/>
                        <input type="submit" name="accion" value="Seleccionar" class="btn btn-primary"/>
                        <input type="submit" name="accion" value="Borrar" class="btn btn-danger"/>

                    </form>

                </td>
            </tr>
            
            <?php }?>

        </tbody>
    </table>
</div>



<?php include("../template_admin/pie.php")?>
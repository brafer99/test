<?php include("../template_admin/cabecera.php")?>
<?php

$var_txt_id = (isset($_POST['txt_id'])) ? $_POST['txt_id'] :"";
$var_txt_nombre = (isset($_POST['txt_nombre'])) ? $_POST['txt_nombre'] :"";
$var_txt_imagen = (isset($_FILES['txt_imagen']['name'])) ? $_FILES['txt_imagen']['name'] :"";
$var_accion = (isset($_POST['accion'])) ? $_POST['accion'] :"";

echo $var_txt_id."<br/>";
echo $var_txt_nombre."<br/>";
echo $var_txt_imagen."<br/>";
echo $var_accion."<br/>";

switch($var_accion){
    case "Agregar":
        //INSERT INTO libro (sql_libro_nombre,sql_libro_imagen) VALUES ('Libro de PHP','imagen_php.jpg');
        echo "Presionado Boton Agregar";
        break;
    case "Modificar":
        echo "Presionado Boton Seleccionar";
        break;
    case "Cancelar":
        echo "Presionado Boton Cancelar";
        break;

    

}



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
                    <input type="text" class="form-control" name="txt_id" id="txt_id" placeholder="ID">
                </div>  

                <div class = "form-group">
                    <label for="txt_nombre">Nombre:</label>
                    <input type="text" class="form-control" name="txt_nombre" id="txt_nombre" placeholder="Nombre">
                </div>

                <div class = "form-group">
                    <label for="txt_imagen">Imagen:</label>
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
            <tr>
                <td>2</td>
                <td>Aprende PHP</td>
                <td>imagen.jpg</td>
                <td>SELECCIONAR | BORRAR</td>
            </tr>
        </tbody>
    </table>
</div>



<?php include("../template_admin/pie.php")?>
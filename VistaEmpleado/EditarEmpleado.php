<!DOCTYPE html>
<?php
  require '../conexion.php';
  $vdni=$_GET['vdni'];
  /*echo "$vdni";*/
  $re = $conn->prepare('SELECT * FROM TB_EMPLEADO WHERE DniEmpleado=:vdni');
  $re->bindParam(':vdni', $vdni);
  $re->execute();
  $resultados = $re->fetchAll(PDO::FETCH_OBJ);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Empleado</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                margin: 0;
                padding: 0;
            }

            .container {
                width: 400px;
                margin: 50px auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            }

            .form-group {
                margin-bottom: 15px;
            }

            label {
                font-weight: bold;
                display: block;
                margin-bottom: 5px;
            }

            input[type="text"] {
                width: calc(100% - 12px);
                padding: 6px;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            button[type="submit"] {
                padding: 10px 20px;
                background-color: #007bff;
                color: #fff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                font-size: 16px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Editar Empleado</h1>
            <form action="Actualizar.php" method="POST">
                <?php foreach ($resultados as $result){?>
                <div class="form-group">
                    <label for="txtDni">DNI</label>
                    <input name="txtDni" type="text" value="<?php echo $result->DniEmpleado;?>"/>
                </div>
                <div class="form-group">
                    <label for="txtNom">NOMBRE</label>
                    <input name="txtNom" type="text" value="<?php echo $result->Nombre;?>"/>              
                </div>
                <div class="form-group">
                    <label for="txtApe">APELLIDOS</label>
                    <input name="txtApe" type="text" value="<?php echo $result->Apellido;?>"/>
                </div>
                <div class="form-group">
                    <label for="txtGen">GENERO</label>
                    <input name="txtGen" type="text" value="<?php echo $result->Genero;?>"/>              
                </div>
                <div class="form-group">
                    <label for="txtTel">TELEFONO</label>
                    <input name="txtTel" type="text" value="<?php echo $result->Telefono;?>"/>              
                </div>  
                <div class="form-group">
                    <label for="txtPue">PUESTO</label>
                    <input name="txtPue" type="text" value="<?php echo $result->Puesto;?>"/>              
                </div> 
                <div class="form-group">
                    <label for="txtEst">ESTADO</label>
                    <input name="txtEst" type="text" value="<?php echo $result->Estado;?>"/>              
                </div> 
                <div class="form-group">
                    <label for="txtIdArea">AREA</label>
                    <input name="txtIdArea" type="text" value="<?php echo $result->IdArea;?>"/>              
                </div> 
                <div class="form-group">
                    <button name="btnInsertar" type="submit">Actualizar</button>
                </div>
                <?php }?>
            </form>
        </div>
    </body>
</html>
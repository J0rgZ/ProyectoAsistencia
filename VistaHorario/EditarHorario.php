<!DOCTYPE html>
<?php
  require '../conexion.php';
  $vdni=$_GET['vdni'];
  /*echo "$vdni";*/
  $re = $conn->prepare('SELECT * FROM TB_HORARIO WHERE IdHorario=:vdni');
  $re->bindParam(':vdni', $vdni);
  $re->execute();
  $resultados = $re->fetchAll(PDO::FETCH_OBJ);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Agregar Empleado</title>
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
            <h1>Editar Horario</h1>
            <?php foreach ($resultados as $result){?>
            <form action="ActualizarHorario.php" method="POST">
                <div class="form-group">
                    <label for="txtHor">ID HORARIO</label>
                    <input name="txtHor" type="text" value="<?php echo $result->IdHorario;?>"/>
                </div>
                <div class="form-group">
                    <label for="txtTur">TURNO</label>
                    <input name="txtTur" type="text" value="<?php echo $result->NombreHorario;?>"/>              
                </div>
                <div class="form-group">
                    <label for="txtIni">FECHA INICIO</label>
                    <input name="txtIni" type="date" value="<?php echo $result->FechaInicio;?>"/>
                </div>
                <div class="form-group">
                    <label for="txtFin">FECHA FIN</label>
                    <input name="txtFin" type="date" value="<?php echo $result->FechaFin;?>"/>              
                </div>
                <div class="form-group">
                    <label for="txtEnt">HORA ENTRADA</label>
                    <input name="txtEnt" type="time" value="<?php echo $result->HoraEntrada;?>"/>              
                </div>    
                <div class="form-group">
                    <label for="txtSal">HORA SALIDA</label>
                    <input name="txtSal" type="time" value="<?php echo $result->HoraSalida;?>"/>              
                </div> 
                <div class="form-group">
                    <button name="btnInsertar" type="submit">Actualizar</button>
                </div>
                <?php }?>
            </form>
        </div>
    </body>
</html>
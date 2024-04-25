<!DOCTYPE html>
<?php
  require '../conexion.php';
  $vidarea=$_GET['vidarea'];
  /*echo "$vidarea";*/
  $re = $conn->prepare('SELECT * FROM TB_AREA WHERE IdArea=:vidarea');
  $re->bindParam(':vidarea', $vidarea);
  $re->execute();
  $resultados = $re->fetchAll(PDO::FETCH_OBJ);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar Area</title>
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
            <h1>Editar Area</h1>
            <form action="ActualizarArea.php" method="POST">
                <?php foreach ($resultados as $result){?>
                <div class="form-group">
                    <label for="txtIdArea">ID AREA </label>
                    <input name="txtArea" type="text" value="<?php echo $result->IdArea;?>"/>
                </div>
                <div class="form-group">
                    <label for="txtHor">HORARIO</label>
                    <input name="txtHor" type="text" value="<?php echo $result->IdHorario;?>"/>              
                </div>
                <div class="form-group">
                    <label for="txtAre">AREA</label>
                    <input name="txtAre" type="text" value="<?php echo $result->NombreArea;?>"/>
                </div>
                <div class="form-group">
                    <label for="txtDes">DESCRIPCION</label>
                    <input name="txtDes" type="text" value="<?php echo $result->Descripcion;?>"/>              
                </div>
                <div class="form-group">
                    <button name="btnInsertar" type="submit">Actualizar</button>
                </div>
                <?php }?>
            </form>
        </div>
    </body>
</html>
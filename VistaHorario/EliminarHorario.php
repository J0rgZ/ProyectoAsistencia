<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<?php
  require '../conexion.php';
  $id = $_GET['vhor'];
  echo "LA VARIABLE DE ID HORARIO ES $id" ;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php  
             try {
                $re = $conn->prepare('delete FROM TB_HORARIO where IdHorario=:vhor');
                $re->bindParam(':vhor',$id);
                $re->execute();
              }   
            catch (PDOException $e) {
                print $e->getMessage ();
            }    
                
        ?>
    </body>
</html>

<?php

  require '../conexion.php';
  
try {
        $varidarea=$_POST['txtIdArea'];
        $varhor=$_POST['txtHor'];
        $varare=$_POST['txtAre'];
        $vardes=$_POST['txtDes'];
        echo "la variable ID del area es $varidarea";
        $re = $conn->prepare('insert into TB_AREA (IdArea,IdHorario,NombreArea,Descripcion) values(:vidarea,:vhor,:vare,:vdes);');
        $re->bindParam(':vidarea',$varidarea);
        $re->bindParam(':vhor',$varhor);
        $re->bindParam(':vare',$varare);
        $re->bindParam(':vdes',$vardes);
        $re->execute();
        }   
    catch (PDOException $e) {
        print $e->getMessage ();
        }    
?>

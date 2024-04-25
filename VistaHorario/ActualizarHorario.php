<?php

  require '../conexion.php';
  
try {
        $varidarea=$_POST['txtIdArea'];
        $varhor=$_POST['txtHor'];
        $varare=$_POST['txtAre'];
        $vardes=$_POST['txtDes'];
        /*echo "la variable dni es $vardni";*/
        $re = $conn->prepare('update TB_HORARIO set IdHorario=:vhor,NombreArea=:vare,Descripcion=:vdes where IdArea=:vidarea;');
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


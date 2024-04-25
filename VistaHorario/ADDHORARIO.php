<?php

  require '../conexion.php';
  
try {
        $varhor=$_POST['txtHor'];
        $vartur=$_POST['txtTur'];
        $varini=$_POST['txtIni'];
        $varfin=$_POST['txtFin'];
        $varent=$_POST['txtEnt'];
        $varsal=$_POST['txtSal'];
        echo "la variable ID del horario es $varhor";
        $re = $conn->prepare('insert into TB_HORARIO (IdHorario,NombreHorario,FechaInicio,FechaFin,HoraEntrada,HoraSalida) values(:vhor,:vtur,:vini,:vfin,:vent,:vsal);');
        $re->bindParam(':vhor',$varhor);
        $re->bindParam(':vtur',$vartur);
        $re->bindParam(':vini',$varini);
        $re->bindParam(':vfin',$varfin);
        $re->bindParam(':vent',$varent);
        $re->bindParam(':vsal',$varsal);
        $re->execute();
        }   
    catch (PDOException $e) {
        print $e->getMessage ();
        }    
?>

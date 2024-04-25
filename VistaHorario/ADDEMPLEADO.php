<?php

  require '../conexion.php';
  
try {
        $vardni=$_POST['txtDni'];
        $varnom=$_POST['txtNom'];
        $varape=$_POST['txtApe'];
        $vargen=$_POST['txtGen'];
        $vartel=$_POST['txtTel'];
        $varest=$_POST['txtEst'];
        $varidarea=$_POST['txtIdArea'];
        echo "la variable dni es $vardni";
        $re = $conn->prepare('insert into TB_EMPLEADO (DNI,Nombre,Apellido,Genero,Telefono,Estado,IdArea) values(:vdni,:vnom,:vape,:vgen,:vtel,:vest,:vare);');
        $re->bindParam(':vdni',$vardni);
        $re->bindParam(':vnom',$varnom);
        $re->bindParam(':vape',$varape);
        $re->bindParam(':vgen',$vargen);
        $re->bindParam(':vtel',$vartel);
        $re->bindParam(':vest',$varest);
        $re->bindParam(':vare',$varidarea);
        $re->execute();
        }   
    catch (PDOException $e) {
        print $e->getMessage ();
        }    
?>

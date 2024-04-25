<?php

  require '../conexion.php';
  
try {
        $vardni=$_POST['txtDni'];
        $varnom=$_POST['txtNom'];
        $varape=$_POST['txtApe'];
        $vargen=$_POST['txtGen'];
        $vartel=$_POST['txtTel'];
        $varpue=$_POST['txtPue'];
        $varest=$_POST['txtEst'];
        $varare=$_POST['txtIdArea'];
        /*echo "la variable dni es $vardni";*/
        $re = $conn->prepare('update TB_EMPLEADO set Nombre=:vnom,Apellido=:vape,Genero=:vgen,Telefono=:vtel,Puesto=:vpue,Estado=:vest,IdArea=:vare where DniEmpleado=:vdni;');
        $re->bindParam(':vdni',$vardni);
        $re->bindParam(':vnom',$varnom);
        $re->bindParam(':vape',$varape);
        $re->bindParam(':vtel',$vartel);
        $re->bindParam(':vpue',$varpue);
        $re->bindParam(':vgen',$vargen);
        $re->bindParam(':vest',$varest);
        $re->bindParam(':vare',$varare);
        $re->execute();
        }   
    catch (PDOException $e) {
        print $e->getMessage ();
        }    
?>


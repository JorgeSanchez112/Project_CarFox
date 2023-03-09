<?php
class Permisos
{
    public function validar($documento, $contrasena)   
    {
        
    include ("conexion.php");

    $sql = "SELECT * FROM usuarios WHERE documento='$documento'";
    if(!$result = $db->query($sql)):
        die('hay un error primera consulta!!! ['. $db->error.']');
    endif;

    $cont="0";

    while($row = $result-> fetch_assoc()):
        $p_cifrada=stripslashes($row["contrasena"]);

        if( $p_cifrada == $contrasena  || password_verify($contrasena, $p_cifrada)):
            $cont += "1";
        endif;

    endwhile;

    if ($cont=="0"):
        header("location:index.php");
        $_SESSION['logueado']="0";
    endif;
    

        if ($cont!="0"):


            $sql1 = "SELECT * FROM permisos WHERE documento='$documento'";
            
            if(!$result1 = $db->query($sql1)):
                die('Hay un error primera consulta!!! ['.$db->error.']');
            endif;

            while ($row=$result1->fetch_assoc()):

                $documentod=stripslashes($row["documento"]);
                $fk_id_rol=stripslashes($row["fk_id_rol"]);
                $nuevo=stripslashes($row["nuevo"]);

                if($nuevo == 0){
                    
                    session_start();
                    $_SESSION['logueado']="3";
                    $_SESSION['usuario_actual']=$documento;
                    header("location:pres_registro_camb_contrasena.php");
                }else{
                    if($documentod == $documento && $fk_id_rol==1){

                        $sql2 = "SELECT * FROM usuarios WHERE documento='$documento'";
                    
                        if(!$result2 = $db->query($sql2)):
                            die('Hay un error primera consulta!!! ['.$db->error.']');
                        endif;
    
                        while ($row=$result2->fetch_assoc()):
                            $nombre=stripslashes($row["nombres"]);
                        endwhile;
    
                        session_start();
                        $_SESSION['logueado']="1";
                        $_SESSION['usuario_actual']=$documento;
                        $_SESSION['nombre_usuario']=$nombre;
                        header("location:dashboard_administrador.php");
    
                    }else if($documentod == $documento && $fk_id_rol==2){
    
                        $sql2 = "SELECT * FROM usuarios WHERE documento='$documento'";
                    
                            if(!$result2 = $db->query($sql2)):
                                die('Hay un error primera consulta!!! ['.$db->error.']');
                            endif;
    
                            while ($row=$result2->fetch_assoc()):
                                $nombre=stripslashes($row["nombres"]);
                            endwhile;
    
                        session_start();
                        $_SESSION['logueado']="2";
                        $_SESSION['usuario_actual']=$documento;
                        $_SESSION['nombre_usuario']=$nombre;
                    
                        header("location:dashboard_mecanico.php");
                    }
                }
                     
            endwhile;

        endif;

   }
 }
 $nuevo=new Permisos();
 $nuevo->validar($_POST["documento"],$_POST["contrasena"]);
?>
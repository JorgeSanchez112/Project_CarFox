<?php
class Camb_contra
{
    public function validar($documento, $pregunta, $respuesta)   
    {
        
    include ("conexion.php");

    $sql = "SELECT * FROM camb_contra WHERE fk_documento='$documento'";
    if(!$result = $db->query($sql)):
        die('hay un error primera consulta!!! ['. $db->error.']');
    endif;

    $cont="0";

    while($row = $result-> fetch_assoc()):
        $preguntab=stripslashes($row["preguntas"]);
        $respuestab=stripslashes($row["respuesta"]);


        if( $preguntab == $pregunta  && $respuestab == $respuesta):
            $cont += "1";
        endif;

    endwhile;

    echo $cont ;

    if ($cont=="0"):
        /* header("location:index.php"); */
        $_SESSION['logueado']="0";
    endif;

        if ($cont!="0"):


            $sql1 = "SELECT * FROM usuarios WHERE documento='$documento'";
            
            if(!$result1 = $db->query($sql1)):
                die('Hay un error primera consulta!!! ['.$db->error.']');
            endif;

            while ($row=$result1->fetch_assoc()):

                $documento=stripslashes($row["documento"]);
                    
                    session_start();
                    $_SESSION['logueado']="4";
                    $_SESSION['usuario_actual']=$documento;
                    header("location:pres_actualizar_camb_contrasena.php");

            endwhile;

        endif;

   }
 }
 $nuevo=new Camb_contra();
 $nuevo->validar($_POST["documentoc"],$_POST["pregunta"],$_POST["respuesta"]);
?>
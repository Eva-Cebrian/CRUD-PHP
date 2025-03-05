<?php
include_once '../configuracion/bd.php';
$conexionBD = BD::crearInstancia();


?>
<div>
    <?php




    $sql = "SELECT a.nombre, a.apellidos, GROUP_CONCAT(c.nombre_curso SEPARATOR ', ') AS cursos
FROM ALUMNOS a
LEFT JOIN ALUMNOS_CURSOS ac ON a.id = ac.idalumnos
LEFT JOIN CURSOS c ON ac.idcursos = c.id
GROUP BY a.id";

    $consulta = $conexionBD->prepare($sql);
    $consulta->execute();
    $cursosPorAlumno = $consulta->fetchAll();
    //print_r($cursosPorAlumno);

    ?>
</div>
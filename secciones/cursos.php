<?php
//INSERT INTO `CURSOS` (`id`, `nombre_curso`) VALUES (NULL, 'curso Web con PHP');

include_once '../configuracion/bd.php';
$conexionBD = BD::crearInstancia();

$id = isset($_POST['id']) ? $_POST['id'] : '';
$nombre_curso = isset($_POST['nombre_curso']) ? $_POST['nombre_curso'] : '';
$accion = isset($_POST['accion']) ? $_POST['accion'] : "";

if ($accion != '') {
    switch ($accion) {
        case 'agregar':
            $sql = "INSERT INTO CURSOS (id, nombre_curso) VALUES (NULL, :nombre_curso)";
            $consulta = $conexionBD->prepare($sql);
            $consulta->bindParam(':nombre_curso', $nombre_curso);
            $consulta->execute();


            echo $sql;
            break;
        case 'editar':
            $sql = "UPDATE CURSOS SET nombre_curso='$nombre_curso' WHERE id=$id";
            echo $sql;
            break;
        case 'borrar':
            $sql = "DELETE FROM CURSOS WHERE id=$id";
            echo $sql;
            break;
    }
}
?>
<div>
    <?php

    print_r($_POST);

    $consulta = $conexionBD->prepare("SELECT * FROM CURSOS"); //genera una consulta que se conecta a la base de datos con el objeto conexionBd y le pasa una consulta SQL
    $consulta->execute();
    $listaCursos = $consulta->fetchAll();
    // print_r($listaCursos);
    ?>
</div>
<?php ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<?php
include('../templates/cabecera.php');
include('../secciones/alumnos.php'); ?>


VISTA ALUMNOS
<div class="col-md-12">
    <div
        class="table-responsive">
        <table
            class="table">
            <thead>
                <tr>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">APELLIDOS</th>
                    <th scope="col">CURSOS</th>

                </tr>
            </thead>
            <tbody>
                <?php foreach ($cursosPorAlumno as $fila) { ?>


                    <tr class="">
                        <td><?php echo $fila['nombre'] ?></td>
                        <td><?php echo $fila['apellidos'] ?></td>
                        <td><?php echo $fila['cursos'] ?? 'Sin cursos' ?></td>

                    </tr>
                <?php  } ?>

            </tbody>
        </table>
    </div>
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Buscar..." aria-label="Buscar" aria-describedby="button-search">
        <button class="btn btn-primary" type="button" id="button-search">
            <i class="bi bi-search"></i> Buscar
        </button>
    </div>

    <?php include('../templates/pie.php'); ?>
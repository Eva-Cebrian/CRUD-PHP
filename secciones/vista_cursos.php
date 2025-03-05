<?php ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<?php include('../templates/cabecera.php'); ?>
<?php include('../secciones/cursos.php');



?>


<div class="col-md-5">
    <form action="" method="post">
        <div class="card">
            <div class="card-header">CURSOS</div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="" class="form-label">ID</label>
                    <input
                        type="text"
                        class="form-control"
                        name="id"
                        id="id"
                        value="<?php echo $id ?>"
                        aria-describedby="helpId"
                        placeholder="ID" />
                    <small id="helpId" class="form-text text-muted">ID</small>
                </div>

                <div class="mb-3">
                    <label for="" class="form-label">Nombre del Curso</label>
                    <input
                        type="text"
                        class="form-control"
                        name="nombre_curso"
                        id="nombre_curso"
                        value="<?php echo $nombre_curso ?>"
                        aria-describedby="helpId"
                        placeholder="Nombre del curso" />
                    <small id="helpId" class="form-text text-muted">Nombre del curso</small>
                </div>
                <div class="btn-group" role="group" aria-label="Button group name">
                    <button
                        type="submit"
                        value="agregar"
                        name="accion"
                        class="btn btn-success">
                        AGREGAR
                    </button>
                    <button
                        type="submit"
                        value="editar"
                        name="accion"
                        class="btn btn-warning">
                        EDITAR
                    </button>
                    <button
                        type="submit"
                        value="borrar"
                        name="accion"
                        class="btn btn-danger">
                        BORRAR
                    </button>
                </div>

            </div>

        </div>

    </form>





</div>
<div class="col-md-7">
    <div
        class="table-responsive">
        <table
            class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listaCursos as $curso) { ?>


                    <tr class="">
                        <td><?php echo $curso['id'] ?></td>
                        <td><?php echo $curso['nombre_curso'] ?></td>
                        <td>

                            <form action="" method="post">
                                <input type="hidden" name="id" id="id" value="<?php echo $curso['id'] ?>">
                                <input type="submit" value="Seleccionar" name="accion" class="btn btn-info">

                            </form>
                        </td>
                    </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>

</div>




<?php include('../templates/pie.php'); ?>
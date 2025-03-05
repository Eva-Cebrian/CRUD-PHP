<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>

<?php
include('../templates/cabecera.php');
include('../secciones/alumnos.php');
?>

VISTA ALUMNOS
<div class="col-md-12">
    <div class="table-responsive">
        <table class="table" id="alumnosTable">
            <thead>
                <tr>
                    <!-- Filtros desplegables por columna -->
                    <th scope="col">
                        NOMBRE
                        <select id="nombreFilter" class="form-select form-select-sm" onchange="filterTable()">
                            <option value="">Todos</option>
                            <?php
                            $nombres = array_column($cursosPorAlumno, 'nombre');
                            $nombres = array_unique($nombres); // Filtra nombres únicos
                            foreach ($nombres as $nombre) { ?>
                                <option value="<?= $nombre ?>"><?= $nombre ?></option>
                            <?php } ?>
                        </select>
                    </th>
                    <th scope="col">
                        APELLIDOS
                        <select id="apellidosFilter" class="form-select form-select-sm" onchange="filterTable()">
                            <option value="">Todos</option>
                            <?php
                            $apellidos = array_column($cursosPorAlumno, 'apellidos');
                            $apellidos = array_unique($apellidos); // Filtra apellidos únicos
                            foreach ($apellidos as $apellido) { ?>
                                <option value="<?= $apellido ?>"><?= $apellido ?></option>
                            <?php } ?>
                        </select>
                    </th>
                    <th scope="col">
                        CURSOS
                        <select id="cursosFilter" class="form-select form-select-sm" onchange="filterTable()">
                            <option value="">Todos</option>
                            <?php
                            foreach ($cursosPorAlumno as $fila) {
                                $cursos = explode(', ', $fila['cursos']);
                                foreach ($cursos as $curso) { ?>
                                    <option value="<?= $curso ?>"><?= $curso ?></option>
                            <?php }
                            }
                            ?>
                        </select>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cursosPorAlumno as $fila) { ?>
                    <tr class="alumno-row" data-nombre="<?= $fila['nombre'] ?>" data-apellidos="<?= $fila['apellidos'] ?>" data-cursos="<?= $fila['cursos'] ?>">
                        <td><?php echo $fila['nombre'] ?></td>
                        <td><?php echo $fila['apellidos'] ?></td>
                        <td><?php echo $fila['cursos'] ?? 'Sin cursos' ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include('../templates/pie.php'); ?>

<!-- Script para aplicar los filtros -->
<script>
    function filterTable() {
        var nombreFilter = document.getElementById('nombreFilter').value.toLowerCase();
        var apellidosFilter = document.getElementById('apellidosFilter').value.toLowerCase();
        var cursosFilter = document.getElementById('cursosFilter').value.toLowerCase();

        var rows = document.querySelectorAll('#alumnosTable tbody tr');

        rows.forEach(function(row) {
            var nombre = row.dataset.nombre.toLowerCase();
            var apellidos = row.dataset.apellidos.toLowerCase();
            var cursos = row.dataset.cursos.toLowerCase();

            // Verifica si la fila coincide con todos los filtros
            var nombreMatch = nombre.includes(nombreFilter) || !nombreFilter;
            var apellidosMatch = apellidos.includes(apellidosFilter) || !apellidosFilter;
            var cursosMatch = cursos.includes(cursosFilter) || !cursosFilter;

            // Muestra u oculta la fila
            if (nombreMatch && apellidosMatch && cursosMatch) {
                row.style.display = ''; // Mostrar fila
            } else {
                row.style.display = 'none'; // Ocultar fila
            }
        });
    }
</script>
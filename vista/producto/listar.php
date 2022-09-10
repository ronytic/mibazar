<table class="table table-border">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Foto</th>
            <th>Descripcion</th>
        </tr>

    </thead>

    <?php
    $i = 0;
    foreach ($productos as $producto) {
        $i++;
    ?>

        <tr>
            <td><?= $i ?></td>
            <td><?= $producto['nombre'] ?></td>
            <td><?= $producto['precio'] ?></td>
            <td>
                <img src="<?= $producto['foto'] ?>" height="60">

            </td>
            <td><?= $producto['descripcion'] ?></td>
            <td>
                <a class="btn btn-warning" href="./?c=producto&m=modificar&id=<?= $producto['id_producto'] ?>">M</a>

                <a class="btn btn-danger" href="./?c=producto&m=eliminar&id=<?= $producto['id_producto'] ?>">E</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>
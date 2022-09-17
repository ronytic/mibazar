<table class="table table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Cliente</th>
            <th>Nit</th>
            <th>Total</th>
            <th>Cancelado</th>
            <th>Cambio</th>
            <th>Fecha</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $i = 0;
        foreach ($ventas as $venta) {
            $i++;
        ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $venta['nombrecliente'] ?></td>
                <td><?= $venta['nitcliente'] ?></td>
                <td><?= $venta['totalgeneral'] ?></td>
                <td><?= $venta['cancelado'] ?></td>
                <td><?= $venta['cambio'] ?></td>
                <td><?= $venta['fecha'] ?></td>
            </tr>
        <?php
        } ?>
    </tbody>
</table>
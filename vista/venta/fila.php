<tr>
    <td>
        <select name="producto[<?= $numerofila ?>][id_producto]" data-fila="<?= $numerofila ?>" class="form-control producto">
            <option value="">Seleccione</option>
            <?php foreach ($productos as $producto) { ?>
                <option value="<?= $producto['id_producto'] ?>">
                    <?= $producto['nombre'] ?>
                </option>
            <?php } ?>

        </select>
        <img src="" alt="" class="imagen" height="100" data-fila="<?= $numerofila ?>">
    </td>
    <td>
        <input type="number" name="producto[<?= $numerofila ?>][stock]" class="form-control stock" readonly data-fila="<?= $numerofila ?>">
    </td>
    <td>
        <input type="number" name="producto[<?= $numerofila ?>][precio]" class="form-control precio" readonly data-fila="<?= $numerofila ?>">
    </td>
    <td>
        <input type="number" name="producto[<?= $numerofila ?>][cantidad]" class="form-control cantidad" data-fila="<?= $numerofila ?>">
    </td>
    <td>
        <input type="number" name="producto[<?= $numerofila ?>][total]" class="form-control total" readonly data-fila="<?= $numerofila ?>">
    </td>
</tr>
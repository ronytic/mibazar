<form action="./?c=producto&m=actualizar" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $producto['id_producto'] ?>">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?= $producto['nombre'] ?>">
    </div>
    <div class="form-group">
        <label for="precio">Precio</label>
        <input type="text" class="form-control" name="precio" placeholder="Precio" value="<?= $producto['precio'] ?>">
    </div>
    <div class="form-group">
        <label for="precio">Foto</label>
        <input type="file" class="form-control" name="foto" placeholder="Foto">
        <img src="<?= $producto['foto'] ?>" height="100">
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea class="form-control" name="descripcion" rows="3"><?= $producto['descripcion'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
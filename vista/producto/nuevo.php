<h3>Nuevo Producto</h3>
<form action="./?c=producto&m=guardar" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" name="nombre" placeholder="Nombre">
    </div>
    <div class="form-group">
        <label for="precio">Precio</label>
        <input type="text" class="form-control" name="precio" placeholder="Precio">
    </div>
    <div class="form-group">
        <label for="precio">Foto</label>
        <input type="file" class="form-control" name="foto" placeholder="Foto">
    </div>
    <div class="form-group">
        <label for="descripcion">Descripción</label>
        <textarea class="form-control" name="descripcion" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
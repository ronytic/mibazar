<form action="./?c=venta&m=guardar" method="POST">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Producto</th>
                <th>Stock</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody id="marca" class="cuerpo">


        </tbody>

        <tfoot>
            <tr>
                <th colspan="3" rowspan="1">
                    <input type="button" value="Añadir" id="anadir" class="btn btn-primary">
                </th>
                <th>
                    Total
                </th>
                <th>
                    <input type="number" name="totalgeneral" id="totalgeneral" class="form-control" readonly>
                </th>
            </tr>
            <tr>
                <th>
                    Nombre Cliente
                </th>
                <th>
                    <input type="text" name="nombrecliente" class="form-control">
                </th>
                <th></th>
                <th>
                    Cancelado
                </th>
                <th>
                    <input type="number" name="cancelado" id="cancelado" class="form-control">
                </th>
            </tr>
            <tr>
                <th>
                    Nit Cliente

                </th>
                <th>
                    <input type="text" name="nitcliente" class="form-control" required>
                </th>
                <th></th>
                <th>
                    Cambio
                </th>
                <th>
                    <input type="number" name="cambio" id="cambio" class="form-control text-white" readonly>
                </th>
            </tr>
        </tfoot>
    </table>
    <div class="text-center">
        <input type="submit" value="Guardar Venta" class="btn btn-success">
    </div>
</form>
let numerofila = 0;
$(document).ready(function () {
    // $("#anadir").click(function () {
    //     alert("HOLA me has pulsado");
    // });


    $("#anadir").click(function (evento) {
        evento.preventDefault();
        numerofila++;
        $.post('?c=venta&m=fila',
            { numerofila },
            function (data) {//Respuesta
                $("#marca").append(data);
            }
        );
    });

    $(document).on("change", '.producto', function (e) {
        var numerofila = $(this).attr("data-fila");
        var id_producto = $(this).val();

        $.post('?c=venta&m=datosproducto',
            { 'id_producto': id_producto },
            function (data) { //data es la respuesta del servidor en formato json
                $(`.stock[data-fila=${numerofila}]`).val(data.stock);
                $(`.precio[data-fila=${numerofila}]`).val(data.precio);
                $(`.cantidad[data-fila=${numerofila}]`).attr({ 'max': data.stock });
                $(`.imagen[data-fila=${numerofila}]`).attr({ 'src': data.imagen });
            },
            "json"
        );

    });




    $(document).on("change", ".precio,.cantidad", function () {
        //attr agarrar a cualquier atributo de lo que esta seleccionado
        var fila = $(this).attr('data-fila');
        // alert(fila);

        var valorPrecio = $(`.precio[data-fila=${fila}]`).val();
        var valorCantidad = $(`.cantidad[data-fila=${fila}]`).val();

        valorPrecio = parseFloat(valorPrecio);
        valorCantidad = parseFloat(valorCantidad);
        var total = valorCantidad * valorPrecio;

        $(`.total[data-fila=${fila}]`).val(total);
        // console.log({ valorPrecio });
        // console.log({ valorCantidad });


        // Calcular la suma totalGeneral

        var totalGeneral = 0;
        $(".total").each(function () {
            var valorTotal = $(this).val();

            totalGeneral = totalGeneral + parseFloat(valorTotal);

            // console.log({ valorTotal });
            // console.log({ totalGeneral });
        });

        $("#totalgeneral").val(totalGeneral);

    });




    $("#cancelado").keyup(function (e) {
        var valorCancelado = $(this).val();
        valorCancelado = parseFloat(valorCancelado);
        //  console.log(valorCancelado);

        var valorTotalGeneral = $("#totalgeneral").val();
        valorTotalGeneral = parseFloat(valorTotalGeneral);


        var valorCambio = valorCancelado - valorTotalGeneral;

        $("#cambio").val(valorCambio.toFixed(2));

        if (valorCambio >= 0) {
            $("#cambio").addClass("text-success").removeClass('text-danger');
        } else {
            $("#cambio").addClass("text-danger").removeClass('text-success');
        }
    });



});
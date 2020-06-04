<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Examen</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"
          integrity="sha384-Bfad6CLCknfcloXFOyFnlgtENryhrpZCe29RTifKEixXQZ38WheV+i/6YWSzkz3V" crossorigin="anonymous">
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif

    <div class="content">
        <div class="title m-b-md">
            Examen Samuel Medina D.
        </div>
        <div class="row">
            <div class="col-md-4">
                <p>Para fines del examen se encuentran seteadas dos (2) cajas, para observar el flujo sin necesidad de modificar la BD, para realizar las pruebas.</p>
                <select name="caja"  id="caja">
                    <option value="" disabled selected>Seleccione una opción</option>
                    <option value="1">Caja #1</option>
                    <option value="2">Caja #2</option>
                </select>
            </div>
        </div>
        <div id="contenidoCaja" class="row">

            <div class="col-md-6">
                <form action="" id="open_day_form" class="form_group">
                    <h3>Apertura de caja</h3>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form_group">
                                <label for="">Fecha(yyyy-mm-dd)</label>
                                <input type="text" class="form-control" name="open_date" id="open_date">
                            </div>
                            <div class="form_group">
                                <label for="">Total Anterior</label>
                                <input type="text" class="form-control" name="value_previous_close"
                                       id="value_previous_close">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form_group">
                                <label for="">Hora(hh:mm)</label>
                                <input type="text" class="form-control" name="hour_open" id="hour_open">
                            </div>
                            <div class="form_group">
                                <label for="">Total Inicial</label>
                                <input type="text" class="form-control" name="value_open" id="value_open">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Observaciones</label>
                                <input type="textarea" class="form-control" name="observation" id="observation">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="#!" class="btn btn-primary"><i class="fas fa-arrow-up"></i> Abrir Caja</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <h3>Cierre de Caja</h3>
                <div class="form-group" id="alertNoDataCashier" style="display: none;">
                    <h2><i class="far fa-surprise fa-3x"></i> <br>No hay informacion para mostrar.</h2>
                </div>
                <div class="form-group" id="inputsCierreCaja">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form_group">
                                <label for="">Fecha(yyyy-mm-dd)</label>
                                <input type="text" class="form-control" name="date_close" id="date_close">
                            </div>
                            <div class="form_group">
                                <label for="">Ventas en efectivo</label>
                                <input type="text" class="form-control" name="value_cash" id="value_cash">
                            </div>
                            <div class="form_group">
                                <label for="">Ventas por transferencia</label>
                                <input type="text" class="form-control" name="value_transfer" id="value_transfer">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form_group">
                                <label for="">Hora(hh:mm)</label>
                                <input type="text" class="form-control" name="hour_close" id="hour_close">
                            </div>
                            <div class="form_group">
                                <label for="">Ventas por tarjeta</label>
                                <input type="text" class="form-control" name="value_card" id="value_card">
                            </div>
                            <div class="form_group">
                                <label for="">Ventas por otros métodos</label>
                                <input type="text" class="form-control" name="other_value" id="other_value">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <h4>Valores para cierre de caja</h4>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form_group">
                                <label for="">Total en Ventas</label>
                                <input type="number" class="form-control" name="sales_total" id="sales_total">
                            </div>
                            <div class="form_group">
                                <label for="">Propinas Efectivo</label>
                                <input type="number" class="form-control" name="tip_cash" id="tip_cash">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form_group">
                                <label for="">Total Apertura</label>
                                <input type="number" class="form-control" name="total_open" id="total_open">
                            </div>
                            <div class="form_group">
                                <label for="">Propinas tarjeta</label>
                                <input type="number" class="form-control" name="tip_card" id="tip_card">
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Total de Caja</label>
                                <input type="number" class="form-control" name="total_cashier" id="total_cashier">
                            </div>
                            <div class="form-group field_wrapper">
                                <h4>Gastos adicionales</h4>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="button" id="agregarGasto" class="add_button form-control btn btn-success" style="margin-bottom: 5px;"><i class="fas fa-close"></i>Agregar gasto</button>
                            <button type="button" id="ImprimirX" class="form-control btn btn-success" style="margin-bottom: 5px;">Imprimir Corte X</button>
                            <button type="button" id="cerrarCaja" class="form-control btn btn-primary">Cerrar caja</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script>
    $('#contenidoCaja').css('display','none');
</script>
<script>
    $(document).ready(function () {
        /**
         * Recibir datos para apertura de caja
         *
         */
        $('#caja').on('change',function() {
            $('#contenidoCaja').css('display','');
            $('#alertNoDataCashier').css('display', 'none');
            $('#inputsCierreCaja').css('display','none');
            var r = $(this).val();
            var token = '{{ csrf_token() }}';
            console.log(r);
            $.ajax({
                method: 'get',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                crossDomain: true,
                url: 'https://api.esjanus.mx/api/v1/cashier/balance',
                contentType: 'application/json',
                dataType: "json",
                data: {'_token':token,'caja':r},
                success: function (data) {
                    console.log(data.results);
                    $('#open_date').val(data.results.date_open);
                    $('#hour_open').val(data.results.hour_open);
                    $('#value_open').val(data.results.value_open);
                    $('#value_previous_close').val(data.results.value_previous_close);
                    $('#observation').val(data.results.observation);

                    if (data.results.value_open == null) {
                        $('#alertNoDataCashier').css('display', '');
                        $('#inputsCierreCaja').css('display','none');
                    } else {
                        $('#alertNoDataCashier').css('display', 'none');
                        $('#inputsCierreCaja').css('display','');
                    }
                }
            });

            $.ajax({
                method: 'get',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                crossDomain: true,
                url: 'https://api.esjanus.mx/api/v1/has/open/cashier/balance',
                contentType: 'application/json',
                dataType: "json",
                data: {'_token':token,'caja':r},
                success: function (data) {
                    console.log(data.results);
                    $('#date_close').val(data.results.date_close);
                    $('#hour_close').val(data.results.hour_close);
                    $('#value_cash').val(data.results.value_cash);
                    $('#value_card').val(data.results.value_card);
                    $('#value_transfer').val(data.results.value_transfer);
                    $('#other_value').val(data.results.other_value);
                    $('#sales_total').val(data.results.sales_total);
                    $('#total_cashier').val(data.results.total_cashier);
                    $('#total_open').val(data.results.total_open);
                    $('#tip_card').val(data.results.tip_card);
                    $('#tip_cash').val(data.results.tip_cash);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function () {
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div style="border: 1px solid; margin-bottom: 5px; border-radius: 5px; border-color: #cccccc;">' +
            '<label>Nombre</label><input type="text" class="form-control" name="nombreExpenses[]"  style="margin-left: 5px; padding-right: 5px;"/><label>Valor</label><input style="margin-left: 5px; margin-right: 5px;" type="text" class="form-control" name="valorExpenses[]"/><a href="javascript:void(0);" class="remove_button" title="Remove field"><i class="fas fa-minus-circle"></i></a>' +
            '</div>'; //New input field html
        var x = 1; //Initial field counter is 1
        $(addButton).click(function () { //Once add button is clicked
            if (x < maxField) { //Check maximum number of input fields
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); // Add field html
            }
        });
        $(wrapper).on('click', '.remove_button', function (e) { //Once remove button is clicked
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>
</body>
</html>

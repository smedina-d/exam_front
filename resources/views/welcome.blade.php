<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

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
                                <input type="text" class="form-control" name="value_previous_close" id="value_previous_close">
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

                </form>
            </div>
            <div class="col-md-6">
                <h3>Cierre de Caja</h3>
                <div class="form-group" id="alertNoDataCashier">
                    <h2><i class="far fa-surprise fa-3x"></i> <br>No hay informacion para mostrar.</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        $('#alertNoDataCashier').css('display','none');
        /**
         * Recibir datos para apertura de caja
         *
         */
        $.ajax({
            method: 'get',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            crossDomain: true,
            url: 'https://api.esjanus.mx/api/v1/cashier/balance',
            contentType: 'application/json',
            dataType: "json",
            success: function (data) {
                console.log(data.results);
                $('#open_date').val(data.results.date_open);
                $('#hour_open').val(data.results.hour_open);
                $('#value_open').val(data.results.value_open);
                $('#value_previous_close').val(data.results.value_previous_close);
                $('#observation').val(data.results.observation);
                if(data.results.value_open == null) {
                    $('#alertNoDataCashier').css('display','true');
                }
            }
        });

    });
</script>
</body>
</html>

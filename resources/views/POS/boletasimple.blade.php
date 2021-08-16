@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Boleta Simple</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item">POS</li>
                        <li class="breadcrumb-item">Boleta Simple</li>
                    </ol>
                </div>
            </div>
            <form name="form1" method="post" action="" >
                <!--Botones-->
                <div class="row">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary">
                            <input type="radio" name="options" id="Ticket" autocomplete="off"> Ticket
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="options" id="Boleta" autocomplete="off"> Boleta
                        </label>
                    </div>
                </div>
                <!--Ingreso de precios-->
                <div class="row">
                    <table>
                        <tr><td><input type="number" name="num1" id="num1" placeholder="Total a pagar" /></td></tr>
                        <tr><td><input type="text" name="num2" id="num2" placeholder="Cantidad Pagada" /></td></tr>
                        <tr><td><input type="text" name="subt" id="subt" disabled /></td></tr>
                    </table>
                </div>
                <!--Botones de medios de pago-->
                <div class="btn-group-vertical btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary active">
                        <input type="radio" name="options" id="efectivo" autocomplete="off"> Efectivo
                    </label>
                    <label class="btn btn-secondary">
                        <input type="radio" name="options" id="tarjeta" autocomplete="off"> Tarjeta
                    </label>
                    <label class="btn btn-secondary">
                        <input type="radio" name="options" id="transferencia" autocomplete="off"> Transferencia
                    </label>
                </div>
                <div class="row">
                    <input type="button" class="btn btn-success" value="Imprimir">
                </div>
            </form>
        </div>
    </section>

@endsection
@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            //this calculates values automatically
            sum();
            $("#num1, #num2").on("keydown keyup", function() {
                sum();
            });
        });

        function sum() {
            var num1 = document.getElementById('num1').value;
            var num2 = document.getElementById('num2').value;
            var result = parseInt(num1) + parseInt(num2);
            var result1 = parseInt(num2) - parseInt(num1);
            if (!isNaN(result)) {
                document.getElementById('subt').value = result1;
            }
        }
    </script>
@endsection

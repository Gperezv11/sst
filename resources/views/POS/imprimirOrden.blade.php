@extends('layouts.app') 
    
    <script src="https://parzibyte.github.io/plugin-ticket-js/Impresora.js"></script>

@section('css')
<style type="text/css">
    .page {
    width: 12cm;
    height: auto;
    margin: 10mm auto;
    background: white;
    box-shadow: 0 0 5px rgb(0 0 0 / 10%);
    font-weight: normal;
    font-size: 9px !important;
    font-family: Verdana, Geneva, sans-serif;}
</style>

@endsection

@section('content')
<div class="page">
    <table width="80%" cellpadding="10" class="tableS" cellspacing="10" style="font-family: Tahoma; font-size: 11.5px !important;margin-left:20px">
        <tbody>
            <tr>
                <td colspan="2" style="text-align:center" class="noborder"><img src="/images/S png.png" width="90" alt="PRA"></td>
            </tr>
        </tbody>
    </table>
    
          
    <table width="80%" cellpadding="10" class="tableS" cellspacing="10" style="font-family: Tahoma; font-size: 11.5px !important;margin-left:20px;">
    
        <thead>
            <tr>
                <td colspan="3" class="noborder"><strong>Fecha</strong> {{substr ($comanda->updated_at,0,10)}}</td>
                <td colspan="3" class="noborder" style="text-align:right"><strong>Hora</strong> {{substr ($comanda->updated_at,10,19)}} </td>
            </tr>
            <tr>
                <td class="noborder" colspan="5"><strong>No ped</strong> {{$comanda->id}}</td>
            </tr>
            <tr>
                <td colspan="5" class="noborder">&nbsp;</td>
            </tr>
            <tr>
                <td width="15"><strong>S.No.</strong></td>
                <td width="150"><strong>Menu</strong></td>
                <td id="kitchenph" width="100"><strong>P.Unitario</strong></td>
                <td width="15"><strong>Cant</strong></td>
                <td id="kitchentotalh" width="60"><strong>Total</strong></td>
            </tr>
        </thead>
        <tbody>
            @if($pedido)

            @foreach($pedido as $orden)
            @foreach($orden->producto as $producto) 
            <tr>
                <td width="15"><strong>- {{$producto->id}}</strong></td>
                <td width="100"><strong>{{$producto->nombre}}</strong></td>
                <td class="kitchen" width="50"><strong>{{$orden->precio_venta}}</strong></td>
                <td width="15"><strong>{{$orden->cantidad}}</strong></td>
                <td class="kitchen" width="50"><strong>{{$orden->total_pago}}</strong></td>
            </tr>
            @endforeach
            @endforeach
            @endif
        </tbody>
    </table>
    
    <table style="page-break-inside:avoid;font-family: Tahoma; font-size: 11.5px !important;margin-left:20px" width="90%" cellpadding="5" class="tableS kitchen" cellspacing="5" id="kitchen">
        <tbody>
            <tr>
                <td colspan="3"><strong>Propina:</strong></td>
                <td><strong></strong></td>
                <td class="grandtotalFont"><strong>{{$comanda->propina}}</strong></td>
            </tr> 
            <tr>
                <td colspan="3"><strong>Tipo de Pago:</strong></td>
                <td><strong></strong></td>
                <td class="grandtotalFont"><strong>{{$comanda->medio_pago}}</strong></td>
            </tr>
            
            <tr>
                <td colspan="3"><strong>TOTAL A PAGAR:</strong></td>
                <td><strong></strong></td>
                <td class="grandtotalFont"><strong>{{$comanda->propina + $comanda->total}}</strong></td>
            </tr>   
            <tr>
                <td class="removeborder"></td>
                    <td class="removeborder">&nbsp;</td>
                    <td class="removeborder"></td>
                    <td class="removeborder"></td>
                    <td class="removeborder"></td>
            </tr> 
            <tr>
                <td class="removeborder"></td>
                    <td class="removeborder">&nbsp;</td>
                    <td class="removeborder"></td>
                    <td class="removeborder"></td>
                    <td class="removeborder"></td>
            </tr> 
            <tr>
                <td colspan="5" style="text-align:center">
                <strong>Gracias por tu visita :)</strong></td>
            </tr>  
        </tbody>
    </table>
    
</div>
    <div class="select" style="text-align:center">
        <select name="listaDeImpresoras" id="listaDeImpresoras"></select>
    </div>
    <p style="text-align:center"><input type="button" id="btnImprimir" value="Print" onclick="printpage()" class="btn btn-success" style="visibility: visible;"> </p>
@endsection

@section('scripts')
    <script>
        const $listaDeImpresoras = document.querySelector("#listaDeImpresoras"),
        
        $btnImprimir = document.querySelector("#btnImprimir");


        const obtenerListaDeImpresoras = () => {
            console.log("Cargando lista...");
            Impresora.getImpresoras()
                .then(listaDeImpresoras => {
                    console.log("Lista cargada");
                    listaDeImpresoras.forEach(nombreImpresora => {
                        const option = document.createElement('option');
                        option.value = option.text = nombreImpresora;
                        $listaDeImpresoras.appendChild(option);
                    })
                });
        }

        $btnImprimir.addEventListener("click", () => {
            let impresora = new Impresora();
            impresora.setFontSize(1, 1);
            impresora.write("Fuente 1,1\n");
            impresora.setFontSize(1, 2);
            impresora.write("Fuente 1,2\n");
            impresora.setFontSize(2, 2);
            impresora.write("Fuente 2,2\n");
            impresora.setFontSize(2, 1);
            impresora.write("Fuente 2,1\n");
            impresora.setFontSize(1, 1);
            impresora.setEmphasize(1);
            impresora.write("Emphasize 1\n");
            impresora.setEmphasize(0);
            impresora.write("Emphasize 0\n");
            impresora.setAlign("center");
            impresora.write("Centrado\n");
            impresora.setAlign("left");
            impresora.write("Izquierda\n");
            impresora.setAlign("right");
            impresora.write("Derecha\n");
            impresora.setFont("A");
            impresora.write("Fuente A\n");
            impresora.setFont("B");
            impresora.write("Fuente B\n");
            impresora.feed(2);
            impresora.write("Separado por 2\n");
            impresora.setAlign("center");
            impresora.write("QR:\n");
            impresora.qr("https://parzibyte.me/blog");
            impresora.write("Barcode:\n");
            impresora.barcode("123456", 80, "barcode128");
            impresora.cut();
            impresora.cutPartial(); // Pongo este y también cut porque en ocasiones no funciona con cut, solo con cutPartial
            impresora.cash();
            impresora.imprimirEnImpresora($listaDeImpresoras.value);
        });

        // En el init, obtenemos la lista
        obtenerListaDeImpresoras();
    </script>
@endsection

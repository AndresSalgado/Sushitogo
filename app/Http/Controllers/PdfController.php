<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Dompdf\Dompdf;
use App\Models\pedido;

class PdfController extends Controller
{
    public function DescargarFactura($id){

        $Pedido = pedido::findOrFail($id);
        $Contenido = view('client.pdf', compact('Pedido'))->render();
        $dompdf = new Dompdf();
        $dompdf->loadHtml($Contenido);
        $dompdf->render();
        return $dompdf->stream('Factura-' . $id . '.pdf');
    }
}

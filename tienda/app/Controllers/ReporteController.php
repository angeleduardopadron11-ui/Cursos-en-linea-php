<?php
namespace App\Controllers;
use Dompdf\Dompdf;
use App\Models\ServicioModel;

class ReporteController {
    private $model;

    public function __construct($db) {
        $this->model = new ServicioModel($db);
        // ELIMINAMOS el IF de sesión de aquí. 
        // El index.php ya se encarga de proteger la ruta.
    }

    public function imprimirGeneral() {
        // Limpiamos cualquier salida previa para evitar errores en el PDF
        if (ob_get_length()) ob_end_clean();

        $servicios = $this->model->listarTodos();
        $dompdf = new Dompdf();
        
        $html = '<h1>Reporte de Servicios</h1>';
        $html .= '<table border="1" width="100%" style="border-collapse: collapse;">';
        $html .= '<tr style="background-color: #f2f2f2;"><th>ID</th><th>Nombre</th><th>Precio</th></tr>';
        
        foreach ($servicios as $s) {
            $html .= "<tr>
                        <td style='text-align:center;'>{$s['id']}</td>
                        <td>{$s['nombre']}</td>
                        <td style='text-align:right;'>\${$s['precio']}</td>
                      </tr>";
        }
        $html .= '</table>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        
        // Attachment => true para que el navegador lo descargue directamente
        $dompdf->stream("reporte_servicios.pdf", ["Attachment" => true]);
        exit(); // CRUCIAL para evitar el error de redirección
    }

    public function exportarExcel() {
        // Limpiamos el búfer para que el Excel no salga corrupto
        if (ob_get_length()) ob_end_clean();

        $servicios = $this->model->listarTodos();
        
        header("Content-Type: application/vnd.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=reporte_servicios.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        echo '<table border="1">';
        echo '<tr><th style="background-color: #cccccc;">ID</th><th style="background-color: #cccccc;">Nombre</th><th style="background-color: #cccccc;">Precio</th></tr>';
        foreach ($servicios as $s) {
            echo "<tr><td>{$s['id']}</td><td>{$s['nombre']}</td><td>{$s['precio']}</td></tr>";
        }
        echo '</table>';
        
        exit(); // CRUCIAL: Detiene el script aquí para que el Excel sea válido
    }
}
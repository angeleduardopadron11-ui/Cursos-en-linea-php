<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte de Inscritos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Oculta los botones cuando se genera el PDF o se imprime */
        @media print { 
            .no-print { display: none !important; } 
            body { background: white !important; color: black !important; }
        }
        .header-report {
            border-bottom: 2px solid #333;
            margin-bottom: 20px;
            padding-bottom: 10px;
        }
    </style>
</head>
<body> <div class="container mt-5">
        <div class="header-report d-flex justify-content-between align-items-center">
            <h2 class="mb-0">Reporte de Estudiantes Inscritos</h2>
            <div class="no-print">
                <button onclick="window.print()" class="btn btn-primary">Imprimir / Guardar PDF</button>
                <button onclick="window.close()" class="btn btn-secondary">Cerrar</button>
            </div>
        </div>

        <table class="table table-bordered table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Estudiante</th>
                    <th>Email</th>
                    <th>Curso Inscrito</th>
                    <th>Fecha de Inscripción</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($reporte)): ?>
                    <?php foreach ($reporte as $r): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($r['nombre']); ?></td>
                        <td><?php echo htmlspecialchars($r['email']); ?></td>
                        <td><?php echo htmlspecialchars($r['curso']); ?></td>
                        <td><?php echo htmlspecialchars($r['fecha_inscripcion']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4" class="text-center">No hay estudiantes inscritos actualmente.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        
        <p class="text-muted small mt-4">Reporte generado el: <?php echo date('d/m/Y H:i'); ?></p>
    </div>
</body>
</html>
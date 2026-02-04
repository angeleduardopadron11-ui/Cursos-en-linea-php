<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Servicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow">
        <div class="container">
            <a class="navbar-brand" href="index.php?url=servicios">
                <i class="fas fa-concierge-bell me-2"></i>SISTEMA DE SERVICIOS
            </a>
            <div class="d-flex align-items-center">
                <span class="navbar-text me-3 text-white">
                    <i class="fas fa-user-circle me-1"></i> 
                    <strong><?php echo htmlspecialchars($_SESSION['usuario_nombre'] ?? 'Usuario'); ?></strong>
                </span>
                <a href="index.php?url=logout" class="btn btn-danger btn-sm">Salir</a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="m-0"><i class="fas fa-plus-circle me-2"></i>Registrar Nuevo Servicio</h4>
                    </div>
                    <div class="card-body">
                        <form action="index.php?url=guardar" method="POST">
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre del Servicio</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ej. Corte de Cabello" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="descripcion" class="form-label">Descripción</label>
                                <textarea name="descripcion" id="descripcion" class="form-control" rows="3" placeholder="Breve descripción..." required></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="precio" class="form-label">Precio ($)</label>
                                <input type="number" step="0.01" name="precio" id="precio" class="form-control" placeholder="0.00" required>
                            </div>
                            
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save me-1"></i> Guardar Servicio
                                </button>
                                <a href="index.php?url=servicios" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left me-1"></i> Cancelar
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
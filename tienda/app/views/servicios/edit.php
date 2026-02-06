<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Servicio</title>
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
                <div class="card shadow border-0">
                    <div class="card-header bg-warning text-dark py-3">
                        <h4 class="m-0"><i class="fas fa-edit me-2"></i>Modificar Servicio</h4>
                    </div>
                    <div class="card-body p-4">
                        <form action="index.php?url=actualizar" method="POST">
                            <input type="hidden" name="id" value="<?php echo $servicio['id']; ?>">

                            <div class="mb-3">
                                <label class="form-label fw-bold">Nombre del Servicio</label>
                                <input type="text" name="nombre" class="form-control" 
                                       value="<?php echo htmlspecialchars($servicio['nombre']); ?>" required>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Descripción</label>
                                <textarea name="descripcion" class="form-control" rows="3" required><?php echo htmlspecialchars($servicio['descripcion']); ?></textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold">Precio ($)</label>
                                <input type="number" step="0.01" name="precio" class="form-control" 
                                       value="<?php echo $servicio['precio']; ?>" required>
                            </div>
                            
                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i> Guardar Cambios
                                </button>
                                <a href="index.php?url=servicios" class="btn btn-light border">
                                    Cancelar
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
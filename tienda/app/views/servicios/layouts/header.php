<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SISTEMA DE SERVICIOS - PRO</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">

<style>
body {
    font-family: 'Inter', sans-serif;
    background-color: #0f172a; /* Azul muy oscuro tipo KDE */
    color: #f8fafc;
    min-height: 100vh;
}

/* Navbar Estilo Glassmorphism */
.navbar-custom {
    background: rgba(30, 41, 59, 0.7);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    padding: 15px 0;
}

.navbar-brand {
    font-weight: 700;
    letter-spacing: 1px;
    color: #38bdf8 !important; /* Azul cyan neón */
    text-transform: uppercase;
}

.user-badge {
    background: rgba(56, 189, 248, 0.1);
    padding: 5px 15px;
    border-radius: 50px;
    border: 1px solid rgba(56, 189, 248, 0.2);
    color: #38bdf8;
    font-weight: 600;
}

.btn-logout {
    background: linear-gradient(45deg, #ef4444, #991b1b);
    border: none;
    border-radius: 8px;
    transition: 0.3s;
    font-weight: 600;
}

.btn-logout:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 15px rgba(239, 68, 68, 0.4);
}

/* Contenedor principal con sombra suave */
.main-content {
    padding-top: 20px;
    animation: fadeIn 0.8s ease-in-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top">
<div class="container">
<a class="navbar-brand" href="index.php?url=dashboard">
<i class="bi bi-cpu-fill"></i> SISTEMA MVC
</a>

<div class="navbar-nav ms-auto align-items-center">
<div class="user-badge me-3">
<i class="bi bi-person-fill"></i> <?php echo $_SESSION['usuario_nombre'] ?? 'Invitado'; ?>
</div>
<a class="btn btn-danger btn-sm btn-logout px-3" href="index.php?url=logout">
<i class="bi bi-power"></i> Salir
</a>
</div>
</div>
</nav>

<div class="container main-content">

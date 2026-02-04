<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Sistema de Servicios</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

<style>
body {
    background: radial-gradient(circle at top right, #1e293b, #0f172a);
    min-height: 100vh;
    display: flex;
    align-items: center;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.login-card {
    max-width: 420px;
    width: 90%;
    background: rgba(30, 41, 59, 0.7); /* Fondo traslúcido */
    backdrop-filter: blur(15px); /* Efecto de vidrio */
    border: 1px solid rgba(255, 255, 255, 0.1);
    border-radius: 20px;
    color: white;
}

.form-control {
    background: rgba(15, 23, 42, 0.5);
    border: 1px solid rgba(255, 255, 255, 0.1);
    color: white;
    padding: 12px;
    border-radius: 10px;
}

.form-control:focus {
    background: rgba(15, 23, 42, 0.8);
    color: white;
    border-color: #38bdf8;
    box-shadow: 0 0 10px rgba(56, 189, 248, 0.3);
}

.btn-primary {
    background: linear-gradient(45deg, #0284c7, #38bdf8);
    border: none;
    padding: 12px;
    border-radius: 10px;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: 0.3s;
}

.btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(56, 189, 248, 0.4);
}

.login-icon {
    font-size: 3rem;
    color: #38bdf8;
    margin-bottom: 10px;
}

a { color: #38bdf8; text-decoration: none; }
a:hover { text-decoration: underline; }

/* Estilo para las etiquetas */
.form-label {
    font-weight: 500;
    color: #cbd5e1;
}
</style>
</head>
<body>
<div class="container d-flex justify-content-center">
<div class="card login-card shadow-lg p-4 p-md-5">
<div class="text-center">
<i class="bi bi-shield-lock-fill login-icon"></i>
<h3 class="mb-1 fw-bold">Bienvenido</h3>
<p class="text-muted mb-4" style="color: #94a3b8 !important;">Inicia sesión para continuar</p>
</div>

<?php if (isset($error)): ?>
<div class="alert alert-danger py-2 text-center border-0" style="background: rgba(239, 68, 68, 0.2); color: #fca5a5; font-size: 0.9rem;">
<i class="bi bi-exclamation-triangle-fill"></i> <?php echo $error; ?>
</div>
<?php endif; ?>

<form action="index.php?url=autenticar" method="POST">
<div class="mb-3">
<label class="form-label">Correo Electrónico</label>
<div class="input-group">
<input type="email" name="email" class="form-control" placeholder="admin@correo.com" required>
</div>
</div>
<div class="mb-4">
<label class="form-label">Contraseña</label>
<input type="password" name="password" class="form-control" placeholder="********" required>
</div>
<button type="submit" class="btn btn-primary w-100 fw-bold">
<i class="bi bi-box-arrow-in-right me-2"></i> Entrar al Sistema
</button>
</form>

<div class="text-center mt-4">
<small style="color: #94a3b8;">¿No tienes cuenta? <a href="index.php?url=registrar" class="fw-bold">Regístrate aquí</a></small>
</div>
</div>
</div>
</body>
</html>

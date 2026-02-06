<?php
// Capturamos el error de la URL si existe para manejarlo con SweetAlert y el div de alerta
$error_duplicado = isset($_GET['error']) && $_GET['error'] == 'duplicate';
?>

<div class="full-page-center">
<div class="card p-5 shadow-lg border-0 animate-pop-in main-card">

<div class="text-center mb-5">
<div class="registration-badge mb-3">
<i class="bi bi-person-plus-fill text-info"></i>
</div>
<h1 class="fw-bold text-white mb-2 title-text">REGISTRO</h1>
<p class="text-white opacity-75 subtitle-text">Crea tu cuenta de acceso al sistema</p>
</div>

<?php if ($error_duplicado): ?>
<div class="alert alert-danger border-0 mb-4 text-center fw-bold animate-pop-in"
style="background: rgba(239, 68, 68, 0.2); color: #fff; border-radius: 15px; border: 1px solid rgba(239, 68, 68, 0.4);">
<i class="bi bi-exclamation-triangle-fill me-2"></i>
Este correo electrónico ya está registrado. Intenta con otro o inicia sesión.
</div>
<?php endif; ?>

<?php if (isset($error) && !$error_duplicado): ?>
<div class="alert alert-danger border-0 mb-4 text-center fw-bold" style="background: rgba(239, 68, 68, 0.2); color: #fff; border-radius: 15px;">
<i class="bi bi-exclamation-octagon me-2"></i><?php echo $error; ?>
</div>
<?php endif; ?>

<form action="index.php?url=guardar-usuario" method="POST" class="px-md-4">

<div class="row mb-4 align-items-center form-row">
<div class="col-md-4">
<label class="form-label text-white fw-bold mb-0 label-large">Nombre:</label>
</div>
<div class="col-md-8">
<div class="input-group custom-group shadow-sm">
<span class="input-group-text"><i class="bi bi-person-circle"></i></span>
<input type="text" name="nombre" placeholder="Tu nombre completo" class="form-control" required>
</div>
</div>
</div>

<div class="row mb-4 align-items-center form-row">
<div class="col-md-4">
<label class="form-label text-white fw-bold mb-0 label-large">Correo:</label>
</div>
<div class="col-md-8">
<div class="input-group custom-group shadow-sm">
<span class="input-group-text"><i class="bi bi-envelope-at-fill"></i></span>
<input type="email" name="email" placeholder="ejemplo@correo.com" class="form-control" required>
</div>
</div>
</div>

<div class="row mb-5 align-items-center form-row">
<div class="col-md-4">
<label class="form-label text-white fw-bold mb-0 label-large">Seguridad:</label>
</div>
<div class="col-md-4">
<div class="input-group custom-group shadow-sm">
<span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
<input type="password" name="password" placeholder="Clave" class="form-control" required>
</div>
</div>
<div class="col-md-4 mt-3 mt-md-0">
<div class="input-group custom-group shadow-sm">
<span class="input-group-text"><i class="bi bi-shield-lock-fill"></i></span>
<input type="password" name="confirm_password" placeholder="Confirmar" class="form-control" required>
</div>
</div>
</div>

<div class="mt-5">
<button type="submit" class="btn btn-neon-register w-100 fw-bold shadow-lg">
REGISTRARSE <i class="bi bi-rocket-takeoff-fill ms-3"></i>
</button>
</div>
</form>

<div class="text-center mt-5">
<p class="text-white footer-text">
¿Ya eres miembro? <a href="index.php?url=login" class="text-info fw-bold login-link">Inicia sesión aquí</a>
</p>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// Manejo del error de duplicado con SweetAlert2
<?php if ($error_duplicado): ?>
Swal.fire({
    title: '¡Email en uso!',
    text: 'Este correo ya se encuentra registrado. Intenta iniciar sesión o usa un correo diferente.',
    icon: 'warning',
    background: '#0f172a',
    color: '#ffffff',
    confirmButtonColor: '#38bdf8',
    confirmButtonText: 'Entendido',
    backdrop: `rgba(15, 23, 42, 0.8)`
});
<?php endif; ?>
</script>

<style>
/* --- VARIABLES Y REGLAS GLOBALES --- */
:root {
    --glass-bg: rgba(15, 23, 42, 0.95);
    --neon-blue: #38bdf8;
    --deep-dark: #020617;
}

.form-label, h1, p, label {
    color: #ffffff !important;
}

/* --- CONTENEDOR MAESTRO --- */
.full-page-center {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    width: 100vw;
    background: radial-gradient(circle at center, #1e293b 0%, var(--deep-dark) 100%);
    position: fixed;
    top: 0;
    left: 0;
    overflow-y: auto;
    padding: 40px 20px;
}

/* --- TARJETA --- */
.main-card {
    max-width: 850px;
    width: 100%;
    background: var(--glass-bg);
    backdrop-filter: blur(25px);
    border-radius: 40px;
    border: 1px solid rgba(56, 189, 248, 0.2);
    box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5) !important;
}

.registration-badge {
    font-size: 3rem;
    display: inline-block;
    filter: drop-shadow(0 0 10px var(--neon-blue));
}

.title-text { font-size: 3.5rem; letter-spacing: -2px; }
.subtitle-text { font-size: 1.5rem; }
.label-large { font-size: 1.6rem; }

/* --- INPUTS --- */
.input-group-text {
    background-color: rgba(15, 23, 42, 0.5) !important;
    border: 1px solid rgba(56, 189, 248, 0.3) !important;
    color: var(--neon-blue) !important;
    font-size: 1.5rem;
    padding-left: 20px;
    padding-right: 20px;
    border-radius: 15px 0 0 15px !important;
}

.form-control {
    background-color: rgba(2, 6, 23, 0.6) !important;
    border: 1px solid rgba(56, 189, 248, 0.3) !important;
    color: var(--neon-blue) !important;
    padding: 15px 20px !important;
    font-size: 1.3rem !important;
    transition: all 0.3s ease;
    border-radius: 0 15px 15px 0 !important;
}

.form-control::placeholder {
    color: rgba(255, 255, 255, 0.2);
}

.form-control:focus {
    border-color: var(--neon-blue) !important;
    box-shadow: 0 0 20px rgba(56, 189, 248, 0.4) !important;
    background-color: var(--deep-dark) !important;
    transform: translateX(5px);
}

/* --- BOTÓN --- */
.btn-neon-register {
    background: linear-gradient(45deg, #0284c7, #38bdf8);
    border: none;
    color: white !important;
    padding: 20px;
    font-size: 2rem;
    border-radius: 25px;
    transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    text-transform: uppercase;
    letter-spacing: 2px;
}

.btn-neon-register:hover {
    box-shadow: 0 0 40px rgba(56, 189, 248, 0.6);
    transform: translateY(-5px) scale(1.02);
}

/* --- ANIMACIONES --- */
@keyframes popIn {
    0% { opacity: 0; transform: scale(0.9) translateY(20px); }
    100% { opacity: 1; transform: scale(1) translateY(0); }
}
.animate-pop-in {
    animation: popIn 0.6s cubic-bezier(0.23, 1, 0.32, 1);
}

.form-row:hover { transform: scale(1.01); transition: 0.3s;}
</style>

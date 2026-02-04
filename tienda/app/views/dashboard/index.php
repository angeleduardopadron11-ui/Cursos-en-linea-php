<?php include '../app/views/servicios/layouts/header.php'; ?>

<div class="container py-4">
<div class="row mb-4 justify-content-center">
<div class="col-md-10">
<div class="card p-4 border-0 shadow-lg" style="background: linear-gradient(135deg, rgba(30, 41, 59, 0.9), rgba(15, 23, 42, 0.9)); backdrop-filter: blur(10px);">
<div class="text-center">
<h1 class="display-6 fw-bold text-white mb-1">
¡Hola, <span style="color: #38bdf8;"><?php echo $_SESSION['usuario_nombre']; ?></span>!
</h1>
<p class="text-white lead mb-0 fw-light">Panel de Administración del Sistema</p>
</div>
</div>
</div>
</div>

<div class="row justify-content-center">
<div class="col-md-6 col-lg-5">
<div class="card h-100 p-5 border-0 shadow-sm card-hover text-center" style="transition: 0.3s; background: rgba(30, 41, 59, 0.6); border-radius: 25px;">

<div class="icon-container mb-4 d-flex justify-content-center">
<div class="icon-shape bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center">
<i class="bi bi-gear-wide-connected" style="font-size: 4.5rem;"></i>
</div>
</div>

<h3 class="h4 text-white fw-bold mb-3">Gestión de Servicios</h3>
<p class="text-white-50 mb-4">Accede para configurar, editar o añadir nuevos servicios al catálogo del sistema de forma segura.</p>

<a class="btn btn-primary w-100 fw-bold py-3 shadow-lg" href="index.php?url=servicios" style="background: linear-gradient(45deg, #0284c7, #38bdf8); border: none; border-radius: 15px; font-size: 1.1rem; letter-spacing: 1px;">
ENTRAR A GESTIÓN <i class="bi bi-arrow-right-short ms-2"></i>
</a>
</div>
</div>
</div>
</div>

<style>
/* Efecto de elevación y borde neón al pasar el mouse */
.card-hover:hover {
    transform: translateY(-12px);
    background: rgba(30, 41, 59, 0.9) !important;
    box-shadow: 0 20px 40px rgba(0,0,0,0.6) !important;
    border: 1px solid rgba(56, 189, 248, 0.4) !important;
}

/* Contenedor del icono */
.icon-shape {
    width: 130px;
    height: 130px;
    border: 2px solid rgba(56, 189, 248, 0.2);
    transition: 0.6s cubic-bezier(0.34, 1.56, 0.64, 1);
}

/* Animación: La tuerca gira y brilla al pasar el mouse */
.card-hover:hover .icon-shape {
    transform: rotate(180deg);
    color: #38bdf8 !important;
    border-color: #38bdf8;
    box-shadow: 0 0 20px rgba(56, 189, 248, 0.3);
}

/* Animación suave al cargar la página */
.container {
    animation: slideUp 0.7s ease-out;
}

@keyframes slideUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<?php include '../app/views/servicios/layouts/footer.php'; ?>

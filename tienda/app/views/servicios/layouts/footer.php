</div> <footer class="footer mt-5 py-4" style="background: rgba(15, 23, 42, 0.8); backdrop-filter: blur(10px); border-top: 1px solid rgba(255, 255, 255, 0.05);">
<div class="container">
<div class="row align-items-center">
<div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
<p class="mb-0 text-white-50 small">
&copy; <?php echo date('Y'); ?> <span class="text-info fw-bold">SISTEMA MVC</span>.
Todos los derechos reservados.
</p>
</div>

<div class="col-md-6 text-center text-md-end">
<div class="d-inline-flex align-items-center px-3 py-1 rounded-pill" style="background: rgba(56, 189, 248, 0.05); border: 1px solid rgba(56, 189, 248, 0.2);">
<i class="bi bi-cpu text-info me-2"></i>
<small class="text-info fw-bold" style="letter-spacing: 1px;">DEVELOPED</small>
</div>
</div>
</div>
</div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<style>
/* Asegura que el footer se quede abajo si hay poco contenido */
body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}
.footer {
    margin-top: auto !important;
}

/* Suavizado de scroll para Linux */
html {
    scroll-behavior: smooth;
}
</style>

</body>
</html>

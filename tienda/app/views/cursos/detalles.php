<?php include '../app/views/servicios/layouts/header.php'; ?>

<div class="container py-5">
<a href="index.php?url=cursos" class="btn btn-outline-light mb-4 btn-sm" style="border-radius: 8px; opacity: 0.7;">
<i class="bi bi-chevron-left"></i> Volver al catálogo
</a>

<div class="row">
<div class="col-lg-8">
<div class="p-5 mb-4 shadow-lg text-white" style="background: linear-gradient(135deg, #1e293b 0%, #0f172a 100%); border-radius: 30px; border: 1px solid rgba(255,255,255,0.05);">
<span class="badge bg-primary mb-3 px-3 py-2" style="border-radius: 10px;">
<?php echo $estaInscrito ? 'Estudiante Activo' : 'Introducción'; ?>
</span>
<h1 class="display-4 fw-bold mb-3"><?php echo htmlspecialchars($curso['titulo']); ?></h1>
<p class="fs-5 text-white-50"><?php echo htmlspecialchars($curso['descripcion']); ?></p>
</div>

<div class="card border-0 shadow-lg p-4 mb-4" style="background: rgba(30, 41, 59, 0.4); border-radius: 25px; color: #cbd5e1;">
<?php if ($estaInscrito): ?>
<h3 class="text-white fw-bold mb-4 border-bottom border-primary pb-2" style="width: fit-content;">Video de la Clase</h3>
<div class="ratio ratio-16x9 bg-black mb-4 shadow-lg" style="border-radius: 20px; overflow: hidden; border: 2px solid #38bdf8;">
<iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="Video Lección" allowfullscreen></iframe>
</div>
<div class="alert alert-info border-0" style="background: rgba(56, 189, 248, 0.1); color: #38bdf8; border-radius: 15px;">
<i class="bi bi-unlock-fill me-2"></i> Has desbloqueado el contenido académico completo.
</div>
<?php else: ?>
<h3 class="text-white fw-bold mb-4 border-bottom border-primary pb-2" style="width: fit-content;">Bienvenida e Introducción</h3>
<div class="contenido-texto mb-5" style="line-height: 1.8;">
<p>Te damos la bienvenida al curso de <strong><?php echo htmlspecialchars($curso['titulo']); ?></strong>.</p>
<p>Este programa consta de 5 unidades diseñadas para una formación técnica sólida, culminando con una validación de conocimientos.</p>
<h5 class="text-primary mt-4">Metodología Académica:</h5>
<ul>
<li>Sesiones teóricas grabadas en alta definición.</li>
<li>Ejercicios prácticos descargables.</li>
<li>Prueba Académica Final para certificación.</li>
</ul>
</div>

<div class="mt-5 p-4 text-center" style="background: rgba(56, 189, 248, 0.1); border: 2px dashed #38bdf8; border-radius: 20px;">
<h4 class="text-white">Acceso al Contenido Completo</h4>
<p class="mb-4 text-white-50">Inscríbete para desbloquear las 5 unidades por <strong>$<?php echo number_format($curso['precio'], 2); ?></strong></p>
<a href="index.php?url=comprar-simulado&id=<?php echo $curso['id']; ?>"
class="btn btn-primary btn-lg px-5 fw-bold"
style="border-radius: 15px; background: #38bdf8; border: none; color: #0f172a;">
SIMULAR COMPRA (ACCESO INMEDIATO)
</a>
</div>
<?php endif; ?>
</div>
</div>

<div class="col-lg-4">
<div class="card border-0 shadow-lg text-white" style="background: rgba(15, 23, 42, 0.9); border-radius: 25px; position: sticky; top: 20px;">
<div class="card-header bg-transparent border-secondary p-4">
<h5 class="mb-0 fw-bold"><i class="bi bi-journal-bookmark me-2 text-primary"></i>Plan de Estudios</h5>
</div>
<div class="list-group list-group-flush p-3">
<?php if (!empty($modulos)): ?>
<?php foreach ($modulos as $index => $modulo):
$esExamen = ($index == 4); // Definimos la 5ta unidad como el examen
?>
<div class="list-group-item bg-transparent border-0 py-3 d-flex justify-content-between align-items-center <?php echo $estaInscrito ? 'text-white' : 'text-white-50'; ?>">
<span>
<?php if (!$estaInscrito): ?>
<i class="bi bi-lock-fill me-2 opacity-50"></i>
<?php elseif ($esExamen): ?>
<i class="bi bi-file-earmark-text-fill text-warning me-2"></i>
<?php else: ?>
<i class="bi bi-play-circle-fill text-primary me-2"></i>
<?php endif; ?>

<?php echo htmlspecialchars($modulo['titulo']); ?>
</span>

<?php if ($esExamen && $estaInscrito): ?>
<span class="badge rounded-pill bg-warning text-dark" style="font-size: 0.6rem;">EXAMEN</span>
<?php endif; ?>
</div>
<?php endforeach; ?>
<?php else: ?>
<div class="p-3 text-center text-white-50 small">Cargando unidades...</div>
<?php endif; ?>
</div>
</div>
</div>
</div>
</div>

<?php include '../app/views/servicios/layouts/footer.php'; ?>

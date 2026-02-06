<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Aula Virtual - <?php echo htmlspecialchars($curso['titulo']); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <style>
        body { background-color: #0f172a; color: white; font-family: sans-serif; }
        .glass-card { background: rgba(30, 41, 59, 0.8); border: 1px solid rgba(255,255,255,0.1); border-radius: 15px; }
        .modulo-item { cursor: pointer; transition: 0.2s; border-bottom: 1px solid rgba(255,255,255,0.05); }
        .modulo-item:hover { background: rgba(56, 189, 248, 0.1); color: #38bdf8; }
        .contenido-texto { background: rgba(15, 23, 42, 0.5); border-left: 4px solid #38bdf8; padding: 20px; border-radius: 8px; min-height: 150px; }
    </style>
</head>
<body>

<div class="container mt-4">
    <a href="index.php?url=cursos" class="btn btn-sm btn-outline-secondary mb-4">
        <i class="bi bi-arrow-left"></i> Volver a Cursos
    </a>

    <div class="row">
        <div class="col-md-8">
            <div class="glass-card p-4">
                <h2 class="text-info mb-3" id="titulo-modulo">Bienvenido: <?php echo htmlspecialchars($curso['titulo']); ?></h2>

                <div class="ratio ratio-16x9 mb-4">
                    <iframe id="video-leccion" src="https://www.youtube.com/embed/dQw4w9WgXcQ" allowfullscreen></iframe>
                </div>

                <div class="contenido-texto">
                    <h5 class="text-info">Información de la Unidad:</h5>
                    <p id="parrafo-info" class="lead">
                        Selecciona un módulo del temario a la derecha para cargar la información educativa.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="glass-card p-3">
                <h4 class="mb-3 border-bottom pb-2">Temario</h4>
                <div class="list-group list-group-flush">
                    <?php if (!empty($modulos)): ?>
                        <?php foreach ($modulos as $m): ?>
                            <div class="list-group-item modulo-item py-3"
                                 onclick="cambiarContenido('<?php echo htmlspecialchars($m['titulo']); ?>', '<?php echo addslashes($m['texto']); ?>', '<?php echo $m['video']; ?>')">
                                <i class="bi bi-book me-2"></i> <?php echo htmlspecialchars($m['titulo']); ?>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="text-muted p-3">No hay módulos disponibles.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
/**
 * Función que cambia el contenido central cuando haces clic
 */
function cambiarContenido(titulo, texto, video) {
    // 1. Cambiar el título
    document.getElementById('titulo-modulo').innerText = titulo;

    // 2. Cambiar el párrafo de información
    const areaTexto = document.getElementById('parrafo-info');
    if(texto.trim() === "") {
        areaTexto.innerHTML = "<span class='text-warning'><i>Esta unidad corresponde al examen final. No hay texto informativo adicional.</i></span>";
    } else {
        areaTexto.innerText = texto;
    }

    // 3. Cambiar el video (si tiene uno específico, si no, mantiene a Rick Astley)
    if(video && video !== "null" && video !== "") {
        document.getElementById('video-leccion').src = video;
    }
}
</script>

</body>
</html>

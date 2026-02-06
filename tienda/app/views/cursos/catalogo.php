<?php include '../app/views/servicios/layouts/header.php'; ?>

<div class="container py-5">
    <div class="mb-5 text-center">
        <h1 class="display-5 fw-bold text-white mb-0">Academia de Profesionales</h1>
        <p class="text-white-50">Explora nuestro catálogo técnico especializado</p>
    </div>

    <div class="d-flex gap-2 mb-4 justify-content-center justify-content-md-start">
        <a href="index.php?url=reporte-excel" class="btn btn-success d-flex align-items-center" style="border-radius: 12px; padding: 10px 20px;">
            <i class="bi bi-file-earmark-excel me-2"></i> Excel
        </a>
        <a href="index.php?url=reporte-pdf" class="btn btn-danger d-flex align-items-center" style="border-radius: 12px; padding: 10px 20px;">
            <i class="bi bi-file-earmark-pdf me-2"></i> PDF
        </a>
    </div>

    <div class="row">
        <?php foreach ($cursos as $curso): ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-lg card-hover" style="background: rgba(30, 41, 59, 0.7); border-radius: 20px; backdrop-filter: blur(10px); transition: 0.3s; overflow: hidden;">
                    
                    <div style="height: 180px; overflow: hidden; background: #0f172a;">
                        <?php
                        $file = "public/img/cursos/" . $curso['imagen'];
                        if (!empty($curso['imagen']) && file_exists($file)): ?>
                            <img src="<?php echo $file; ?>" alt="<?php echo htmlspecialchars($curso['titulo']); ?>" style="width: 100%; height: 100%; object-fit: contain; padding: 10px;">
                        <?php else: ?>
                            <div style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background: #1e293b;">
                                <i class="bi bi-image text-primary" style="font-size: 2.5rem; opacity: 0.5;"></i>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="card-body p-4 d-flex flex-column">
                        <div class="mb-2">
                            <span class="badge bg-dark text-info border border-info"><?php echo strtoupper($curso['categoria']); ?></span>
                        </div>
                        <h5 class="card-title text-info fw-bold mb-3"><?php echo htmlspecialchars($curso['titulo']); ?></h5>
                        
                        <p class="card-text text-white-50 small mb-4 flex-grow-1">
                            <?php echo htmlspecialchars($curso['descripcion']); ?>
                        </p>

                        <div class="mt-auto">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <span class="text-success fw-bold fs-4">
                                    <?php echo ($curso['precio'] > 0) ? '$' . number_format($curso['precio'], 2) : 'GRATIS'; ?>
                                </span>
                                <a href="index.php?url=ver-curso&id=<?php echo $curso['id']; ?>" class="btn btn-outline-info btn-sm px-3">Detalles</a>
                            </div>
                            
                            <?php if (isset($inscritos) && in_array($curso['id'], $inscritos)): ?>
                                <a href="index.php?url=ver-curso&id=<?php echo $curso['id']; ?>" class="btn btn-success w-100 fw-bold py-2" style="border-radius: 12px;">
                                    <i class="bi bi-play-circle me-2"></i> Ir al Curso
                                </a>
                            <?php else: ?>
                                <a href="index.php?url=comprar&id=<?php echo $curso['id']; ?>" class="btn btn-primary w-100 fw-bold py-2" style="border-radius: 12px; background: linear-gradient(135deg, #3b82f6, #2563eb); border: none;">
                                    <i class="bi bi-cart-plus me-2"></i> Inscribirme
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<style>
    .card-hover:hover { transform: translateY(-10px); border: 1px solid rgba(56, 189, 248, 0.5) !important; box-shadow: 0 15px 30px rgba(0,0,0,0.5) !important; }
    .text-info { color: #38bdf8 !important; }
    .text-success { color: #4ade80 !important; }
    .btn-primary:hover { filter: brightness(1.2); }
</style>

<?php include '../app/views/servicios/layouts/footer.php'; ?>
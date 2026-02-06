<?php include 'layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4 animate__animated animate__fadeInDown">
<div>
<h2 class="fw-bold text-white mb-0">
<i class="bi bi-stack text-info me-2"></i>Gestión de Servicios
</h2>
<p class="text-white-50 mb-0 small">Administra el catálogo de productos y servicios activos.</p>
</div>
<div class="d-flex align-items-center">
<div class="btn-group me-3">
<a href="index.php?url=reporte-pdf" class="btn btn-outline-danger btn-sm px-3 shadow-sm">
<i class="bi bi-file-earmark-pdf"></i> PDF
</a>
<a href="index.php?url=reporte-excel" class="btn btn-outline-success btn-sm px-3 shadow-sm">
<i class="bi bi-file-earmark-excel"></i> EXCEL
</a>
</div>

<a href="index.php?url=crear" class="btn btn-primary shadow-lg fw-bold px-4" style="background: linear-gradient(45deg, #059669, #10b981); border: none; border-radius: 10px;">
<i class="bi bi-plus-lg me-1"></i> NUEVO SERVICIO
</a>
</div>
</div>

<div class="card border-0 shadow-lg" style="background: rgba(255, 255, 255, 0.9); backdrop-filter: blur(10px); border-radius: 20px; overflow: hidden;">
<div class="card-body p-0">
<div class="table-responsive">
<table class="table table-hover mb-0">
<thead style="background: #1e293b;">
<tr class="text-info">
<th class="ps-4 py-3 text-uppercase small text-black" style="letter-spacing: 1px;">ID</th>
<th class="py-3 text-uppercase small text-black" style="letter-spacing: 1px;">Nombre</th>
<th class="py-3 text-uppercase small text-black" style="letter-spacing: 1px;">Descripción</th>
<th class="py-3 text-uppercase small text-black" style="letter-spacing: 1px;">Precio</th>
<th class="text-center py-3 text-uppercase small text-black" style="letter-spacing: 1px;">Acciones</th>
</tr>
</thead>
<tbody>
<?php if (!empty($servicios)): ?>
<?php foreach ($servicios as $s): ?>
<tr class="align-middle border-bottom">
<td class="ps-4 text-dark fw-bold">#<?php echo $s['id']; ?></td>
<td class="text-dark fw-bold"><?php echo $s['nombre']; ?></td>
<td class="text-dark" style="max-width: 300px;"><?php echo $s['descripcion']; ?></td>
<td class="text-dark fw-bold">
$<?php echo number_format($s['precio'], 2); ?>
</td>
<td class="text-center">
<div class="btn-group">
<a href="index.php?url=editar&id=<?php echo $s['id']; ?>" class="btn btn-warning btn-sm" title="Editar">
<i class="bi bi-pencil-square"></i>
</a>
<a href="index.php?url=eliminar&id=<?php echo $s['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('¿Estás seguro?')">
<i class="bi bi-trash3-fill"></i>
</a>
</div>
</td>
</tr>
<?php endforeach; ?>
<?php else: ?>
<tr>
<td colspan="5" class="text-center py-5 text-dark">
<i class="bi bi-inbox d-block mb-2" style="font-size: 3rem;"></i>
No hay servicios registrados.
</td>
</tr>
<?php endif; ?>
</tbody>
</table>
</div>
</div>
</div>

<style>
/* Efecto para que al pasar el mouse se note la fila pero el texto siga negro */
.table tbody tr:hover {
    background-color: rgba(56, 189, 248, 0.1) !important;
}
/* Forzamos el color negro en los datos de la tabla */
.table td {
    color: #000000 !important;
}
</style>

<?php include 'layouts/footer.php'; ?>

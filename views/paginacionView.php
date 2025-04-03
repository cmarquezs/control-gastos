
<nav>
    <ul class="pagination justify-content-center">
        <li class="page-item <?= ($paginaActual <= 1) ? 'disabled' : '' ?>">
            <a class="page-link" href="?pagina=<?= $paginaActual - 1 ?>">Anterior</a>
        </li>

        <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>
            <li class="page-item <?= ($paginaActual == $i) ? 'active' : '' ?>">
                <a class="page-link" href="?pagina=<?= $i ?>"><?= $i ?></a>
            </li>
        <?php endfor; ?>

        <li class="page-item <?= ($paginaActual >= $totalPaginas) ? 'disabled' : '' ?>">
            <a class="page-link" href="?pagina=<?= $paginaActual + 1 ?>">Siguiente</a>
        </li>
    </ul>
</nav>
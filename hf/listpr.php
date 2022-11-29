<div class="col-xs-12 col-md-6 col-lg-4 mt-4">
    <div class="block-4 text-center border shadow p-3 mb-5 bg-white rounded" style="height: 22.5rem;">
        <figure class="block-4-image">
            <a href="/Tienda/sesion/producto.php? id=<?php echo $fila['id_producto']; ?>">
                <img src="/Tienda/archivos/img_productos/<?php echo $fila['imagen_producto']; ?>"
                    alt="image placheholder" width="160px" class="img-fluid mt-1"></a>
        </figure>
        <div class="block-4-text p-4 heigth-15">
            <h6><a href="/Tienda/sesion/producto.php ? id=<?php echo $fila['id_producto']; ?>" class="text-wrap">
                    <?php echo $fila['nombre_producto']; ?>
                </a></h6>
            <p class="mb-0">
                <?php echo $fila['desc_producto']; ?>
            </p>
            <p class="text-primary font-weigth-bold text-wrap">Q
                <?php echo $fila['precio_producto']; ?>
            </p>
        </div>
    </div>
</div>
<?php
include_once "db/conexion.php";
?>
<!-- El recuadro del formulario (Ventana Modal) -->
<dialog id="miModal" class="mimodal">
    <div class="modal__content">
        <form method="dialog" class="modal__form">
            <h3 class="modal__title">Nuevo producto <i class="fa-regular fa-square-plus"></i></h3>

            <div class="form__group">
                <label class="form__label" for="nombre">Nombre del producto:</label>
                <input class="form__input" type="text" id="nombre" name="nombre" required placeholder="Nombre del producto">
            </div>

            <div class="form__group">
                <label class="form__label" for="correo">Descripción del producto:</label>
                <input class="form__input" type="text" id="descripcion" name="Descripcion" required placeholder="Descripción del producto">
            </div>

            <div class="form__group">
                <label class="form__label" for="nombre">Categoria del producto:</label>
                <select class="form__input" id="categoria" name="categoria" required>
                    <?php
                    $categorias = $pdo->query("SELECT * FROM categorias");
                    while ($categoria = $categorias->fetch(pdo::FETCH_ASSOC)) {
                        echo '<option value="' . $categoria['id'] . '">' . $categoria['nombre'] . '</option>';
                    }
                    ?>
                </select>
            </div>

            <div class="form__group select__busqueda">
                <label class="form__label" for="nombre">Marca del producto:</label>
                <input class="form__input select__input" type="text" id="buscador-marca" required placeholder="Marca del producto" autocomplete="off">
                <input class="select__value" type="hidden" id="id_producto" name="id_producto">
                <ul id="lista-elementos" class="select__opciones">
                    <?php
                    $categorias = $pdo->query("SELECT * FROM marcas");
                    while ($marca = $categorias->fetch(pdo::FETCH_ASSOC)) :
                    ?>
                        <li data-id="<?= $marca['id'] ?>"><?= htmlspecialchars($marca['nombre']); ?></li>
                    <?php
                    endwhile;
                    ?>
                </ul>
            </div>

            <div class="botones__form">
                <!-- Un botón con value="cancel" cierra el diálogo automáticamente sin enviar -->
                <button class="btn-cancel" type="button" id="btnCancelar">Cancelar</button>
                <button class="btn-guardar" type="submit">Guardar</button>
            </div>
        </form>
    </div>
</dialog>
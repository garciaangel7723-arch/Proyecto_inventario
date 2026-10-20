<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="icon" href="./img/logo2.png" type="image/png">
</head>

<body>
    <?php
    include_once 'componentes_php/header.php';
    ?>
    <main class="container-fluid dashboard">
        <div class="dashboard__layout">
            <!--columna #1 de inventario-->
            <div>
                <h4 class="dashboard__title">📦Inventario</h4>
                <div class="dashboard__cards">
                    <!--primera tarjeta-->
                    <div class="card card--dashboard">
                        <div class="card__body">
                            <div class="card__header">
                                <div class="card__icon">
                                    <i class="fa-solid fa-truck-moving"></i>
                                </div>
                                <h5 class="card__title mb-0">Productos</h5>
                            </div>
                            <ul class="list-group list-group" id="lista-elementos">

                            </ul>
                            <button id="btn-cargar">Cargar más (30)</button>
                        </div>
                    </div>
                </div>
            </div>

            <!--columna #2 de inventario-->
            <div>
                <h4 class="dashboard__title">⚙️Opciones</h4>
                <div class="dashboard__cards">
                    <!--segunda tarjeta-->
                    <div class="card card--dashboard">
                        <div class="card__body">
                            <div class="card__header">
                                <div class="card__icon">
                                    <i class="fa-solid fa-square-plus"></i>
                                </div>
                                <button id="btn-crear-producto" class="card__title mb-0 btn--primary">Crear producto</button>
                            </div>
                            <div class="card__header">
                                <div class="card__icon">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </div>
                                <h5 class="card__title mb-0">Editar producto</h5>
                            </div>
                            <div class="card__header">
                                <div class="card__icon">
                                    <i class="fa-solid fa-trash"></i>
                                </div>
                                <h5 class="card__title mb-0">Eliminar producto</h5>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
    </main>

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

                <div class="botones__form">
                    <!-- Un botón con value="cancel" cierra el diálogo automáticamente sin enviar -->
                    <button class="btn-cancel" type="button" id="btnCancelar">Cancelar</button>
                    <button class="btn-guardar" type="submit">Guardar</button>
                </div>
            </form>
        </div>
    </dialog>

    <!-- Cargar Chart.js desde tu carpeta local -->
    <script src="js/chart.min.js"></script>
    <!-- Cargar el Plugin de porcentajes desde tu carpeta local -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
    <script src="js/inventario.js"></script>
</body>

</html>
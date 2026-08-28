<?php
include_once 'db/conexion.php';
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
    <!-- dashboard todo el cuerpo del index va aqui -->
    <main class="container-fluid dashboard">

        <!-- CONTENEDOR PRINCIPAL EN GRID: Divide la pantalla en 2 secciones -->
        <div class="dashboard__layout">

            <!-- COLUMNA 1:tarjetas (organizadas en sus propias filas o en sub-grid) -->
            <div>
                <h4 class="dashboard__title">📊 Dashboard</h4>
                <div class="dashboard__cards">
                    <!-- Tarjeta 1: Ventas -->
                    <div class="card card--dashboard">
                        <div class="card__body">
                            <div class="card__header">
                                <div class="card__icon">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                                <h5 class="card__title mb-0">Ventas</h5>
                            </div>
                            <p class="card__text">Total de ventas registradas en el sistema.</p>
                            <h3 class="card__value">$0.00</h3>
                        </div>
                    </div>

                    <!-- Tarjeta 2: Ventas Mes -->
                    <div class="card card--dashboard card--success">
                        <div class="card__body">
                            <div class="card__header">
                                <div class="card__icon card__icon--success">
                                    <i class="fas fa-calendar-alt"></i>
                                </div>
                                <h5 class="card__title mb-0">Ventas Mes</h5>
                            </div>
                            <p class="card__text">Ventas del mes actual.</p>
                            <h3 class="card__value">$0.00</h3>
                        </div>
                    </div>

                    <!-- Tarjeta 3: Inventario Bajo -->
                    <div class="card card--dashboard card--warning">
                        <div class="card__body">
                            <div class="card__header">
                                <div class="card__icon card__icon--warning">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <h5 class="card__title mb-0">Inventario Bajo</h5>
                            </div>
                            <p class="card__text">Productos con inventario bajo o agotado.</p>
                            <h3 class="card__value">0 productos</h3>
                        </div>
                    </div>
                    <!-- Tarjeta 6: Recordatorio a Clientes -->
                    <div class="card card--dashboard card--info">
                        <div class="card__body">
                            <div class="card__header">
                                <div class="card__icon card__icon--info">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <h5 class="card__title mb-0">Recordatorio a clientes</h5>
                            </div>
                            <p class="card__text">Productos con inventario bajo o agotado.</p>
                            <h3 class="card__value">0 productos</h3>
                        </div>
                    </div>
                    <!-- Tarjeta 4: Equipos en Servicio -->
                    <div class="card card--dashboard card--pending">
                        <div class="card__body">
                            <div class="card__header">
                                <div class="card__icon card__icon--pending">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <h5 class="card__title mb-0">Equipos en Servicio</h5>
                            </div>
                            <p class="card__text">Productos con inventario bajo o agotado.</p>
                            <h3 class="card__value">0 productos</h3>
                        </div>
                    </div>
                    <!-- Tarjeta 5: Equipos en espera -->
                    <div class="card card--dashboard card--waiting">
                        <div class="card__body">
                            <div class="card__header">
                                <div class="card__icon card__icon--waiting">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </div>
                                <h5 class="card__title mb-0">Equipos en espera</h5>
                            </div>
                            <p class="card__text">Productos con inventario bajo o agotado.</p>
                            <h3 class="card__value">0 productos</h3>
                        </div>
                    </div>

                </div>
            </div>

            <!-- COLUMNA 2: Panel lateral -->
            <div>
                <div class="card card--sidebar">
                    <div class="card__body">
                        <div class="card__header">
                            <div class="card__icon card__icon--sidebar">
                                <i class="fas fa-chart-line"></i>
                            </div>
                            <h5 class="card__title card__title--sidebar">Monitoreo de Inventario</h5>
                        </div>

                        <div class="monitoring__section">
                            <div class="monitoring__graph">
                                <canvas id="graficoinventario" class="monitoring__graph--canvas"></canvas>
                            </div>
                            <!--
                            <label class="monitoring__label">Nivel 1</label>
                            <div class="monitoring__progress" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="--progress-value: 55%">
                                <div class="monitoring__bar" name="level-1"></div>
                            </div>

                            <label class="monitoring__label">Nivel 2</label>
                            <div class="monitoring__progress" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="--progress-value: 85%">
                                <div class="monitoring__bar" name="level-2"></div>
                            </div>

                            <label class="monitoring__label">Nivel 3</label>
                            <div class="monitoring__progress" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="--progress-value: 25%">
                                <div class="monitoring__bar" name="level-3"></div>
                            </div>
-->
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </main>



    <!-- Cargar Chart.js desde tu carpeta local -->
    <script src="js/chart.min.js"></script>
    <!-- Cargar el Plugin de porcentajes desde tu carpeta local -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
</body>

</html>
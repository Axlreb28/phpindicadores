<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Datos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/formulario.css">
    <link rel="stylesheet" href="static/css/trubros.css">
    <script>
        function toggleSections() {
            const selectedValue = document.getElementById('dep').value;
            const sections = document.querySelectorAll('.deportivo-section');
            sections.forEach(section => {
                if (section.dataset.deportivo === selectedValue) {
                    section.style.display = 'block';
                } else {
                    section.style.display = 'none';
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('dep').addEventListener('change', toggleSections);
        });
    </script>
</head>
<body>
<?php if (isset($_SESSION['departamento'])): ?>
    <div class="container">
        <form class="miFormulario" action="">
            <div class="row">
                <div class="column">
                    <h2 class="title">Formulario de Datos</h2>
                    <div class="form-group">
                        <label for="dep">Seleccione Deportivo:</label>
                        <select id="dep" name="dep">
                            <option value="">Seleccione un deportivo</option>
                            <option value="dep1">Deportivo Villa Olímpica</option>
                            <option value="dep2">Deportivo Sánchez Taboada</option>
                            <option value="dep3">Alberca Parque Morelos</option>
                            <option value="dep4">Deportivo San Andrés Totoltepec</option>
                            <option value="dep5">Centro Acuático Ceforma</option>
                            <option value="dep6">Deportivo Vivanco</option>
                            <option value="dep7">Deportivo Solidaridad</option>
                        </select>
                    </div>
                    <!-- Sección para Deportivo Villa Olímpica -->
                    <div class="deportivo-section" data-deportivo="dep1" style="display: none;">
                        <h3>Deportivo Villa Olímpica</h3>
                        <div class="form-group">
                            <label for="villa-ingreso-mensual">Prospectiva de ingreso mensual:</label>
                            <input type="number" id="villa-ingreso-mensual" name="villa-ingreso-mensual">
                        </div>
                        <div class="form-group">
                            <label for="villa-meta-quincenal">Meta quincenal:</label>
                            <input type="number" id="villa-meta-quincenal" name="villa-meta-quincenal">
                        </div>
                        <div class="form-group">
                            <label for="villa-reporte">Reporte:</label>
                            <input type="number" id="villa-reporte" name="villa-reporte">
                        </div>
                        <div class="form-group">
                            <label for="villa-alcance-quincenal">Alcance quincenal (%):</label>
                            <input type="number" id="villa-alcance-quincenal" name="villa-alcance-quincenal">
                        </div>
                        <div class="form-group">
                            <label for="villa-alcance-mensual">Alcance mensual (%):</label>
                            <input type="number" id="villa-alcance-mensual" name="villa-alcance-mensual">
                        </div>
                    </div>

                    <!-- Sección para Deportivo Sánchez Taboada -->
                    <div class="deportivo-section" data-deportivo="dep2" style="display: none;">
                        <h3>Deportivo Sánchez Taboada</h3>
                        <div class="form-group">
                            <label for="taboada-ingreso-mensual">Prospectiva de ingreso mensual:</label>
                            <input type="number" id="taboada-ingreso-mensual" name="taboada-ingreso-mensual">
                        </div>
                        <div class="form-group">
                            <label for="taboada-meta-quincenal">Meta quincenal:</label>
                            <input type="number" id="taboada-meta-quincenal" name="taboada-meta-quincenal">
                        </div>
                        <div class="form-group">
                            <label for="taboada-reporte">Reporte:</label>
                            <input type="number" id="taboada-reporte" name="taboada-reporte">
                        </div>
                        <div class="form-group">
                            <label for="taboada-alcance-quincenal">Alcance quincenal (%):</label>
                            <input type="number" id="taboada-alcance-quincenal" name="taboada-alcance-quincenal">
                        </div>
                        <div class="form-group">
                            <label for="taboada-alcance-mensual">Alcance mensual (%):</label>
                            <input type="number" id="taboada-alcance-mensual" name="taboada-alcance-mensual">
                        </div>
                    </div>

                    <!-- Sección para Alberca Parque Morelos -->
                    <div class="deportivo-section" data-deportivo="dep3" style="display: none;">
                        <h3>Alberca Parque Morelos</h3>
                        <div class="form-group">
                            <label for="morelos-ingreso-mensual">Prospectiva de ingreso mensual:</label>
                            <input type="number" id="morelos-ingreso-mensual" name="morelos-ingreso-mensual">
                        </div>
                        <div class="form-group">
                            <label for="morelos-meta-quincenal">Meta quincenal:</label>
                            <input type="number" id="morelos-meta-quincenal" name="morelos-meta-quincenal">
                        </div>
                        <div class="form-group">
                            <label for="morelos-reporte">Reporte:</label>
                            <input type="number" id="morelos-reporte" name="morelos-reporte">
                        </div>
                        <div class="form-group">
                            <label for="morelos-alcance-quincenal">% de alcance quincenal:</label>
                            <input type="number" id="morelos-alcance-quincenal" name="morelos-alcance-quincenal">
                        </div>
                        <div class="form-group">
                            <label for="morelos-alcance-mensual">% de alcance mensual:</label>
                            <input type="number" id="morelos-alcance-mensual" name="morelos-alcance-mensual">
                        </div>
                    </div>

                    <!-- Sección para Deportivo San Andrés Totoltepec -->
                    <div class="deportivo-section" data-deportivo="dep4" style="display: none;">
                        <h3>Deportivo San Andrés Totoltepec</h3>
                        <div class="form-group">
                            <label for="totoltepec-ingreso-mensual">Prospectiva de ingreso mensual:</label>
                            <input type="number" id="totoltepec-ingreso-mensual" name="totoltepec-ingreso-mensual">
                        </div>
                        <div class="form-group">
                            <label for="totoltepec-meta-quincenal">Meta quincenal:</label>
                            <input type="number" id="totoltepec-meta-quincenal" name="totoltepec-meta-quincenal">
                        </div>
                        <div class="form-group">
                            <label for="totoltepec-reporte">Reporte:</label>
                            <input type="number" id="totoltepec-reporte" name="totoltepec-reporte">
                        </div>
                        <div class="form-group">
                            <label for="totoltepec-alcance-quincenal">% de alcance quincenal:</label>
                            <input type="number" id="totoltepec-alcance-quincenal" name="totoltepec-alcance-quincenal">
                        </div>
                        <div class="form-group">
                            <label for="totoltepec-alcance-mensual">% de alcance mensual:</label>
                            <input type="number" id="totoltepec-alcance-mensual" name="totoltepec-alcance-mensual">
                        </div>
                    </div>
                    <!-- Sección para Centro Acuático Ceforma -->
                    <div class="deportivo-section" data-deportivo="dep5" style="display: none;">
                        <h3>Centro Acuático Ceforma</h3>
                        <div class="form-group">
                            <label for="ceforma-ingreso-mensual">Prospectiva de ingreso mensual:</label>
                            <input type="number" id="ceforma-ingreso-mensual" name="ceforma-ingreso-mensual">
                        </div>
                        <div class="form-group">
                            <label for="ceforma-meta-quincenal">Meta quincenal:</label>
                            <input type="number" id="ceforma-meta-quincenal" name="ceforma-meta-quincenal">
                        </div>
                        <div class="form-group">
                            <label for="ceforma-reporte">Reporte:</label>
                            <input type="number" id="ceforma-reporte" name="ceforma-reporte">
                        </div>
                        <div class="form-group">
                            <label for="ceforma-alcance-quincenal">Alcance quincenal (%):</label>
                            <input type="number" id="ceforma-alcance-quincenal" name="ceforma-alcance-quincenal">
                        </div>
                        <div class="form-group">
                            <label for="ceforma-alcance-mensual">Alcance mensual (%):</label>
                            <input type="number" id="ceforma-alcance-mensual" name="ceforma-alcance-mensual">
                        </div>
                    </div>

                    <!-- Sección para Deportivo Vivanco -->
                    <div class="deportivo-section" data-deportivo="dep6" style="display: none;">
                        <h3>Deportivo Vivanco</h3>
                        <div class="form-group">
                            <label for="vivanco-ingreso-mensual">Prospectiva de ingreso mensual:</label>
                            <input type="number" id="vivanco-ingreso-mensual" name="vivanco-ingreso-mensual">
                        </div>
                        <div class="form-group">
                            <label for="vivanco-meta-quincenal">Meta quincenal:</label>
                            <input type="number" id="vivanco-meta-quincenal" name="vivanco-meta-quincenal">
                        </div>
                        <div class="form-group">
                            <label for="vivanco-reporte">Reporte:</label>
                            <input type="number" id="vivanco-reporte" name="vivanco-reporte">
                        </div>
                        <div class="form-group">
                            <label for="vivanco-alcance-quincenal">Alcance quincenal (%):</label>
                            <input type="number" id="vivanco-alcance-quincenal" name="vivanco-alcance-quincenal">
                        </div>
                        <div class="form-group">
                            <label for="vivanco-alcance-mensual">Alcance mensual (%):</label>
                            <input type="number" id="vivanco-alcance-mensual" name="vivanco-alcance-mensual">
                        </div>
                    </div>

                    <!-- Sección para Deportivo Solidaridad -->
                    <div class="deportivo-section" data-deportivo="dep7" style="display: none;">
                        <h3>Deportivo Solidaridad</h3>
                        <div class="form-group">
                            <label for="solidaridad-ingreso-mensual">Prospectiva de ingreso mensual:</label>
                            <input type="number" id="solidaridad-ingreso-mensual" name="solidaridad-ingreso-mensual">
                        </div>
                        <div class="form-group">
                            <label for="solidaridad-meta-quincenal">Meta quincenal:</label>
                            <input type="number" id="solidaridad-meta-quincenal" name="solidaridad-meta-quincenal">
                        </div>
                        <div class="form-group">
                            <label for="solidaridad-reporte">Reporte:</label>
                            <input type="number" id="solidaridad-reporte" name="solidaridad-reporte">
                        </div>
                        <div class="form-group">
                            <label for="solidaridad-alcance-quincenal">Alcance quincenal (%):</label>
                            <input type="number" id="solidaridad-alcance-quincenal" name="solidaridad-alcance-quincenal">
                        </div>
                        <div class="form-group">
                            <label for="solidaridad-alcance-mensual">Alcance mensual (%):</label>
                            <input type="number" id="solidaridad-alcance-mensual" name="solidaridad-alcance-mensual">
                        </div>
                    </div>

                    <button type="submit" class="btn">Enviar</button>
                    <input type="button" value="Página anterior" onClick="history.go(-1);" class="btn2">
                </div>
            </div>
        </form>
    </div>
</body>
<?php else : ?>
<p>Por favor inicie sesión primero.</p>
<?php endif; ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

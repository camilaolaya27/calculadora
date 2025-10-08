<?php
$media = null;
$desviacion = null;

if (isset($_POST['numeros'])) {
    // Capturar y limpiar la entrada
    $entrada = trim($_POST['numeros']);
    
    if (!empty($entrada)) {
        // Convertir a array de números
        $numeros = array_map('floatval', explode(',', $entrada));
        
        if (count($numeros) > 0) {
            // Calcular media
            $media = array_sum($numeros) / count($numeros);

            // Calcular desviación estándar
            $suma_cuadrados = 0;
            foreach ($numeros as $num) {
                $suma_cuadrados += pow($num - $media, 2);
            }
            $desviacion = sqrt($suma_cuadrados / count($numeros));
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin-top: 50px; }
        .container { width: 400px; margin: auto; padding: 20px; border: 1px solid #ccc; border-radius: 10px; }
        a { display: inline-block; margin-top: 15px; text-decoration: none; background: #007BFF; color: white; padding: 8px 15px; border-radius: 5px; }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2><i class="fas fa-chart-line"></i> Resultados</h2>
        <?php if ($media !== null && $desviacion !== null): ?>
            <p><strong>Media aritmética:</strong> <?php echo round($media, 2); ?></p>
            <p><strong>Desviación estándar:</strong> <?php echo round($desviacion, 2); ?></p>
        <?php else: ?>
            <p style="color:red;">⚠ No se ingresaron datos válidos.</p>
        <?php endif; ?>
        <a href="index.html">Volver</a>
    </div>
</body>
</html>

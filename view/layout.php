<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=g, initial-scale=1.0">
    <link rel="stylesheet" href="webroot/css/estilos.css">
    <link rel="icon" type="image/x-icon" href="webroot/images/Favicon.ico">
    <title>Mantenimiento Tareas</title>
</head>
<body>
    <header>
        <h1><?php echo($_SESSION['CabeceraPaginaEnCurso']) ?></h1>
    </header>
    
    <?php require_once $view[$_SESSION['paginaEnCurso']]; ?>

    <footer>
        <p>Autor: Alex Asensio Sanchez</p>
    </footer>
</body>
</html>
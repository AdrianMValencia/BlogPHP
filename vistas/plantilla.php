<?php
$blog = ControladorBlog::ctrMostrarBlog();
$categorias = ControladorBlog::ctrMostrarCategorias();
$articulos = ControladorBlog::ctrMostrarConInnerJoin(0, 5, null, null);
$totalArticulos = ControladorBlog::ctrMostrarTotalArticulos(null, null);
$totalPaginas = ceil(count($totalArticulos) / 5);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    $validarRuta = '';
    if (isset($_GET['pagina'])) {
        $rutas = explode('/', $_GET['pagina']);
        foreach ($categorias as $key => $value) {
            if (!is_numeric($rutas[0]) && $rutas[0] == $value['ruta_categoria']) {
                $validarRuta = 'categorias';
                break;
            }
        }
        if (isset($rutas[1])) {
            foreach ($totalArticulos as $key => $value) {
                if (!is_numeric($rutas[1]) && $rutas[1] == $value['ruta_articulo']) {
                    $validarRuta = 'articulos';
                    break;
                }
            }
        }
        if ($validarRuta == 'categorias') {
            echo '<title>' . $blog['titulo'] . ' | ' . $value['descripcion_categoria'] . '</title>
    <meta name="title" content="' . $value['titulo_categoria'] . '">
    <meta name="description" content="' . $value['descripcion_categoria'] . '">';
            $palabras_claves = json_decode($value['p_claves_categoria'], true);
            $p_claves = '';
            foreach ($palabras_claves as $key => $value) {
                $p_claves .= $value . ', ';
            }
            $p_claves = substr($p_claves, 0, -2);
            echo '<meta name="keywords" content="' . $p_claves . '">';
        } else if ($validarRuta == 'articulos') {
            echo '<title>' . $blog['titulo'] . ' | ' . $value['titulo_articulo'] . '</title>
    <meta name="title" content="' . $value['titulo_articulo'] . '">
    <meta name="description" content="' . $value['descripcion_articulo'] . '">';
            $palabras_claves = json_decode($value['p_claves_articulo'], true);
            $p_claves = '';
            foreach ($palabras_claves as $key => $value) {
                $p_claves .= $value . ', ';
            }
            $p_claves = substr($p_claves, 0, -2);
            echo '<meta name="keywords" content="' . $p_claves . '">';
        } else {
            echo '<title>' . $blog['titulo'] . '</title>
    <meta name="title" content="' . $blog['titulo'] . '">
    <meta name="description" content="' . $blog['descripcion'] . '">';
            $palabras_claves = json_decode($blog['palabras_claves'], true);
            $p_claves = '';
            foreach ($palabras_claves as $key => $value) {
                $p_claves .= $value . ', ';
            }
            $p_claves = substr($p_claves, 0, -2);
            echo '<meta name="keywords" content="' . $p_claves . '">';
        }
    } else {
        echo '<title>' . $blog['titulo'] . '</title>
        <meta name="title" content="' . $blog['titulo'] . '">
        <meta name="description" content="' . $blog['descripcion'] . '">';
        $palabras_claves = json_decode($blog['palabras_claves'], true);
        $p_claves = '';
        foreach ($palabras_claves as $key => $value) {
            $p_claves .= $value . ', ';
        }
        $p_claves = substr($p_claves, 0, -2);
        echo '<meta name="keywords" content="' . $p_claves . '">';
    }
    ?>
    <link rel="icon" href="<?php echo $blog['dominio']; ?>vistas/img/icono.jpg">
    <!--=====================================
	PLUGINS DE CSS
	======================================-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Chewy|Open+Sans:300,400" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo $blog['dominio']; ?>vistas/css/plugins/jquery.jdSlider.css">
    <link rel="stylesheet" href="<?php echo $blog['dominio']; ?>vistas/css/style.css">
    <!--=====================================
	PLUGINS DE JS
	======================================-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="<?php echo $blog['dominio']; ?>vistas/js/plugins/jquery.jdSlider-latest.js"></script>
    <script src="<?php echo $blog['dominio']; ?>vistas/js/plugins/pagination.min.js"></script>
    <script src="<?php echo $blog['dominio']; ?>vistas/js/plugins/scrollUP.js"></script>
    <script src="<?php echo $blog['dominio']; ?>vistas/js/plugins/jquery.easing.js"></script>
</head>

<body>
    <?php
    /*=====================================
	MODULOS FIJOS SUPERIORES
	======================================*/
    include "paginas/modulos/cabecera.php";
    include "paginas/modulos/redes-sociales-movil.php";
    include "paginas/modulos/buscador-movil.php";
    include "paginas/modulos/menu.php";
    /*=====================================
	NAVEGAR ENTRE PAGINAS
    ======================================*/
    $validarRuta = '';
    if (isset($_GET['pagina'])) {
        $rutas = explode('/', $_GET['pagina']);
        if (is_numeric($rutas[0])) {
            $desde = ($rutas[0] - 1) * 5;
            $cantidad = 5;
            $articulos = ControladorBlog::ctrMostrarConInnerJoin($desde, $cantidad, null, null);
        } else {
            foreach ($categorias as $key => $value) {
                if ($rutas[0] == $value['ruta_categoria']) {
                    $validarRuta = 'categorias';
                    break;
                }
            }
        }
        /*=====================================
	INDICE 1: RUTAS DE ARTICULOS O PAGINACION DE CATEGORIAS
    ======================================*/
        if (isset($rutas[1])) {
            if (is_numeric($rutas[1])) {
                $desde = ($rutas[1] - 1) * 5;
                $cantidad = 5;
                $articulos = ControladorBlog::ctrMostrarConInnerJoin($desde, $cantidad, null, null);
            } else {
                foreach ($totalArticulos as $key => $value) {
                    if ($rutas[1] == $value['ruta_articulo']) {
                        $validarRuta = 'articulos';
                        break;
                    }
                }
            }
        }
        /*=====================================
	VALIDAR LAS RUTAS
    ======================================*/
        if ($validarRuta == 'categorias') {
            include "paginas/categorias.php";
        } else if ($validarRuta == 'articulos') {
            include "paginas/articulos.php";
        } else if (
            is_numeric($rutas[0]) && $rutas[0] <= $totalPaginas
        ) {
            include "paginas/inicio.php";
        } else if (isset($rutas[1]) && is_numeric($rutas[1])) {
            include "paginas/inicio.php";
        } else {
            include "paginas/404.php";
        }
    } else {
        include "paginas/inicio.php";
    }
    /*=====================================
	MODULOS FIJOS INFERIORES
	======================================*/
    include "paginas/modulos/footer.php";
    ?>
    <input type="hidden" id="rutaActual" value="<?php echo $blog['dominio']; ?>">
    <script src="<?php echo $blog['dominio']; ?>vistas/js/script.js"></script>
</body>

</html>
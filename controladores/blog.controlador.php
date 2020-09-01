<?php
class ControladorBlog
{
    /*=====================================
	MOSTRAR CONTENIDO TABLA BLOG
    ======================================*/
    static public function ctrMostrarBlog()
    {
        $tabla = "blog";
        $respuesta = ModeloBlog::mdlMostrarBlog($tabla);
        return $respuesta;
    }
    /*=====================================
	MOSTRAR CONTENIDO TABLA CATEGORIAS
    ======================================*/
    static public function ctrMostrarCategorias()
    {
        $tabla = "categorias";
        $respuesta = ModeloBlog::mdlMostrarCategorias($tabla);
        return $respuesta;
    }
    /*=====================================
	MOSTRAR ARTICULOS Y CATEGORIAS CON INNER JOIN
    ======================================*/
    static public function ctrMostrarConInnerJoin($desde, $cantidad, $item, $valor)
    {
        $tabla1 = 'categorias';
        $tabla2 = 'articulos';
        $respuesta = ModeloBlog::mdlMostrarConInnerJoin($tabla1, $tabla2, $desde, $cantidad, $item, $valor);
        return $respuesta;
    }
    /*=====================================
	MOSTRAR TOTAL DE ARTICULOS
    ======================================*/
    static public function ctrMostrarTotalArticulos($item, $valor)
    {
        $tabla = 'articulos';
        $respuesta = ModeloBlog::mdlMostrarTotalArticulos($tabla, $item, $valor);
        return $respuesta;
    }
}

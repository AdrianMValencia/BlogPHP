<?php
if (isset($rutas[1])) {
    $articulo = ControladorBlog::ctrMostrarConInnerJoin(0, 1, 'ruta_articulo', $rutas[1]);
}
?>
<!--=====================================
CONTENIDO ARTÍCULO
======================================-->
<div class="container-fluid bg-white contenidoInicio py-2 py-md-4">
    <div class="container">
        <!-- BREADCRUMB -->
        <a href="<?php echo $articulo[0]['ruta_categoria']; ?>">
            <button class="d-block d-sm-none btn btn-info btn-sm mb-2">
                REGRESAR
            </button>
        </a>
        <ul class="breadcrumb bg-white p-0 mb-2 mb-md-4 breadArticulo">
            <li class="breadcrumb-item inicio"><a href="<?php echo $blog['dominio']; ?>">Inicio</a></li>
            <li class="breadcrumb-item"><a href="<?php echo $blog['dominio'] . $articulo[0]['ruta_categoria']; ?>"><?php echo $articulo[0]['descripcion_categoria']; ?></a></li>
            <li class="breadcrumb-item active"><?php echo $articulo[0]['titulo_articulo']; ?></li>
        </ul>
        <div class="row">
            <!-- COLUMNA IZQUIERDA -->
            <div class="col-12 col-md-8 col-lg-9 p-0 pr-lg-5">
                <!-- ARTÍCULO 01 -->
                <div class="container">
                    <div class="d-flex">
                        <div class="fechaArticulo"><?php echo $articulo[0]['fecha_articulo']; ?></div>
                        <h3 class="tituloArticulo text-right text-muted pl-3 pt-lg-2"><?php echo $articulo[0]['titulo_articulo']; ?></h3>
                    </div>
                    <?php
                    echo $articulo[0]['contenido_articulo'];
                    ?>
                    <!-- COMPARTIR EN REDES -->
                    <div class="float-right my-3 btnCompartir">
                        <div class="btn-group text-secondary">
                            Si te gustó compártelo:
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn border-0 text-white" style="background: #1475E0">
                                <span class="fab fa-facebook pr-1"></span>
                                Facebook
                            </button>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn border-0 text-white" style="background: #00A6FF">
                                <span class="fab fa-twitter pr-1"></span>
                                Twitter
                            </button>
                        </div>
                    </div>
                    <!-- AVANZAR - RETROCEDER -->
                    <div class="clearfix"></div>
                    <!-- ETIQUETAS -->
                    <div>
                        <h4>Etiquetas</h4>
                        <?php
                        $tags = json_decode($articulos[0]['p_claves_articulo'], true);
                        ?>
                        <?php foreach ($tags as $key => $value) : ?>
                            <a href="#<?php echo $value; ?>" class="btn btn-secondary btn-sm m-1"><?php echo $value; ?></a>
                        <?php endforeach ?>
                    </div>
                    <div class="d-md-flex justify-content-between my-3 d-none">
                        <a href="articulos.html">Leer artículo anterior</a>
                        <a href="articulos.html">Leer artículo siguiente</a>
                    </div>
                    <!-- DESLIZADOR DE ARTÍCULOS -->
                    <section class="jd-slider deslizadorArticulos my-4">
                        <div class="slide-inner">
                            <ul class="slide-area">
                                <li class="px-3">
                                    <a href="articulos.html" class="text-secondary">
                                        <img src="<?php echo $blog['dominio']; ?>vistas/img/articulo01.png" alt="Lorem ipsum dolor sit amet" class="img-fluid">
                                        <h6 class="py-2">Type something here</h6>
                                    </a>
                                    <p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem quibusdam sint porro...</p>
                                </li>
                                <li class="px-3">
                                    <a href="articulos.html" class="text-secondary">
                                        <img src="<?php echo $blog['dominio']; ?>vistas/img/articulo02.png" alt="Lorem ipsum dolor sit amet" class="img-fluid">
                                        <h6 class="py-2">Type something here</h6>
                                    </a>
                                    <p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem quibusdam sint porro...</p>
                                </li>
                                <li class="px-3">
                                    <a href="articulos.html" class="text-secondary">
                                        <img src="<?php echo $blog['dominio']; ?>vistas/img/articulo03.png" alt="Lorem ipsum dolor sit amet" class="img-fluid">
                                        <h6 class="py-2">Type something here</h6>
                                    </a>
                                    <p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem quibusdam sint porro...</p>
                                </li>
                                <li class="px-3">
                                    <a href="articulos.html" class="text-secondary">
                                        <img src="<?php echo $blog['dominio']; ?>vistas/img/articulo04.png" alt="Lorem ipsum dolor sit amet" class="img-fluid">
                                        <h6 class="py-2">Type something here</h6>
                                    </a>
                                    <p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatem quibusdam sint porro...</p>
                                </li>
                            </ul>
                            <a class="prev" href="#">
                                <i class="fas fa-angle-left text-muted"></i>
                            </a>
                            <a class="next" href="#">
                                <i class="fas fa-angle-right text-muted"></i>
                            </a>
                        </div>
                        <div class="controller">
                            <div class="indicate-area"></div>
                        </div>
                    </section>
                    <!-- BLOQUE DE OPINIONES -->
                    <h3 style="color:#8e4876">Opiniones</h3>
                    <hr style="border: 1px solid #79FF39">
                    <div class="row opiniones">
                        <div class="col-3 col-sm-4 col-lg-2 p-2">
                            <img src="<?php echo $blog['dominio']; ?>vistas/img/user01.jpg" class="img-thumbnail">
                        </div>
                        <div class="col-9 col-sm-8 col-lg-10 p-2 text-muted">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto beatae,
                                aut sint provident dolorem minus recusandae facere, ipsum magnam, nostrum enim.
                                Error quasi quod ab consectetur explicabo consequuntur obcaecati suscipit!</p>
                            <span class="small float-right">Carla Gómez | 20.09.2018</span>
                        </div>
                        <div class="col-9 col-sm-8 col-lg-10 p-2 text-muted">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto beatae,
                                aut sint provident dolorem minus recusandae facere, ipsum magnam, nostrum enim.
                                Error quasi quod ab consectetur explicabo consequuntur obcaecati suscipit!</p>
                            <span class="small float-right">Juanito Travel | 20.09.2018</span>
                        </div>
                        <div class="col-3 col-sm-4 col-lg-2 p-2">
                            <img src="<?php echo $blog['dominio']; ?>vistas/img/user02.jpg" class="img-thumbnail">
                        </div>
                    </div>
                    <hr style="border: 1px solid #79FF39">
                    <!-- FORMULARIO DE OPINIONES -->
                    <form>
                        <label class="text-muted lead">¿Qué tal te pareció el artículo?</label>
                        <div class="row">
                            <div class="col-12 col-md-8 col-lg-9">
                                <div class="input-group-lg">
                                    <input type="text" class="form-control my-3" placeholder="Tu nombre">
                                    <input type="email" class="form-control my-3" placeholder="Tu email">
                                </div>
                            </div>
                            <div class="d-none d-md-block col-md-4 col-lg-3">
                                <img src="<?php echo $blog['dominio']; ?>vistas/img/subirFoto.png" class="img-fluid mt-md-3 mt-xl-2">
                            </div>
                        </div>
                        <textarea class="form-control my-3" rows="7" placeholder="Escribe aquí tu mensaje"></textarea>
                        <input type="submit" class="btn btn-dark btn-lg btn-block" value="Enviar">
                    </form>
                    <!-- PUBLICIDAD -->
                    <img src="<?php echo $blog['dominio']; ?>vistas/img/ad01.jpg" class="img-fluid my-3 d-block d-md-none" width="100%">
                </div>
            </div>
            <!-- COLUMNA DERECHA -->
            <div class="d-none d-md-block pt-md-4 pt-lg-0 col-md-4 col-lg-3">
                <!-- ARTÍCULOS RECIENTES -->
                <div class="my-4">
                    <h4>Artículos Recientes</h4>
                    <div class="d-flex my-3">
                        <div class="w-100 w-xl-50 pr-3 pt-2">
                            <a href="articulos.html">
                                <img src="<?php echo $blog['dominio']; ?>vistas/img/articulo05.png" alt="Lorem ipsum dolor sit amet" class="img-fluid">
                            </a>
                        </div>
                        <div>
                            <a href="articulos.html" class="text-secondary">
                                <p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </a>
                        </div>
                    </div>
                    <div class="d-flex my-3">
                        <div class="w-100 w-xl-50 pr-3 pt-2">
                            <a href="articulos.html">
                                <img src="<?php echo $blog['dominio']; ?>vistas/img/articulo06.png" alt="Lorem ipsum dolor sit amet" class="img-fluid">
                            </a>
                        </div>
                        <div>
                            <a href="articulos.html" class="text-secondary">
                                <p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </a>
                        </div>
                    </div>
                    <div class="d-flex my-3">
                        <div class="w-100 w-xl-50 pr-3 pt-2">
                            <a href="articulos.html">
                                <img src="<?php echo $blog['dominio']; ?>vistas/img/articulo07.png" alt="Lorem ipsum dolor sit amet" class="img-fluid">
                            </a>
                        </div>
                        <div>
                            <a href="articulos.html" class="text-secondary">
                                <p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- PUBLICIDAD -->
                <div class="mb-4">
                    <img src="<?php echo $blog['dominio']; ?>vistas/img/ad03.png" class="img-fluid">
                </div>
                <div class="my-4">
                    <img src="<?php echo $blog['dominio']; ?>vistas/img/ad02.jpg" class="img-fluid">
                </div>
                <div class="my-4">
                    <img src="<?php echo $blog['dominio']; ?>vistas/img/ad06.png" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
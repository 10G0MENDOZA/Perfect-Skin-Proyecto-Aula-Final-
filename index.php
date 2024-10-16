<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Perfect-Skin</title>
    <link rel="stylesheet" href="css/styles.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="img/LOGO.jpeg">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">


</head>

<body>

    <header id="header">
        <nav class="navbar-one flex">
            <div class="left flex">
                <div class="email">
                    <i class="fa fa-envelope"></i>
                    <span>skingperfect@gmail.com</span>
                </div>
                <div class="call">
                    <i class="fa fa-phone-alt mr-2"></i>
                    <span>+57  3176209590</span>
                </div>
            </div>

            <div class="right flex">
                <div class="facebook">
                    <a href="https://www.facebook.com/profile.php?id=100064134480986&mibextid=ZbWKwL" target="_blank">
                        <i class="fab fa-facebook"></i>
                    </a>
                </div>

                <div class="instagram">
                    <a href="https://www.instagram.com/perfectskin_ctg/" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>

                <div class="whatsapp">
                    <a href="https://wa.me/+573005615455" target="_blank">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                </div>

                <!-- Carrito de compras dentro del header -->
                <div class="carrito">
                    <a href="#" class="carrito-link">
                    
                    </a>
                </div>
            </div>
        </nav>

        <nav class="navbar-second flex">
            <div class="logo">
                <img class="logonav" src="img/1-2.png" width="200" alt="Logo de la página web">
            </div>
            <ul class="flex menu">
                <li><a href="#header">Inicio</a></li>
                <li><a href="#productos">Servicios</a></li>
                <li><a href="#container">Acerca Nosotros</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="#servicios">Productos</a></li>

            </ul>
        </nav>

        <div class="video-wrapper">
            <video autoplay muted loop>
                <source src="video/5534664-uhd_2160_3840_30fps.mp4" type="video/mp4">
            </video>
            <div class="capa"></div>
        </div>
        <div id="subscriptionModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <img src="img/registrar.jpg" class="background-image">
                <div class="text-content">
                    <h2>SUSCRÍBETE</h2>
                    <p> para contendido exsclusivo y ofertas</p>

                    <form class="subscription-form" action="procesar_suscripcion.php" method="POST">
                        <input type="email" name="email" placeholder="email" class="form-control" required>
                        <button type="submit">SUSCRÍBETE</button>
                    </form>

                </div>

            </div>
        </div>
    </header>



    <div class="ungle">
        <span class="ir"><i class="arriba fa-solid fa-angles-up" aria-hidden="true"></i></span>
    </div>
  


    <div class="music-button">
        <button id="playPauseBtn">
            <span id="icon">&#9654;</span>
        </button>
        <audio id="backgroundMusic" autoplay>
            <source src="music/musicadefondo.mp3" type="audio/mpeg">
         
        </audio>
    </div>

 



    <div class="header-nosotros">
        <h1>Nosotros</h1>
        
      </div>
  

    <div id="container" class="container">
   

        <div class="slide">


            <div class="item" style="background-image: url(img/acercanostros1.jpg);">
                <div class="content">
                    <div class="name">Visión</div>
                    <div class="des">Nos visualizamos como líderes en belleza estética, reconocidos por nuestra
                        excelencia en el servicio,
                        innovación en tratamientos y compromiso con la satisfacción del cliente.
                        Nuestro objetivo es no solo embellecer, sino también inspirar a nuestros clientes a sentirse
                        seguros y empoderados en su piel.
                        Aspiramos a crear experiencias transformadoras que superen las expectativas y perduren en la
                        memoria de quienes nos eligen.</div>

                </div>
            </div>
            <div class="item" style="background-image: url(img/acercanosotros2.jpg);">
                <div class="content">
                    <div class="name">Quienes Somos</div>
                    <div class="des">Somos una empresa líder en tecnología avanzada de rejuvenecimiento facial y
                        moldeado corporal,
                        dedicada a ofrecer tratamientos innovadores que mejoran la apariencia y el bienestar de nuestros
                        clientes. </div>

                </div>
            </div>
            <div class="item" style="background-image: url(img/acercanotros3.jpg);">
                <div class="content">
                    <div class="name">Misión</div>
                    <div class="des">En Laura Nuñez - Perfectskin, nos dedicamos a realzar la belleza interior y
                        exterior de cada individuo.
                        Ofrecemos servicios de belleza excepcionales y personalizados que transforman la apariencia y
                        promueven la confianza y el bienestar.
                        Creemos en crear un ambiente acogedor donde nuestros clientes se sientan cuidados y valorados en
                        cada visita.</div>

                </div>
            </div>



        </div>
        <div class="button">
            <button class="prev"><i class="fa-solid fa-arrow-left"></i></button>
            <button class="next"><i class="fa-solid fa-arrow-right"></i></button>
        </div>
 </div>

        


             <div id="productos" class="productos-section">
                    <div class="header-servicios">
                     <h2>Servicios</h2>
                    </div>   
                 <div class="swiper mySwiper">
                     <div class="swiper-wrapper">

                           <!-- Producto 1 -->
                          <div class="swiper-slide">
                            <div class="producto">
                                <div class="producto-imagen">
                                    <img src="img/facialclasico.jpg" alt="Producto 1">
                                </div>
                                <div class="producto-descripcion">
                                    <h3>Facial Clásico</h3>
                                    <p>Nuestro facial clásico es un tratamiento tradicional que combina técnicas de
                                        limpieza, exfoliación e
                                        hidratación para dejar tu piel suave, luminosa y rejuvenecida.</p>

                                    <a href="servicios.php" class="btn">ver más</a>
                                </div>
                            </div>
                         </div>

                         <!-- Producto 2 -->
                         <div class="swiper-slide">
                            <div class="producto">
                                <div class="producto-imagen">
                                    <img src="img/diamante.jpg" alt="Producto 2">
                                </div>
                                <div class="producto-descripcion">
                                    <h3>Facial Diamante</h3>
                                    <p>El facial Diamante es un tratamiento avanzado de microdermoabrasión que exfolia y
                                        suaviza la piel,
                                        mejorando su textura y tono.</p>

                                    <a href="servicios.php" class="btn">ver más</a>
                                    </a>
                                </div>
                            </div>
                         </div>

                         <!-- Producto 3 -->
                         <div class="swiper-slide">
                            <div class="producto">
                                <div class="producto-imagen">
                                    <img src="img/luminous.jpg" alt="Producto 3">
                                </div>
                                <div class="producto-descripcion">
                                    <h3>Luminous Face</h3>
                                    <p>Incluye exfoliación, vapor de ozono, extracción de comedones, alta frecuencia y
                                        microneedling con
                                        suero vitamínico.</p>

                                    <a href="servicios.php" class="btn">ver más</a>
                                </div>
                            </div>
                         </div>

                         <!-- Producto 4 -->
                         <div class="swiper-slide">
                            <div class="producto">
                                <div class="producto-imagen">
                                    <img src="img/Dermaplaning-Facial.jpg" alt="Producto 4">
                                </div>
                                <div class="producto-descripcion">
                                    <h3>Dermaplaning</h3>
                                    <p>Exfoliación con cuchilla estéril para remover células muertas y suavizar la piel.
                                    </p>

                                    <a href="servicios.php" class="btn">ver más</a>
                                </div>
                            </div>
                          </div>

                          <!-- Producto 5 -->
                          <div class="swiper-slide">
                            <div class="producto">
                                <div class="producto-imagen">
                                    <img src="img/hidralips.webp" alt="Producto 5">
                                </div>
                                <div class="producto-descripcion">
                                    <h3>Hidralips</h3>
                                    <p>Hidratación intensiva diseñada para dejar los labios suaves, sedosos y radiantes.
                                    </p>

                                    <a href="servicios.php" class="btn">ver más</a>
                                </div>
                            </div>
                          </div>

                          <div class="swiper-slide">
                            <div class="producto">
                                <div class="producto-imagen">
                                    <img src="img/masaje.jpg" alt="Producto ">
                                </div>
                                <div class="producto-descripcion">
                                    <h3>Masaje relajante</h3>
                                    <p>Desconecta de la tension y el estres con nuestro masaje relajante. Nuestros expertos terapeutas utilizan tecnicas suaves y precisas para aliviar la rigidez muscular y calmar la mente
                                    </p>

                                    <a href="servicios.php" class="btn">ver más</a>
                                </div>
                            </div>
                          </div>
                         </div>

                          <!-- Controles de navegación para productos -->
                          <div class="swiper-button-next"></div>
                          <div class="swiper-button-prev"></div>
                     </div>
             </div>


             <div id="servicios" class="servicios-section">
                        <div class="header-productos">
                         <h2>Productos</h2>
                      </div>  
                    <div class="swiper mySwiperServicios">
                        <div class="swiper-wrapper">

                            <!-- Servicio 1 -->
                            <div class="swiper-slide">
                                <div class="servicio">
                                    <div class="servicio-imagen">
                                        <img src="img/protectorsolar.jpg" alt="Servicio 1">
                                    </div>
                                    <div class="servicio-descripcion">
                                        <h3>Protector Solar</h3>
                                        <p>Relájate y protege tu piel con nuestro servicio de protector solar
                                            personalizado.</p>
                                        <span class="precio-servicio">$41.500 COP</span>
                                        <a href="producto.php" class="btn-servicio">ver más</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Servicio 2 -->
                            <div class="swiper-slide">
                                <div class="servicio">
                                    <div class="servicio-imagen">
                                        <img src="img/antiarrugas.png" alt="Servicio 2">
                                    </div>
                                    <div class="servicio-descripcion">
                                        <h3>Antiarrugas</h3>
                                        <p>Mejora la apariencia de tu piel con nuestro tratamiento especializado
                                            antiedad.</p>
                                        <span class="precio-servicio">$80.000 COP</span>
                                        <a href="producto.php" class="btn-servicio">ver más</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Servicio 3 -->
                            <div class="swiper-slide">
                                <div class="servicio">
                                    <div class="servicio-imagen">
                                        <img src="img/aguamiselar.jpg" alt="Servicio 3">
                                    </div>
                                    <div class="servicio-descripcion">
                                        <h3>Agua micelar</h3>
                                        <p>Agua micelar con acción 7 en 1 que deja una piel limpia, desmaquillada,
                                            fresca e hidratada respetando el pH de la piel sin dañar su barrera natur
                                        </p>
                                        <span class="precio-servicio">$40.000 COP</span>
                                        <a href="producto.php" class="btn-servicio">ver más</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Servicio 4 -->
                            <div class="swiper-slide">
                                <div class="servicio">
                                    <div class="servicio-imagen">
                                        <img src="img/hydrobost.jpg" alt="Servicio 4">
                                    </div>
                                    <div class="servicio-descripcion">
                                        <h3>Serum Hidratante</h3>
                                        <p>Serum hidratante concentrado para cara y ojos que mantiene la piel suave,
                                            fortalecida e hidratada gracias a su formulación con 2 densidades de Ácido
                                            Hialurónico, Pro-Vitamina B5 y Glicerina.</p>
                                        <span class="precio-servicio">$70.000 COP</span>
                                        <a href="producto.php" class="btn-servicio">ver más</a>
                                    </div>
                                </div>
                            </div>


                            <div class="swiper-slide">
                                <div class="servicio">
                                    <div class="servicio-imagen">
                                        <img src="img/gellimpiador.jpg" alt="Servicio 5">
                                    </div>
                                    <div class="servicio-descripcion">
                                        <h3>Gel Limpiador Facial</h3>
                                        <p>Limpiador en gel que limpia suave y profundamente mientras aumenta la
                                            hidratación,
                                            dejando la piel con una sensación refrescante, limpia y suave.</p>
                                        <span class="precio-servicio">$35.000 COP</span>
                                        <a href="producto.php" class="btn-servicio">ver más</a>
                                    </div>
                                </div>
                            </div>


                            <div class="swiper-slide">
                                <div class="servicio">
                                    <div class="servicio-imagen">
                                        <img src="img/desmaquillante.jpg" alt="Servicio 6">
                                    </div>
                                    <div class="servicio-descripcion">
                                        <h3>Toallitas desmaquillantes faciales</h3>
                                        <p>Toallitas desmaquillantes suaves y delicadas con aroma relajante para la
                                            noche que remueven 99% del maquillaje de manera suave
                                            y efectiva en un solo paso, dejando la piel completamente limpia de
                                            residuos.</p>
                                        <span class="precio-servicio">$100.000 COP</span>
                                        <a href="producto.php" class="btn-servicio">ver más</a>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <div class="swiper-button-next servicios-button-next"></div>
                        <div class="swiper-button-prev servicios-button-prev"></div>
                    </div>
               </div> 

               <div class="porque-perfectskin-section">
    <div class="content-container">
        <div class="left-content">
            <h2>¿Por qué Perfect Skin?</h2>
            <p>En Perfect Skin, nuestra prioridad es realzar tu belleza natural con los mejores tratamientos y productos de alta calidad. 
               Nos distinguimos por nuestra experiencia, innovación constante, y un servicio personalizado que garantiza resultados increíbles. 
               ¡Haz de tu piel tu mejor accesorio con nosotros!</p>
        </div>
        <div class="right-content">
            <img src="img/nosotros-removebg.png" alt="Tratamiento de Perfect Skin" class="perfectskin-image">
        </div>
    </div>
</div>


<div class="section-wrapper">
    <div class="image-container">
        <img src="img/perfec 6.jpg" alt="Tratamiento Facial">
        <div class="overlay">
            <div class="hours">
                <p class = "open-hours">Horario de Atencion</p>
                <h2>Perfect skin</h2>
               
                <ul class="schedule">
                    <li><span>Lun – Vie :</span> 9:00 AM – 7:00 PM</li>
                    <li><span>Sabado :</span> 9:00 AM – 6:00 PM</li>
                    <li><span>Domingo :</span> Cerrado</li>
                </ul>
                <a href="contacto.php" class="button1">Contacto</a>
            </div>
        </div>
    </div>
</div>


<section class="section__container">
      <h2>Testimonios</h2>
      <h1>Lo que dicen nuestros clientes</h1>
      <div class="section__grid">
        <div class="section__card">
          <span><i class="ri-double-quotes-l"></i></span>
          <h4>Renovador </h4>
          <p>
          Después de una semana estresante, el spa me dio la oportunidad de relajarme y recargar energías. ¡Fue increíble!
          </p>
          <img src="img/luisa.jpg" alt="user" />
          <h5>Luisa Jimenez</h5>
          <h6>Estudiante Comfenalco</h6>
        </div>
        <div class="section__card">
          <span><i class="ri-double-quotes-l"></i></span>
          <h4>Innovador</h4>
          <p>
          La reserva fue sencilla y rápida, y el servicio en el spa fue excepcional. ¡Recomiendo ampliamente!
          </p>
          <img src="img/peluffo.jpeg" alt="user" />
          <h5>David Pelufo</h5>
          <h6>Desarrollador de software</h6>
        </div>
        <div class="section__card">
          <span><i class="ri-double-quotes-l"></i></span>
          <h4>Hermoso</h4>
          <p>
          Visité el spa con mi pareja y se siente un ambiente de relajación y armonía, la amabilidad de las personas que trabajan allí hacen más agradable la estadía. Elegimos el paquete Luminous
           Face y fue buena opción,Si quieren tener una buena experiencia, este es un lugar que les recomiendo.
          </p>
          <img src="img/testimonio2.jpg" alt="user" />
          <h5>Taliana Avatar</h5>
          <h6>Super Giros</h6>
        </div>
      </div>
    </section>              
                    <script src="js/ocultar.js"></script>
                    <script src="js/menu_desplegable.js"></script>
                    <script src="js/modal.js"></script>
                    <script src="js/navbar_effects.js"></script>
                    <script src="js/smooth_scroll.js"></script>
                    <script src="js/smooth_scroll.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
                    <script src="js/swiper_setup.js"></script>
                    <script src="js/swiper_servicios.js"></script>
                    
                    <script src="js/musica.js"></script>
                    <script src="js/carousel_Navigation.js"></script>
                    <script src="js/galeria.js"></script>                              
</body>

</html>
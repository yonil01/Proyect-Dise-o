
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="items">
                    <a href="#" class="logo">SystemJY</a>  
                    <p> </p>
                    <div class="social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                        <a href="#"><i class="fa fa-github"></i></a>
                    </div>
                </div>
                <div class="items">
                    <h3> Producto</h3>
                    <ul>
                        @if(!isset(auth()->user()->name))
                        <li><a href="/loginempresa">Ingresar Empresa</a></li>
                        @endif
                        <li><a href="#">Email Sistema</a></li>
                        <li><a href="#">Empresas</a></li>
                        <li><a href="#">Telefono</a></li>
                        <li><a href="#">Correo</a></li>
                        <li><a href="#">Otros</a></li>
                    </ul>                          
                </div>

                <div class="items">
                    <h3>Legal</h3>
                <ul>
                    <li><a href="#">Terminos</a></li>
                    <li><a href="#">Politica de privacidad</a></li>
                    <li><a href="#">Cookie Policy</a></li>
                    <li><a href="#">GDPR Empresas</a></li>
                </ul>
                </div>
                <div class="items">
                    <h3>Soporte</h3>
                    <ul>
                        <li><a href="#">Guias de navegacion</a></li>
                        <li><a href="#">Video Tutoriales</a></li>
                    </ul>
                </div>

            </div>
            <hr>
            <p class="end">Derechos de author © 2021 por systemJY Todos los derechos reservados.</p>
        </div>
    </footer>
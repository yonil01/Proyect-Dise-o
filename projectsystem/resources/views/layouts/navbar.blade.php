
<header class="header">
            <a href="#" class="header__logo">JY System</a>

            <ion-icon name="menu-outline" class="header__toggle" id="nav-toggle"></ion-icon>

            <nav class="nav" id="nav-menu">
                
                <div class="nav__content bd-grid">

                    <ion-icon name="close-outline" class="nav__close" id="nav-close"></ion-icon>
    
                    <div class="nav__perfil">
                        <div class="nav__img">
                            <img src="/img/logoempresa1.jpg" alt="">
                        </div>
                        
                        <div style="margin-top: 10px">
                            <a href="#" class="nav__name">JY System</a>
                        </div>
                    </div>
    
                    <div class="nav__menu ">
                        <ul class="nav__list">
                            <li class="nav__item"><a href="../../" class="nav__link active">Home</a></li>
                            <li class="nav__item"><a href="#" class="nav__link">Nostros</a></li>
                            <li class="nav__item"><a href="#" class="nav__link">Contactanos</a></li>
                            <li class="nav__item"><a href="#" class="nav__link">Portfolio</a></li>
                            @if(!isset($LoggedUserInfo['name']))
                            <li class="nav__item"><a href="/logincliente" class="nav__link">Login User</a></li>
                            @endif

                    
                            @if(isset(auth()->user()->name))
                                    <li class="nav__item user-btn"><a href="/empresa" class="nav__link"><i class="fi-xnsuxl-user-solid"></i><b>{{auth()->user()->name}}</b></a></li>      
                            @endif

                            @if(isset($LoggedUserInfo['name'])))
                            <li class="nav__item user-btn"><a href="/menu" class="nav__link"><i class="fi-xnsuxl-user-solid"></i><b>{{$LoggedUserInfo['name']}}</b></a></li>
                            @endif
                           
                        </ul>
                    </div>   
                        
                </div>
            </nav>
        </header>
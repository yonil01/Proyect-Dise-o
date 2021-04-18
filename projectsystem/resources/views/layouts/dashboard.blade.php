<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/f625761a6c.js" crossorigin="anonymous"></script>
    <!--<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">-->
    <link rel="stylesheet" href="resources/views/layouts/estilo.css">
    <link rel="stylesheet" href="css/product/style.css">   

</head>
<style>

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

:root{
    --main-color: #2d3c46;
    --color-dark: #1D2231;
    --text-grey:  #8390A2;
}

*{
    padding:0;
    margin: 0;
    box-sizing: border-box;
    list-style-type: none;
    text-decoration: none;
    font-family: 'poppins', sans-serif;
}

.sidebar{
    width: 345px;
    position: fixed;
    left:0;
    top:0;
    height: 100%;
    background: var(--main-color);

}

.lateral{
    height: 90px;
    padding: 1rem 0rem 1rem 2rem;
    color: #fff;
}

.lateral span{
    display: inline-block;
    padding-right: 1rem;
}

.lateralMenu li{
    width: 100%;
    margin-bottom: 1.7rem;
    padding-left: 1rem;
}

.lateralMenu a{
    padding-left: 1rem;
    display: block;
    color: #fff;
    font-size: 1.1rem;
}

.lateralMenu a.active{
    background: #fff;
    padding-top: 1rem;
    padding-bottom: 1rem;
    color: var(--main-color);
    border-radius: 30px 0px 0px 30px;
}

.lateralMenu a span:first-child {
    font-size: 1.5rem;
    padding-right: 1rem ;
}

.contenidoPrincipal{
    margin-left: 345px;
}

header{
    display: flex;
    justify-content: space-between;
    padding: 1rem;
    box-shadow: 4px 4px 10px rgba(0,0,0,0.3);
}

.buscador{
    border: 1px solid #ccc;
    border-radius: 30px;
    height: 50px;
    display: flex;
    align-items: center;
    overflow-x: hidden;
}

.buscador span{
    display: inline-block;
    padding: 0rem 1rem;
    font-size: 1.5rem;
}

.buscador input{
    height: 100%;
    padding: .5rem;
    border: none;
    outline: none;

}

.perfilUsuario{
    display: flex;
    align-items: center;
}

.perfilUsuario img{
    border-radius: 50%;
    margin-right: 1rem;
}

.btn-comprar{
    border-radius: 2.5px;
    background: rgb(173, 55, 55);
    color: #fff;
    text-decoration: none;
    padding: 10px 8px 8px 12px;
    margin-left: 100px;
    position: relative;
    font-weight: bold;
    display: inline;
    width: 230px;
}

</style>
<body>
    <div class="sidebar">
        <div class="lateral">
            <h2><class class="fas fa-briefcase"></class> JY SYSTEM</h2>
        </div>

        <div class="lateralMenu">
            <ul>
                <li>
                    <a href="{{ route('client.home') }}" class="active"><span class="fas fa-cube"></span>
                    <span>dashboard</span></a>
                </li>
                <li>
                    <a href=""><span class="fas fa-user-alt"></span>
                    <span>Cuenta</span></a>
                </li>
                <li>
                    <a href=""><span class="fas fa-bookmark"></span>
                    <span>Categorias</span></a>
                </li>
                <li>
                    <a href=""><span class="fas fa-star"></span>
                    <span>populares</span></a>
                </li>
            </ul>

        </div>

    </div>
   
    <div class="contenidoPrincipal">
        <header>
            <h3>
            <span class="fas fa-cube"></span>
                dashboard
            </h3>

            <div class="buscador">
                <span class="fas fa-search"></span>
                <input type="search" placeholder="buscar aquí">
            </div>

            <div class="carrito">
                <span class="fas fa-shopping-cart"></span>
            </div>

            <div class="perfilUsuario">
                <img src="" width="30px" height="30px"  alt="">
                <span class="fas fa-user-circle"></span>
                <div>
                    <h4><a href="{{  route('client.logout')}}">{{ $LoggedUserInfo['name'] }}</a></h4>
                </div>
            </div>

        </header>
        <div class="title">
        <h2>Productos agregados</h2>
        </div>
        <div class="head">
        
            @foreach($cart_products as $cart_product)
                @foreach($products as $product)
                    @if($cart_product->product_id == $product->id)
                    <div class="producto">
            <img src="img/logo1.png" alt="Auriculares xiami">
            <div class="informacion">
                <span class="tipo-envio">{{$product->cost_delivery}}</span>
                <span class="precio">$ {{$product->cost}}</span>
                <span class="precio-envio">{{$product->type_delivery}}</span>
                <span class="descripcion">{{$product->name}}</span>
                <div class="calificacion">
                    <span>
                        <i class="fi-xnsuxl-star-solid"></i>
                        <i class="fi-xnsuxl-star-solid"></i>
                        <i class="fi-xnsuxl-star-solid"></i>
                        <i class="fi-xnsuxl-star-solid"></i>
                        <i class="fi-xnsuxl-star-solid"></i>
                        
                    </span>
                <span>  Quedan {{$product->quantify}}</span>
            </div>
                <div class="agregar">
                    <span class="ubicacion">Huanuco</span>
                    <form action="">
                    <span class="ubicacion"><a class="btn-agregar" href="{{ route('cartproduct.delete', $cart_product->id) }}">Quitar</a></span>
                    </form>
                </div>
            </div>
        </div>
                    @endif
                @endforeach
            @endforeach
            <a href="{{ route('venta.index') }}" class="btn btn-comprar">Continuar con la compra</a>
            </div>
    </div>
    
</body>
</html>
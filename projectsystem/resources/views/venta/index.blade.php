<!DOCTYPE html>
<html>
<head>
    <title>Checkout Card</title>
    <link href='https://www.soengsouy.com/favicon.ico' rel='icon' type='image/x-icon'/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- library validate -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>
    <!-- style css -->
    <link rel="stylesheet" href="/css/venta/style.css">
</head>
<body>

<h2>Confirmacion de la venta</h2>
<div class="row">
    <div class="col-75">
        <div class="container">
            <form id="validate" action="/action_page.php">
                <div class="row">
                    <div class="col-50">
                        <h3>Datos personales</h3>
                        <label for="fname"><i class="fa fa-user"></i> Nombre y Apellido</label>
                        <input type="text" id="fname" name="fullname" value="{{ $LoggedUserInfo['name'] }}" required>
                        <label for="email"><i class="fa fa-envelope"></i> Email</label>
                        <input type="text" id="email" name="email" value="{{ $LoggedUserInfo['email'] }}" required>
                        <label for="adr"><i class="fa fa-address-card-o"></i> Direccion</label>
                        <input type="text" id="adr" name="address"  required>
                        <label for="city"><i class="fa fa-institution"></i> Ciudad</label>
                        <input type="text" id="city" name="city"  required>

                        <div class="row">
                            <div class="col-50">
                                <label for="state">Telefono o Celular</label>
                                <input type="text" id="state" name="state" required>
                            </div>
                            <div class="col-50">
                                <label for="zip">Dni</label>
                                <input type="text" id="zip" name="zip" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-50">
                        <h3>Forma de pago</h3>
                        <label for="fname">Paga con estas cuentas</label>
                        <div class="icon-container">
                            <i class="fa fa-cc-visa" style="color:navy;"></i>
                            <i class="fa fa-cc-amex" style="color:blue;"></i>
                            <i class="fa fa-cc-mastercard" style="color:red;"></i>
                            <i class="fa fa-cc-discover" style="color:orange;"></i>
                        </div>

                        <label for="cname">Nombre de la tarjeta</label>
                        <input type="text" id="cname" name="cardname" placeholder="Ejem: Visa"required>
                        <label for="ccnum">Numero de tarjeta de credito</label>
                        <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444"required>
                        <label for="expmonth">Mes de expiracion</label>
                        <input type="text" id="expmonth" name="expmonth" placeholder="Ejem: Setiembre : 09"required>
                        <div class="row">
                            <div class="col-50">
                                <label for="expyear">Año de tu expiracion</label>
                                <input type="text" id="expyear" name="expyear" placeholder="2021"required>
                            </div>
                            <div class="col-50">
                                <label for="cvv">CVV</label>
                                <input type="text" id="cvv" name="cvv" placeholder="352"required>
                            </div>
                        </div>
                    </div>
                </div>
                <label>
                <input type="checkbox" checked="checked" name="sameadr" > Aceptar
                </label>
                <input type="submit" value="Aceptar" class="btn">
            </form>
        </div>
    </div>
    <div class="col-25">
        <div class="container">
            <h4>Carrito <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i> <b>{{count($cart_products)}}</b></span></h4>
                    @php
                        $cost_total = 0;
                    @endphp
            @foreach($cart_products as $cart_product)
                @foreach($products as $product)
                    @if($cart_product->product_id == $product->id)
                    <p><a href="#">{{$product->name}}</a> <span class="price">S/ {{$product->cost}}</span></p>
                    @php
                        $cost_total = floatval($cost_total) + floatval($product->cost);
                    @endphp
                    @endif
                @endforeach
            @endforeach
            <hr>
            <p>Total <span class="price" style="color:black"><b>S/ {{ $cost_total }}</b></span></p>
        </div>
        <div>
        <a href="{{ route('client.dashboard') }}" class="btn-cancelar">Cancelar</a>
        </div>
    </div>
</div>
<!-- script validate js -->
<script>
    $('#validate').validate({
        roles: {
            fullname: {
                required: true,
            },
            email: {
                required: true,
            },
            address: {
                required: true,
            },
            city: {
                required: true,
            },
            state: {
                required: true,
            },
            zip: {
                required: true,
            },
            cardname: {
                required: true,
            },
            cardnumber: {
                required: true,
            },
            expmonth: {
                required: true,
            },
            expyear: {
                required: true,
            },
            cvv: {
                required: true,
            },
           
        },
        messages: {
            fullname:"Por favor ingresa el input full name*",
            email:"Por favor ingresa el input email*",
            city:"Por favor ingresa el input city*",
            address:"Por favor ingresa el input address*",
            state:"Por favor ingresa el input state*",
            zip:"Por favor ingresa el input address*",
            cardname:"Por favor ingresa el input card name*",
            cardnumber:"Por favor ingresa el input card number*",
            expmonth:"Por favor ingresa el input exp month*",
            expyear:"Por favor ingresa el input exp year*",
            cvv:"Por favor ingresa el input cvv*",
        },
    });
</script>
</body>
</html>
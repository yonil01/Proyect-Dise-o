@extends('layouts.templatebase')

@section('css')
    <!-- Navbar -->
    <link rel="stylesheet" href="css/navbar/styles.css"> 
    <!-- Container -->
    <link rel="stylesheet" href="css/product/style.css"> 
    <link rel="stylesheet" href=" {{ asset('/css/footer/style.css') }}">  
@endsection

@section('title')
    <title>Home-SystemJY</title>
@endsection

@section('container')

@extends('layouts.navbar')

<!-- Contenido -->
<div class="espacio"></div>


 @foreach ($categories as $category)
    <div class="title">
        <h2>Categoria</h2>
        <p>{{$category->name}}</p>
    </div>
  
    
    <div class="head">
    @php
    $count = 0;
    $big = count($productos);
    @endphp 
    @for ($i= $big-1; $i>=0; $i--)
            @if (($category->name == $productos[$i]->type_category) && $count < 5 )
            @php
            $count++;
            @endphp
            <div class="producto">
            <img src="{{ asset($productos[$i]->url) }}" alt="Auriculares xiami">
            <div class="informacion">
                <span class="tipo-envio">{{$productos[$i]->cost_delivery}}</span>
                <span class="precio">$ {{$productos[$i]->cost}}</span>
                <span class="precio-envio">{{$productos[$i]->type_delivery}}</span>
                <span class="descripcion">{{$productos[$i]->name}}</span>
                <div class="calificacion">
                    <span>
                        <i class="fi-xnsuxl-star-solid"></i>
                        <i class="fi-xnsuxl-star-solid"></i>
                        <i class="fi-xnsuxl-star-solid"></i>
                        <i class="fi-xnsuxl-star-solid"></i>
                        <i class="fi-xnsuxl-star-solid"></i>
                        
                    </span>
                <span>  Quedan {{$productos[$i]->quantify}}</span>
            </div>
                <div class="agregar">
                    <span class="ubicacion">Huanuco</span>
                    <span class="ubicacion"><a class="btn-agregar" href="/producto/detalle/{{$productos[$i]->id}}">Detalles</a></span>
                </div>
            </div>
        </div>
        @endif
        @endfor
   
    <a href="" class="btn btn-agregar">Ver mas</a>
    </div>
    @endforeach

    <!-- Footer -->
    @include('layouts.footer')

@section('js')
    <!-- Navbar -->
    <script src="js/navbar/main.js"></script>
    <!-- Product -->
    <script defer src="https://friconix.com/cdn/friconix.js"> </script>
@endsection

@endsection
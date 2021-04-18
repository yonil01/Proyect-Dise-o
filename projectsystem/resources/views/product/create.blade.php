@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear producto</h1>
@stop

@section('content')
<form action="/empresa/producto" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" tabindex="1">
        </div>
        
        <div class="mb-3">
        <label for="" class="form-label">Categoria</label>
        <select class="form-select form-control" aria-label="Default select example" name="category" tabindex="2">
            <option selected>Selecciona</option>
            <option name="category" value="Tecnologia" >Tecnologia</option>
            <option name="category" value="Accesorio" >Accesorios</option>
            <option name="category" value="Ropa dama" >vestiodo dama</option>
            <option name="category" value="Ropa caballero" >Vestido caballero</option>
            <option name="category" value="Informatica" >Informatica</option>
            <option name="category" value="Electrodomestico" >Electrodomesticos</option>
            <option name="category" value="Otros" >otros</option>
        </select>
        </div>


        <div class="mb-3">
            <label for="" class="form-label">Precio</label>
            <input type="text" class="form-control" id="cost" name="cost" tabindex="2">
        </div>

        <div class="mb-3">
        <label for="" class="form-label">Precio de envio</label>
        <select class="form-select form-control" aria-label="Default select example" name="cost_delivery" tabindex="2">
            <option selected>Selecciona</option>
            <option name="cost_delivery" value="Envio gratis" >Envio gratis</option>
            <option name="cost_delivery" value="Ingresa Precio" >Ingresa Precio</option>
        </select>
        </div>

        <div class="mb-3">
        <label for="" class="form-label">Tipo de delivery</label>
        <select class="form-select form-control" aria-label="Default select example" name="type_delivery" tabindex="2">
            <option selected>Selecciona</option>
            <option name="type_delivery" value="Envio a domicilio" >Envio a domicilio</option>
            <option name="type_delivery" value="Disponible en tienda" >Disponible en tienda</option>
        </select>
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Descripcion</label>
            <input type="text" class="form-control" id="description" name="description" tabindex="4">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Cantidad de producto</label>
            <input type="text" class="form-control" id="quantify" name="quantify" tabindex="4">
        </div>

        <div class="mb-3">
            <label for="" class="form-label">Subir imagen</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" tabindex="5">
            @error('image')
            <small class="text-danger">El archivo no es tipo imagen.</small>
            @enderror
        </div>

        <a href="/empresa" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="6">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    
@stop
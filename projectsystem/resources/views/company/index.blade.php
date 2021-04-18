@extends('adminlte::page')

@section('title', 'Main')

@section('content_header')
    <h1>Lista de productos registrados!</h1>
@stop

@section('content')

<table id="products" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-dark text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Codigo</th>
            <th scope="col">Dedcripcion</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Precio</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->type_category}}</td>
                <td>{{$product->cost}}</td>
                <td>
                    <form action="/empresa/producto/{{$product->id}}" method="POST">
                    <a href="/products/{{ $product->id}}/edit" class="btn btn-info">editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#products').DataTable({
                "lengthMenu": [[5,10,50,-1], [5,10,50,"All"]]
            });
        } );
    </script>
@stop
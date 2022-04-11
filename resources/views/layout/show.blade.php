@extends('..app') <!-- Plantilla MASTER -->

@section('content')

<!-- EN LA RUTA ESPEFICICAMOS EL CONTROLADOR Y LA FUNCION QUE VAMOS A EJECUTAR EN ESTE CASO
     LA RUTA LLEVA EL PARAMETRO DE ID QUE TIENE LA BASE DE DATO Y LO QUE ESTA DENTRO [] ES LA QUE VAMANDAR A LA 
     FUNCION PARA QUE FUNCIONE DEBE IR METODO PATCH.
-->

<div class="container w-25 border p-4 mt-4">
    <form action="{{ route('homeworks-update', ['id' => $homework->id] ) }}" method="POST">
        @method('PATCH')
        <!--AGREGAR UNA DIRECTIVA-->
        @csrf

        @if (session('success'))
            <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif

        @error('title')
        <h6 class="alert alert-danger">{{ $message }}</h6>
        @enderror
        
        <div class="mb-3">
            <label for="title" class="form-label">Titulo de la tarea</label>
            <input type="text" name="title" class="form-control" value="{{ $homework->title }}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar tarea</button>
    </form>

</div>
<div>

@endsection
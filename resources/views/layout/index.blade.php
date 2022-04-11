@extends('app') <!-- Plantilla MASTER-->

@section('content')
<div class="container w-25 border p-4 mt-4">
    <form action="{{ route('addtask') }}" method="POST">
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
            <input type="text" name="title" class="form-control">
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Categoria</label>
            <select name="category_id" class="form-select">
            @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Crear nueva tarea</button>
    </form>

        <div>
        @foreach ($homeworks as $homework)
        <div class="row py-1">
                <div class="col-md-9 d-flex align-items-center">
                    <a href="{{ route('homeworks-edit', ['id' => $homework->id]) }}">{{ $homework->title }}</a>
                </div>

                <div class="col-md-3 d-flex justify-content-end">
                    <form action="{{ route('homeworks-destroy', [$homework->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger btn-sm">Eliminar</button>
                    </form>
                </div>
            </div>
         @endforeach
        </div>

</div>
<div>

   

@endsection
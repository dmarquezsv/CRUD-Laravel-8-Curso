@extends('app')

@section('content')

<div class="container w-25 border p-4 mt-4">
    <form action="{{ route('categories.update',['category' => $category->id]) }}" method="POST">
        @method('PATCH')
        <!--AGREGAR UNA DIRECTIVA-->
        @csrf

        @if (session('success'))
        <h6 class="alert alert-success">{{ session('success') }}</h6>
        @endif

        @error('name')
        <h6 class="alert alert-danger">{{ $message }}</h6>
        @enderror

        <div class="mb-3">
            <label for="title" class="form-label">Titulo de la categoria</label>
            <input type="text" name="name" class="form-control" value="{{$category->name}}">
        </div>

        <div class="mb-3">
            <label for="color" class="form-label">Titulo de la categoria</label>
            <input type="color" name="color" class="form-control" value="{{$category->color}}">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar categoria </button>
    </form>

    @if ($category->homework->count()> 0)
    @foreach ($category->homework as $homework)
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
    @else
    No hay tareas para esta categoria
    @endif
</div>

@endsection
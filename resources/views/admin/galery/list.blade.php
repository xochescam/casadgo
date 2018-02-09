@extends('layout.master')

{{-- Metadata --}}
@section('meta.title', 'C.A.S.A.')
@section('meta.tab_title', 'Galeria')
@section('meta.description', '')
@section('meta.canonical')
@section('id', 'galery-list')
@section('class', 'galery-list')

@section('content')

  <div class="container">
    <div class="row row--margin">
      <div class="section-header">
          <h1 class="section-title text-center">Galeria</h1>
      </div>

      <div class="text-right">
         <a href="{{ route('galeria.create') }}" class="btn btn-primary" role="button" aria-pressed="true">Crear album</a>
      </div>
     
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Titulo</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @if($folders == '[]')
            <tr>
                <th colspan="3" class="text-center">Sin resultados</th>
            </tr>
          @else     
            @foreach($folders as $folder)
              <tr>
                <th>{{ $folder->title }}</th>
                <td class="text-center">
                  <a href="{{ route('galeria.show',$folder->id) }}" class="btn btn-sm btn-success " role="button" aria-pressed="true" >Ver</a>
                  <a href="{{ route('galeria.edit',$folder->id) }}" class="btn btn-sm btn-info" role="button" aria-pressed="true">Editar</a>
                  <a class="btn btn-sm btn-danger js-delete-galery" role="button" aria-pressed="true" data-item="{{ $folder->id }}" data-csrf="{{ csrf_token() }}">Eliminar</a>
                </td>
              </tr>
            @endforeach
          @endif     
        </tbody>
      </table>
    </div>
  </div>

@endsection

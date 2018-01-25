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
          <h1 class="section-title text-center wow fadeInDown ">Galeria</h1>
      </div>

      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Titulo</th>
            <th scope="col">Fecha</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($folders as $folder)
            <tr>
              <th>{{ $folder->title }}</th>
              <th>{{ $folder->date }}</th>
              <td class="text-center">
                <a href="{{ route('galeria.show',$folder->id) }}" class="btn btn-success " role="button" aria-pressed="true" >Ver</a>
                <a href="{{ route('galeria.edit',$folder->id) }}" class="btn btn-info" role="button" aria-pressed="true">Editar</a>
                <a class="btn btn-danger js-delete-galery" role="button" aria-pressed="true" data-item="{{ $folder->id }}" data-csrf="{{ csrf_token() }}">Eliminar</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection

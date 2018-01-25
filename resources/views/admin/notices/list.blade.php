@extends('layout.master')

{{-- Metadata --}}
@section('meta.title', 'C.A.S.A.')
@section('meta.tab_title', 'Noticias')
@section('meta.description', '')
@section('meta.canonical')
@section('id', 'notices-list')
@section('class', 'notices-list')

@section('content')

  <div class="container">
    <div class="row row--margin">
      <div class="section-header">
          <h1 class="section-title text-center wow fadeInDown ">Noticias</h1>
      </div>

      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Titulo</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($notices as $notice)
            <tr>
              <th>{{ $notice->title }}</th>
              <td class="text-center">
                <a href="{{ route('noticias.show',$notice->id) }}" class="btn btn-success " role="button" aria-pressed="true" >Ver</a>
                <a href="{{ route('noticias.edit',$notice->id) }}" class="btn btn-info" role="button" aria-pressed="true">Editar</a>
                <a class="btn btn-danger js-delete-notice" role="button" aria-pressed="true" data-item="{{ $notice->id }}" data-csrf="{{ csrf_token() }}">Eliminar</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

@endsection

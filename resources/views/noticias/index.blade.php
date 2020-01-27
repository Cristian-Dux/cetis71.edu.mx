@extends('layouts.layout')

@section("content")

<div class="row">
  <div class="col-12">
    <a href="{{ route('noticias.create') }}" class="btn btn-primary">Nuevo</a>
    @if(empty($noticias))
      <table class="table">
        <thead>
          <th>id</th>
          <th>titulo</th>
          <th>descripcion</th>
          <th>urlfoto</th>
          <th>accion</th>
        </thead>
        <tbody>
        @foreach ($noticias as $n)     
          <tr>
              <div class="col-lg-6">
              <td>{{$n->id}}</td>
              <td>
                <h3>{{$n->titulo}}</h3>
              </td>
                <td>
                  <p>
                  {{$n->descripcion}}
                  </p>
                </td>
                <td>{{$n->urlfoto}}</td>
                <td>
                  <a class="btn btn-primary" href="{{ route('noticias.edit',$n->id) }}">Editar</a>
                  {!! Form::open(['method' => 'DELETE', 'route' => ['noticias.destroy', $n->id], 'style' =>'display:inline']) !!}
                  {!! Form::submit('Eliminar', ['class' => 'btn btn-danger']) !!}
                  {!! Form::close() !!}
                </td>
              </div>
          </tr>
        
        @endforeach
        </tbody>
      </table>
    @else 
    <div class="col-lg-6">
      <h2>No Hay Noticias</h2>
    </div>
    @endif
  </div>
  </div>
<!-- /.row -->
  @endsection
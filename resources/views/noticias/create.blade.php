@extends('layouts.layout')

@section("content")
   <div class="container">
       <div class="row">
            <div class="col-12">
                <h1>Nuevo</h1>
                {!! Form::open(['route'=>'noticias.store','method'=>'POST','files'=>true]) !!}
                <div class="form-group">
                    {!! Form::text('titulo', null, ['class'=>'form-control','placeholder'=>'Ingrese el titulo','required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::textarea('descripcion', null, ['class'=>'form-control','placeholder'=>'Ingrese la descripcion','required']) !!}
                </div>
                
                <div class="form-group">
                    <label for="urlfoto" >Imagenes de Noticia</label>
                    <input type="file" class="form-control-file" name="urlfoto[]" id="urlfoto[]" multiple accept="image/*">
                </div>
                {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
                {!! Form::close() !!}
            </div>
    </div>
</div>
@endsection
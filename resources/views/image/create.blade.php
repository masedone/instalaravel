@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-header">Subir nueva imagen</div>

            <div class="card-body">
                <form action="{{ route('image.save') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="image_path" class="col-md-4 col-form-label text-md-right">Imagen</label>
                        <div class="col-md-8">
                            <input type="file" name="image_path" class="form-control"/>
                            @if($errors->has('image_path'))
                            <span class="invalid-feedback" role="alert"></span>
                            <strong>{{ $errors->first('image_path') }}</strong>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label text-md-right">Descripcion</label>
                        <div class="col-md-8">
                            <textarea name="description" class="form-control"></textarea>
                            @if($errors->has('description'))
                            <span class="invalid-feedback" role="alert"></span>
                            <strong>{{ $errors->first('description') }}</strong>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                    
                        <div class="col-md-6 offset-md-4">
                            <input type="submit" class="btn btn-primary" value="Subir imagen">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
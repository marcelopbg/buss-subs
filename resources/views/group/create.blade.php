@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      @if(isset($registro))
      <h5> Editar Turma </h5>
      @else
      <h5> Nova Turma </h5>
      @endif
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-12 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading"> </div>
            <div class="panel-body">

              <form action="{{ isset($registro)? route('group.update', $registro->id) : route('group.store')}}" method="post" enctype="multipart/form-data">
                <div class="box-body">
                  @if (isset($registro))
                  <input name="_method" type="hidden" value="PUT">
                  @endif
                  {{csrf_field()}}

                  <div class="row">
                    <div class="form-group col-sm-12">
                      <label for="description"> Nome </label>
                      <input type="text" class="form-control" name="description" placeholder="Informe o nome da Turma" value="{{ isset($registro) ? $registro->description : ''}}" required>
                    </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="{{route('student.index')}}" class="btn btn-default pull-right">Cancelar</a>
                  </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
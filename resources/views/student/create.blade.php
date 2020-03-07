@extends('layouts.app')

@section('content')
<div class="container">
  <div class="card">
    <div class="card-header">
      @if(isset($registro))
      <h5> Editar Aluno </h5>
      @else
      <h5> Novo Aluno </h5>
      @endif
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-12 col-md-offset-2">
          <div class="panel panel-default">
            <div class="panel-heading"> </div>
            <div class="panel-body">

              <form action="{{ isset($registro)? route('student.update', $registro->id) : route('student.store')}}" method="post" enctype="multipart/form-data">
                <div class="box-body">
                  @if (isset($registro))
                  <input name="_method" type="hidden" value="PUT">
                  @endif
                  {{csrf_field()}}

                  <div class="row">
                    <div class="form-group col-sm-8">
                      <label for="name"> Nome </label>
                      <input type="text" class="form-control" name="name" placeholder="Informe o nome do Aluno" value="{{ isset($registro) ? $registro->name : ''}}" required>
                    </div>
                    <div class="form-group col-sm-4">
                      <label for="exampleFormControlSelect1"> Sexo: </label>
                      <select class="form-control" name="sex">
                        <option disabled selected> Selecione o Sexo do aluno </option>
                        <option value="1" {{ isset($registro) && $registro->sex == 1 ? 'selected': ''}}> Masculino </option>
                        <option value="2" {{ isset($registro) && $registro->sex == 2 ? 'selected': ''}}> Feminino </option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-sm-4">
                      <label for="name"> Data de Nascimento </label>
                      <input type="date" class="form-control" name="birthdate" placeholder="Informe a data de nascimento do Aluno" value="{{ isset($registro) ? $registro->birthdate : ''}}" required>
                    </div>
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
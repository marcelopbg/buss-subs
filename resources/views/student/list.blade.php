@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default mb-2 mt-2">
                @if(session()->has('alert-success'))
                <div class="alert alert-success">
                    {{ session()->get('alert-success') }}
                </div>
                @endif
                @if(session()->has('alert-danger'))
                <div class="alert alert-danger">
                    {{ session()->get('alert-danger') }}
                </div>
                @endif
                @if(session()->has('alert-warning'))
                <div class="alert alert-warning">
                    {{ session()->get('alert-warning') }}
                </div>
                @endif

                <!--     echo asset('storage/file.txt'); -->
                <div class="panel-body">
                    <div class="table-responsive table-striped">
                        @if(count($registros)!==0)
                        <table class="table table-sm">
                            <thead class="thead-dark">
                                <tr>
                                    <th class="text-center">Nome</th>
                                    <th class="text-center">Sexo </th>
                                    <th class="text-center">Data de Nascimento</th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @endif
                                @forelse($registros as $registro)
                                <td class="text-center  pt-3 pb-2">{{$registro->name}}</td>
                                <td class="text-center  pt-3 pb-2">{{$registro->formattedSex}}</td>
                                <td class="text-center  pt-3 pb-2">{{$registro->formattedDate}}</td>
                                <td class="text-center  pt-3 pb-2">
                                    <form class="" action="{{route('student.destroy',$registro->id)}}" method="post">
                                        <input type="hidden" name="_method" value="delete">

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <a href="{{route('student.edit',$registro->id)}}" class="btn btn-primary btn-sm">Editar</a>

                                        <input type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Você tem certeza que deseja excluir este registro?');" name="name" value="Excluir">
                                    </form>
                                </td>

                                </tr>

                                @empty
                                <p>Não há alunos cadastrados, clique para <a href="{{route('student.create')}}">cadastrar! </a></p>
                                @endforelse </td>
                            </tbody>
                            <tfoot>
                            </tfoot>
                        </table>
                    </div>
                    {{ $registros->links() }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
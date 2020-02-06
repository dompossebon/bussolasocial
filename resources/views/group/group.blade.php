@extends('templates.master')

@section('content')
    <div class="container-lg">
        <div class="row justify-content-center">
                <div class="card">
                    <div class="card-header">Visualiza Turma Agendadas</div>
                    <br/>
                    <p/>

                    @forelse ($viewTurmas as $viewTurma)
                       <a class="p-2" href="{{ route( "viewRegistrationForm", $viewTurma['id'] ) }}">
                        Turma: <b>{{ $viewTurma['name'] }}  </b>  -
                        </a>
                        Inicio: <b>{{ $viewTurma['dataStart'] }}  </b>  -
                        Situação: <b>{{ $viewTurma['status'] }}  </b> -
                        Fim: <b>{{ $viewTurma['dataEnd'] }}  </b>  -
                        Responsavel: <b>{{ $viewTurma['manager'] }}  </b>






                        <p/>
                        {{--                        Responśavel: <b>{{ $value[0]['manager'] }}</b>,--}}
{{--                        Inicio: <b>{{ $value[0]['start'] }}</b>,--}}
{{--                        Final: <b>{{ $value[0]['end'] }}</b> --}}
                    @empty
                        Não existem Turmas cadastradas!
                        <p/>
                        <p/>
                        <p/>
                        É necessario Registrar-se e estar Dentro do Sistema para cadastrar novas turmas.
                    @endforelse <p/>


                </div>
        </div>
    </div>
@endsection

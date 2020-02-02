@extends('templates.master')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Visualiza Turma Existente</div>
                    <br/>
                    <p/>

                    @forelse ($viewTurmas as $viewTurma)

                        Turma: <b>{{ $viewTurma['name'] }}  </b>  -
                        Inicio: <b>{{ $viewTurma['dataStart'] }}  </b>  -
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
    </div>
@endsection

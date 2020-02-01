@extends('templates.master')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Visualiza Turma Existente</div>
                    <br/>
                    <p/>
                    @forelse ($group as $value)

                        Turma: <b>{{ $value[0]['title'] }}</b>,
                        Responśavel: <b>{{ $value[0]['manager'] }}</b>,
                        Inicio: <b>{{ $value[0]['start'] }}</b>,
                        Final: <b>{{ $value[0]['end'] }}</b> <p/>
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

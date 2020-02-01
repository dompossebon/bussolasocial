@extends('templates.master')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Visualiza Turma Existente</div>
                    <br/>
                    <p/>

                    @forelse ($group as $key => $value)
                        {{ $key }}.
                        Turma: <b>{{ $value['title'] }}</b>, Responśavel: <b>{{ $value['manager'] }}</b>, Inicio: <b>{{ $value['start'] }}</b>, Final: <b>{{ $value['end'] }}</b> <p/>
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

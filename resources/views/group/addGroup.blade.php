@extends('templates.master')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Cadastre a Sua Turma</div>
                    <br/>
                    {!! Form::open(['action' => ['GroupController@store'], 'method' => 'post', 'class' => 'form-default']) !!}

                    @include('templates.form.input',
['input' => 'nome',
'attributes' => ['name' => 'name', 'placeholder' => 'NOME', 'required']])

                    @include('templates.form.submit', ['input' => 'Cadastrar'])

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection

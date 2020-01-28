@extends('templates.master')

@section('css-view')

@endsection

@section('content-view')

    <h2>Cadastre a Sua Turma</h2>

    {!! Form::open(['method' => 'post', 'class' => 'form-default']) !!}

    @include('templates.form.input', ['input' => 'nome', 'attributes' => ['placeholder' => 'NOME']])

    @include('templates.form.submit', ['input' => 'Cadastrar'])


    {!! Form::close() !!}
@endsection

@section('js-view')

@endsection

@extends('templates.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Agende a DATA Prevista para Sua Turma</div>
                    <br />
                    {!! Form::open(['method' => 'post', 'class' => 'form-default']) !!}

                    @include('templates.form.input', ['input' => 'nome', 'attributes' => ['placeholder' => 'NOME']])

                    @include('templates.form.submit', ['input' => 'Cadastrar'])

                    {!! Form::close() !!}
                    <div class="card-body">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

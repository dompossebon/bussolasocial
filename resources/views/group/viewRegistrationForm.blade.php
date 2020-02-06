@extends('templates.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
                <div class="card">
                    <div class="card-header">Ficha Cadastral - Detalhes sobre a Turma</div>
                    <br/>
                    <p/>

                    @foreach($fullDetails as $fullDetail)
                        <h3>
                            Turma: {{ $fullDetail['title'] }} ||
                            Professor/Responsável:{{ $fullDetail['manager'] }}
                        </h3>
                        <hr/>
                        <h5>
                            Horas Previstas: {{ $fullDetail['timeHoursExpected'] }} Horas e
                            {{ $fullDetail['timeMinutesExpected'] }} Minutos<br/>
                            Horas Realizadas: {{ $fullDetail['timeHoursFulfilled'] }} Horas e
                            {{ $fullDetail['timeMinutesFulfilled'] }} Minutos<br/>

                        </h5>
                        <hr/>

                        @foreach($fullDetail['moreDetail'] as $littleDetail)
                            <h6>
                                Data Inicial: {{ $littleDetail['start'] }}
                                || Data Final: {{ $littleDetail['end'] }}
                                || Situação: {{ $littleDetail['status'] }}
                            </h6>
                            <br/>


                        @endforeach
                    @endforeach


                </div>
        </div>
    </div>
@endsection

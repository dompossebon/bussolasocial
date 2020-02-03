@extends('templates.master')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
REGRAS BASICAS SOBRE UTILIZACAO DO SYSTEMA
            <br /><br /><br />

            Regras<br />
            <br /><br />
            Cada turma possui um nome de identificação (Ex: Turma Abelhinha, 1ª série, Curso de informática, etc.).
            <p />
            <p />
            As aulas podem ocorrer em um ou mais dias da semana, de Domingo à Sábado.
            <p />
            <p />
            Uma aula pode ocorrer semanalmente ou quinzenalmente;
            <p />
            <p />
            Uma mesma turma pode ter mais de uma agenda;
            <p />
            <p />
            As agendas são compostas pelas regras que as definem (dias da semana, data de inicio, data de fim, horários de inicio e fim e periodicidade de ocorrência);
            <p />
            <p />
            Uma aula pode estar agendada, realizada ou cancelada;    <p />
            Aulas canceladas não contam como carga horária executada;
            <p />
            <p />
            Uma turma que possua aulas sem status de realização é considerada ABERTA. Caso todas as aulas sejam realizadas ou canceladas a turma é considerada FECHADA.
            <p />
            <p />
            Uma mesma turma não pode ter duas agendas com data e horário conflitantes;
            <p />
            <p />
            Somente o responsável pela turma pode alterar Agendamento.

        </div>
    </div>
@endsection

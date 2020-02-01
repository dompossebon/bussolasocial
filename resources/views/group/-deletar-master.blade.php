<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset='utf-8' />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href='{{asset('assets/packages/core/main.css')}}' rel='stylesheet' />
    <link href='{{asset('assets/packages/daygrid/main.css')}}' rel='stylesheet' />
    <link href='{{asset('assets/packages/timegrid/main.css')}}' rel='stylesheet' />
    <link href='{{asset('assets/packages/list/main.css')}}' rel='stylesheet' />

    <link rel="stylesheet"
          href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <link href='{{asset('assets/css/style.css')}}' rel='stylesheet' />




</head>
<body>

@include('modais.modal-fastEvents')
@include('modais.modal-calendar')

<div id='wrap'>

    <div id='external-events'>
        <h4>Novas Turmas</h4>

        <div id='external-events-list'>


            @if($fastEvents)
                @foreach($fastEvents as $fastEvent)
                    <div
                        style="padding: 4px; border: 1px solid {{$fastEvent->color}}; background-color: {{$fastEvent->color}}"
                        class='fc-event'
                        data-event='{
                        "id":"{{$fastEvent->id}}",
                        "title":"{{$fastEvent->title}}",
                        "color":"{{$fastEvent->color}}",
                        "start":"{{$fastEvent->start}}",
                        "end":"{{$fastEvent->end}}"
                        }'>
                        {{$fastEvent->title}}
                    </div>
                @endforeach
            @endif

        </div>

        <p>
            <input type='checkbox' id='drop-remove'/>
            <label for='drop-remove'>Remover após Arrastar</label>
            <button class="btn btn-sm btn-success" id="newFastEvent">Criar nova Turma</button>
        </p>
    </div>

    <div id='calendar'
         data-route-load-events="{{ route('routeLoadEvents') }}"

         data-route-event-store="{{ route('routeEventStore') }}"
         data-route-event-update="{{ route('routeEventUpdate') }}"
         data-route-event-delete="{{ route('routeEventDelete') }}"

         data-route-fast-event-store="{{ route('routeFastEventStore') }}"
         data-route-fast-event-update="{{ route('routeFastEventUpdate') }}"
         data-route-fast-event-delete="{{ route('routeFastEventDelete') }}"
    ></div>

    <div style='clear:both'></div>

</div>

<script src='{{asset('assets/packages/core/main.js')}}'></script>
<script src='{{asset('assets/packages/interaction/main.js')}}'></script>
<script src='{{asset('assets/packages/daygrid/main.js')}}'></script>
<script src='{{asset('assets/packages/timegrid/main.js')}}'></script>
<script src='{{asset('assets/packages/list/main.js')}}'></script>
<script src='{{asset('assets/packages/core/locales-all.js')}}'></script>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

{{--<script>let objCalendar;</script>--}}


<script src="{{asset('assets/js/scripts.js')}}" type="text/javascript" ></script>
<script src="{{asset('assets/js/calendar.js')}}" type="text/javascript" ></script>


</body>
</html>

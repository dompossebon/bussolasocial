@extends('templates.master')
@section('content')

    <div class="container">
        @include('modais.events')
        @include('modais.fastEvents')

        <div id='external-events'>
            <h4>Eventos Rápidos</h4>

            <div id='external-events-list'>

                @isset($fastEvents)
                    @forelse($fastEvents as $fastEvent)
                        <div id="boxFastEvent{{ $fastEvent->id }}"
                             style="padding: 4px; border: 1px solid {{ $fastEvent->color }}; background-color: {{ $fastEvent->color }}"
                             class='fc-event event text-center'
                             data-event='{"id":"{{ $fastEvent->id }}","title":"{{ $fastEvent->title }}","color":"{{ $fastEvent->color }}","start":"{{ $fastEvent->start }}","end":"{{ $fastEvent->end }}"}'>
                            {{ $fastEvent->title }}
                        </div>
                    @empty
                        <p>Não há eventos rápidos a serem visualizados</p>
                    @endforelse
                @endisset

            </div>

            <p>
                {{--                <input type='checkbox' id='drop-remove'/>--}}
                {{--                <label for='drop-remove'>remover após arrastar</label>--}}
                <button class="btn btn-sm btn-success" id="newFastEvent" style="font-size: 1em; width: 100%;">
                   *#*CRIAR TURMA*#*
                </button>
            </p>
        </div>


        <div
            id='calendar'
            data-route-load-events="{{ route('routeLoadEvents') }}"
            data-route-event-update="{{ route('routeEventUpdate') }}"
            data-route-event-store="{{ route('routeEventStore') }}"
            data-route-event-delete="{{ route('routeEventDelete') }}"

            data-route-fast-event-delete="{{ route('routeFastEventDelete') }}"
            data-route-fast-event-update="{{ route('routeFastEventUpdate') }}"
            data-route-fast-event-store="{{ route('routeFastEventStore') }}">
        </div>

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

    <script src="{{asset('assets/js/scripts.js')}}" type="text/javascript" ></script>
    <script src="{{asset('assets/js/calendar.js')}}" type="text/javascript" ></script>

@endsection

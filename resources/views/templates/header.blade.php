
    <div class="align-items-center p-3 mb-3 border-bottom shadow-sm">
        <h5>
            <a href="{{ route('dash') }}">Bússola Social</a>
            @guest
            @else
                | {{ Auth::user()->name }}
            @endguest
        </h5>

        <nav class="nav justify-content-center">

            <a class="p-2 text-dark" href="{{ route('viewGroup') }}">Ver Agenda</a>
            <a class="p-2 text-dark" href="{{ route('fullcalendar') }}">Teste com Criação de Eventos</a>



        <!-- Right Side Of Navbar -->
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        @auth
                            <a class="p-2 text-dark" href="{{ url('/home') }}">Principal</a>
                        @else
                            <a class="p-2 text-dark" href="{{ route('login') }}">Entrar</a>

                            @if (Route::has('register'))
                                <a class="p-2 text-dark" href="{{ route('register') }}">Primeiro Acesso</a>
                            @endif
                        @endauth
                    @endif
                @else
                <a class="p-2 text-dark" href="{{ route('addGroup') }}">Cadastrar Turma</a>

                <a class="p-2 text-dark" href="{{ route('addEventGroup') }}">Agendar sua Turma</a>

                        <a class="p-2 text-dark" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                @endguest

        </nav>
    </div>


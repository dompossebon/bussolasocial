<div class="panel panel-default">

    <div class="panel-body">
        <h2>
            @forelse($pessoas as $pessoa)
            {{ dd($pessoa) }} <p />
            @empty
            <small>Nao tem pessoas registradas</small>
            @endforelse <p/>
        </h2>
        <hr>
        <div>
{{--            {{ $artigo->conteudo }}--}}
        </div>
    </div>
</div>

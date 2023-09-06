@extends('layout.app.index')

@section('content')
    <section class="container-contact">

        <div class="container-contact--infos">
            <h3>Agenda</h3>
            <button class="btn btn-outline-primary">Criar Contato</button>
        </div>

        <div class="container-contacts">
            @if (count($contacts) <= 0)
                <h5>Agenda Vazia</h5>
            @else
                @foreach ($contacts as $contacts)
                    <p>SEI LA</p>
                @endforeach
            @endif
        </div>

    </section>
@endsection

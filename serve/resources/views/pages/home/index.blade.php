@extends('layout.app.index')

@section('content')
    <section class="container-contact">

        <div class="container-contact--infos">
            <h3>Agenda</h3>
            <a class="btn btn-outline-primary" href="{{ route('contact-book.create') }}">Criar Contato</a>
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

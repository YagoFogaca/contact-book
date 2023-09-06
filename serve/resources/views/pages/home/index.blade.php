@extends('layout.app.index')

@section('content')
    <section class="container-contact">

        <div class="container-contact--infos">
            <h3>Agenda</h3>
            <a class="btn btn-outline-primary" href="{{ route('contact-book.create') }}">Criar Contato</a>
        </div>

        <div class="container-contacts">
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Telefone</th>
                    <th>Editar</th>
                </tr>
                @if (count($contacts) <= 0)
                    <h5>Agenda Vazia</h5>
                @else
                    @foreach ($contacts as $contact)
                        <tr>
                            <td>{{ $contact['name'] }}</td>
                            <td>{{ $contact['email'] ?? 'Sem Email' }}</td>
                            <td>{{ $contact['phone'] ?? 'Sem telefone' }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-outline-primary dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-gear"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Editar</a></li>
                                        <li><a class="dropdown-item" href="#">Deletar</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </table>
        </div>

    </section>
@endsection

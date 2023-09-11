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
                <table>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Editar</th>
                    </tr>
                    @foreach ($contacts as $contact)
                        <tr class="contact-line">
                            <td class="contact-name">{{ $contact['name'] }}</td>
                            <td>{{ $contact['email'] ?? 'Sem Email' }}</td>
                            <td>{{ $contact['phone'] ?? 'Sem telefone' }}</td>
                            <input type="hidden" name="id-contact" value="{{ $contact['id'] }}">
                            <td>
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="#">Editar</a>
                                        </li>
                                        <li>
                                            <button type="button" class="dropdown-item btn-delete-contact">Deletar</button>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
            @endif
            </table>
        </div>
    </section>


    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Contato deletado com sucesso</strong>
                <small id="hour-deleted" class="hour-deleted"></small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body info-deleted" id="info-deleted">
            </div>
        </div>
    </div>

    <div class="alert alert-danger alert-dismissible fade" role="alert" id="alert-error">
        <p>Contato não foi excluido.</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

@endsection

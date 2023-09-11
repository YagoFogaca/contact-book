@extends('layout.app.index')

@section('content')
    <section class="container-contact">

        <div class="d-flex align-items-center">
            <a class="btn" href="{{ route('contact-book.index') }}">
                <i class="bi bi-arrow-left" style="font-size: 1.7rem;"></i>
            </a>
            <h5 style="text-align: center; margin: 0rem 1rem 0rem;">Editar o contato {{ $contact['name'] }}</h5>
        </div>

        <div>
            <div class="alert alert-success alert-dismissible fade position-absolute top-0 start-50 translate-middle-x"
                role="alert" id="alert-edit">
                <p>Contato foi atualizado.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>

        <form name="contact-edit">

            <div class="mb-3">
                <label for="name">Nome</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="José" required
                    value="{{ $contact['name'] }}">
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="contact@example.com"
                    value="{{ $contact['email'] }}">
            </div>

            <div class="mb-3">
                <label for="phone">Telefone</label>
                <input class="form-control" type="tel" name="phone" id="phone" placeholder="32988810181"
                    value="{{ $contact['phone'] }}">
            </div>
            <input type="hidden" value="{{ $contact['id'] }}" name="id_contact">

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success btn-save">Salvar</button>

                <button type="submit" class="btn btn-success btn-spinner" disabled>
                    <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                </button>

            </div>

        </form>
    </section>

    {{-- <div class="position-absolute top-50 start-50 translate-middle"> position-absolute top-50 start-50 translate-middle
    </div> --}}
@endsection

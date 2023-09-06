@extends('layout.app.index')

@section('content')
    <section class="container-contact">
        <form action={{ route('contact-book.store') }} method="POST">
            @csrf

            @error('create')
                <p class="invalid-feedback" style="display: block; text-align: center">{{ $message }}</p>
            @enderror

            <div class="mb-3">
                <label for="name">Nome</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="José" required
                    value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="contact@example.com">
            </div>

            <div class="mb-3">
                <label for="phone">Telefone</label>
                <input class="form-control" type="tel" name="phone" id="phone" placeholder="32988810181">
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success">Criar</button>
                <button type="reset" class="btn btn-danger">Limpar</button>
            </div>

        </form>
    </section>
@endsection

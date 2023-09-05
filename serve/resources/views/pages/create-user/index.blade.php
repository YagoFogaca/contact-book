@extends('layout.auth.index')

@section('content')
    <section class="card-form-user">
        <form action={{ route('user.auth') }} method="POST">
            @csrf

            <div class="mb-3">
                <label for="name">Nome</label>
                <input class="form-control" type="text" name="name" id="name" placeholder="Seu nome" required
                    value="{{ old('name') }}">
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" placeholder="Melhor Email"
                    required>
            </div>

            <div class="mb-3">
                <label for="password">Senha</label>
                <input class="form-control" type="password" name="password" id="password" placeholder="Bem dificil"
                    required>
            </div>

            <div class="mb-3">
                <p>Já é velho por aqui? <a href="{{ route('user.index') }}">Login</a> </p>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success">Criar</button>
                <button type="reset" class="btn btn-danger">Limpar</button>
            </div>

        </form>
    </section>
@endsection

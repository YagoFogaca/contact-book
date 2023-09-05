@extends('layout.auth.index')

@section('content')
    <section class="card-form-user">
        <form action={{ route('user.auth') }} method="POST">
            @csrf

            <div class="mb-3">
                <label for="email">Email</label>
                <input class="form-control" type="email" name="email" id="email" required>
            </div>

            <div class="mb-3">
                <label for="password">Senha</label>
                <input class="form-control" type="password" name="password" id="password" required>
            </div>

            <div class="mb-3">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label for="remember">Lembrar-me</label>
            </div>

            <div class="mb-3">
                <p>Novo por aqui? <a href="{{ route('user.create') }}">Criar conta</a> </p>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" class="btn btn-success">Login</button>
            </div>

        </form>
    </section>
@endsection

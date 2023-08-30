@extends('layout.auth.index')

@section('content')
    <section>
        <form action={{ route('user.auth') }} method="POST">
            @csrf

            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required>
            </div>

            <div>
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" required>
            </div>

            <div>
                <label for="remember">Lembrar-me</label>
                <input type="checkbox" name="remember" id="remember">
            </div>

            <div>
                <a href="{{ route('user.create') }}">Criar conta</a>
            </div>

            <div>
                <button type="submit">Login</button>
            </div>

        </form>
    </section>
@endsection

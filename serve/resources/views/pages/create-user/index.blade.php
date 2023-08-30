@extends('layout.auth.index')

@section('content')
    <section>
        <form action={{ route('user.store') }} method="POST">
            @csrf

            <div>
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" required value="{{ old('name') }}">
            </div>

            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" required value="{{ old('email') }}">
            </div>

            <div>
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" required value="{{ old('password') }}">
            </div>

            <div>
                <a href="{{ route('user.index') }}">Fazer Login</a>
            </div>

            <div>
                <button type="submit">Criar conta</button>
            </div>

        </form>
    </section>
@endsection

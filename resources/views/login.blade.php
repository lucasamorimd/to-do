<x-layout page="Login">
    <x-slot:btn>
        <a href="{{ route('register') }}" class="btn btn-primary">
            Registrar
        </a>
    </x-slot:btn>
    <section id="task_section">
        <h1>Login </h1>
        @if ($errors->any())
            <ul class="alert alert-error">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form method="POST" action="{{ route('login_action') }}">
            @csrf

            <x-form.text_input type="email" name="email" placeholder="Informe seu email" required="true"
                label="Email" />
            <x-form.text_input type="password" name="password" placeholder="Informe sua senha" required="true"
                label="Senha" />

            <x-form.form_button resetTxt="Limpar" submitTxt="Logar" />
        </form>
    </section>
</x-layout>

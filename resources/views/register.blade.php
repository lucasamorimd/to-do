<x-layout page="Register">
    <x-slot:btn>
        <a href="{{ route('login') }}" class="btn btn-primary">
            Login
        </a>
    </x-slot:btn>
    <section id="task_section">
        <h1>Registrar-se </h1>
        @if ($errors->any())
            <ul class="alert alert-error">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <form method="POST" action="{{ route('register_action') }}">
            @csrf
            <x-form.text_input type="text" name="name" placeholder="Qual é o seu nome?" required="true"
                label="Nome de Usuário" />
            <x-form.text_input type="email" name="email" placeholder="Informe um email" required="true"
                label="Email" />
            <x-form.text_input type="password" name="password" placeholder="Crie uma senha bem forte" required="true"
                label="Senha" />
            <x-form.text_input type="password" name="password_confirmation" placeholder="Confirme a senha criada"
                required="true" label="Confirme sua Senha" />

            <x-form.form_button resetTxt="Limpar" submitTxt="Registrar-se" />
        </form>
    </section>
</x-layout>

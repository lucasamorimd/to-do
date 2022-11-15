<x-layout page="Create">
    <x-slot:btn>
        <a href="{{ route('home') }}" class="btn btn-primary">
            Votar
        </a>
    </x-slot:btn>
    <section id="task_section">
        <h1>Criar tarefa </h1>
        <form method="POST" action="{{ route('task.create_action') }}">
            @csrf
            <x-form.text_input name="title" placeholder="Informe um título da tarefa" required="true"
                label="Título da Tarefa" />
            <x-form.text_input type="datetime-local" name="due_date" placeholder="Informe um título da tarefa" required="true"
                label="Data de Realização" />
            <x-form.select_input name="category_id" required="true" label="Categoria da tarefa">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"> {{ $category->title }}</option>
                @endforeach
            </x-form.select_input>
            <x-form.textarea_input name="description" placeholder="Descreva as ações da sua tarefa"
                label="Descrição da tarefa" />
            <x-form.form_button resetTxt="Resetar" submitTxt="Criar Tarefa" />
        </form>
    </section>
</x-layout>

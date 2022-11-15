<x-layout page="Edit">
    <x-slot:btn>
        <a href="{{ route('home') }}" class="btn btn-primary">
            Votar
        </a>
    </x-slot:btn>
    <section id="task_section">
        <h1>Editar tarefa</h1>
        <form method="POST" action="{{ route('task.edit_action') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $task->id }}" />
            <x-form.text_input name="title" placeholder="Informe um título da tarefa" required="true"
                label="Título da Tarefa" value="{{ $task->title }}" />
            <x-form.text_input type="datetime-local" name="due_date"
                required="true" label="Data de Realização" value="{{ $task->due_date }}" />
            <x-form.select_input name="category_id" required="true" label="Categoria da tarefa">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if ($category->id == $task->category_id) selected @endif>
                        {{ $category->title }}</option>
                @endforeach
            </x-form.select_input>
            <x-form.textarea_input name="description" placeholder="Descreva as ações da sua tarefa"
                label="Descrição da tarefa" value="{{ $task->description }}" />
            <x-form.checkbox_input label="Feito" name="is_done" isChecked="{{ $task->is_done }}" />
            <x-form.form_button resetTxt="Resetar" submitTxt="Atualizar Tarefa" />
        </form>
    </section>
</x-layout>

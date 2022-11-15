<x-layout>
    <x-slot:btn>
        <a href="{{ route('task.create') }}" class="btn btn-primary">
            Criar Tarefa
        </a>
    </x-slot:btn>
    <section class="graph">
        <div class="graph_header">
            <h2>Progresso do Dia</h2>
            <div class="graph_header-line"></div>
            <div class="graph_header-date">
                <a href="{{ route('home', ['filter_date' => $day_before]) }}">
                    <img src="/assets/images/icon-prev.png" alt="">
                </a>
                {{ $now_date }}
                <a href="{{ route('home', ['filter_date' => $day_next]) }}">
                    <img src="/assets/images/icon-next.png" alt="">
                </a>
            </div>
        </div>
        <div class="graph_header-subtitle">
            Tarefas: <b><span id="task_count">{{ $done_tasks_count }}</span>/{{ $tasks_count }}</b>
        </div>
        <div class="graph-placeholder">

        </div>
        <div class="tasks_left_footer">
            <img src="/assets/images/icon-info.png">
            Restam 3 tarefas para serem realizadas
        </div>
    </section>
    <section class="list">
        <div class="list_header">
            <select class="list_header-select" onchange="changeTaskStatusFilter(this)">
                <option value="all_tasks">Todas as tarefas</option>
                <option value="task_pending">Pendentes</option>
                <option value="task_done">Realizadas</option>
            </select>
        </div>
        <div class="task_list">
            @if (!empty($tasks))
                @foreach ($tasks as $task)
                    <x-task :data=$task />
                @endforeach
            @endif
        </div>
    </section>
    <script>
        function changeTaskStatusFilter(e) {
            let status = e.value;
            switch (status) {
                case 'task_pending':
                    showAllTasks();
                    document.querySelectorAll('.task_done').forEach(function(element) {
                        element.style.display = 'none';
                    })
                    break;
                case 'task_done':
                    showAllTasks();
                    document.querySelectorAll('.task_pending').forEach(function(element) {
                        element.style.display = 'none';
                    })
                    break;
                default:
                    showAllTasks();
            }
        }

        function showAllTasks() {
            document.querySelectorAll('.task').forEach(function(element) {
                element.style.display = 'flex';
            })
        }
    </script>
    <script>
        async function taskUpdate(element) {
            let status = element.checked;
            let taskId = element.dataset.id
            let url = '{{ route('task.update') }}';
            let rawResult = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-type': 'application/json',
                    'accept': 'application/json'
                },
                body: JSON.stringify({
                    status,
                    taskId,
                    _token: '{{ csrf_token() }}'
                })
            });
            let result = await rawResult.json();
            if (result.success) {
                updateCounter(status);
                alert('Task Atualizada com Sucesso');
            } else {
                element.checked = !status;
            }
        }

        function updateCounter(status) {
            let span = document.getElementById('task_count')
            if (status) {
                span.innerHTML = parseInt(span.innerHTML) + 1;
            } else {
                span.innerHTML = parseInt(span.innerHTML) - 1;
            }
            console.log(status)
        }
    </script>
</x-layout>

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{

    public function index(Request $request)
    {
    }
    public function create(Request $request)
    {
        $user = Auth::user();
        $categories = Category::where('user_id', $user->id)->get();
        $data = [];
        $data['categories'] = $categories;
        return view('tasks.create', $data);
    }
    public function create_action(Request $request)
    {
        $task = $request->only(['title', 'due_date', 'category_id', 'description']);
        $task['user_id'] = Auth::user()->id;
        Task::create($task);
        return redirect(route('home'));
    }
    public function edit(Request $request)
    {
        $task_id = $request->id;
        $task = Task::find($task_id);
        if (!$task || $task->user_id !== Auth::user()->id) {
            return redirect(route('home'));
        }
        $data['categories'] = Category::all();
        $data['task'] = $task;
        return view('tasks.edit', $data);
    }

    public function edit_action(Request $request)
    {
        $data_request = $request->only(['title', 'due_date', 'category_id', 'description']);
        $data_request['is_done'] = $request->is_done ? true : false;
        $task = Task::find($request->id);
        if (!$task || $task->user_id !== Auth::user()->id) {
            return redirect(route('home'));
        }

        $task->update($data_request);
        $task->save();
        return redirect(route('home'));
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        $task = Task::find($id);
        if ($task) {
            $task->delete();
        }
        return redirect(route('home'));
    }
    public function update(Request $request)
    {
        $task = Task::findOrFail($request->taskId);
        $task->is_done = $request->status;
        $task->save();
        return ['success' => true];
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TaskController extends Controller
{
    public function index()
    {

        //$tasks = DB::table('tasks')->get();
        $tasks = Task::all();

        return view('tasks', compact('tasks'));
    }
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Task name is required.'
        ]);
        $task_name=$request->name;

       /*DB::table('tasks')->insert([
            'name' => $_POST['name']
        ]);*/
        $task=new Task;
        $task->name = $task_name;
        $task->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->back();
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $tasks = Task::all();

        return view('tasks', compact('task', 'tasks'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:tasks,id',
            'name' => 'required'
        ], [
            'id.required' => 'Task ID is required.',
            'id.exists' => 'Task does not exist.',
            'name.required' => 'Task name is required.'
        ]);

        $task = Task::findOrFail($request->id);
        $task->name = $request->name;
        $task->save();

        return redirect('tasks');
    }
}
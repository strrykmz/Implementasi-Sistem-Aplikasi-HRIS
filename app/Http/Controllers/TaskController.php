<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create(){
        $employees = Employee::all();

        return view('tasks.create', compact('employees'));
    }

    public function store(Request $request){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'assigned_to' => 'required',
            'due_date' => 'required|date',
            'status' => 'required',
        ]);

        Task::create($validated);
        return redirect()->route('tasks.index')->with('success', 'Task created successfully. ');

    }

    public function edit(Task $task){
        $employees = Employee::all();
        return view('tasks.edit', compact('task', 'employees'));
    }

    public function update(Request $request, Task $task){
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'assigned_to' => 'required',
            'due_date' => 'required|date',
            'status' => 'required',
        ]);

        $task->update($validated);
        return redirect()->route('tasks.index')->with('success', 'Task Updated successfully. ');

    }

    public function show(Task $task){
        return view('tasks.show', compact('task'));
    }

    public function done(int $id){
        $task = Task::find($id);
        $task->update(['status' => 'done']);
        return redirect()->route('tasks.index')->with('success', 'Task Marked as Done. ');
    }

    public function pending(int $id){
        $task = Task::find($id);
        $task->update(['status' => 'pending']);
        return redirect()->route('tasks.index')->with('success', 'Task Marked as Pending. ');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task Deleted successfully. ');
    }

    public function exportTask($id)
    {
        $task = Task::with('Employee')->findOrFail($id);
        $pdf = Pdf::loadView('pdf.task_detail', compact('task'));
        return $pdf->download('task-'. $task->id . '-' . date('Ymd') . '.pdf');
    }

}

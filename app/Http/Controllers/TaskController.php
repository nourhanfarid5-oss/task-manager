<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Display Tasks
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        $query = auth()->user()->tasks();

        // Search by title
        if ($request->filled('search')) {
            $query->where(
                'title',
                'like',
                '%' . $request->search . '%'
            );
        }

        // Filter by status
        if ($request->filled('status')) {
            $query->where(
                'status',
                $request->status
            );
        }

        // Filter by priority
        if ($request->filled('priority')) {
            $query->where(
                'priority',
                $request->priority
            );
        }

        // Pagination
        $tasks = $query
            ->latest()
            ->paginate(5)
            ->withQueryString();

        return view('tasks.index', compact('tasks'));
    }


    /*
    |--------------------------------------------------------------------------
    | Show Create Form
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        return view('tasks.create');
    }


    /*
    |--------------------------------------------------------------------------
    | Store New Task
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',

            'description' => 'nullable|string',

            'status' => 'required|in:pending,completed',

            'priority' => 'required|in:low,medium,high',

            'due_date' => 'nullable|date',
        ]);

        auth()->user()->tasks()->create($validated);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task created successfully!');
    }


    /*
    |--------------------------------------------------------------------------
    | Show Task Details
    |--------------------------------------------------------------------------
    */

    public function show(Task $task)
    {
        // Make sure the task belongs to the logged-in user
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }

        return view('tasks.show', compact('task'));
    }


    /*
    |--------------------------------------------------------------------------
    | Show Edit Form
    |--------------------------------------------------------------------------
    */

    public function edit(Task $task)
    {
        // Make sure the task belongs to the logged-in user
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }

        return view('tasks.edit', compact('task'));
    }


    /*
    |--------------------------------------------------------------------------
    | Update Task
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, Task $task)
    {
        // Make sure the task belongs to the logged-in user
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:255',

            'description' => 'nullable|string',

            'status' => 'required|in:pending,completed',

            'priority' => 'required|in:low,medium,high',

            'due_date' => 'nullable|date',
        ]);

        $task->update($validated);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task updated successfully!');
    }


    /*
    |--------------------------------------------------------------------------
    | Mark Task as Completed
    |--------------------------------------------------------------------------
    */

    public function complete(Task $task)
    {
        // Make sure the task belongs to the logged-in user
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }

        $task->update([
            'status' => 'completed',
        ]);

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task marked as completed!');
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Task
    |--------------------------------------------------------------------------
    */

    public function destroy(Task $task)
    {
        // Make sure the task belongs to the logged-in user
        if ($task->user_id !== auth()->id()) {
            abort(403);
        }

        $task->delete();

        return redirect()
            ->route('tasks.index')
            ->with('success', 'Task deleted successfully!');
    }
}
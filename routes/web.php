
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;


/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';


/*
|--------------------------------------------------------------------------
| Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {

        $user = auth()->user();

        // Total Tasks
        $totalTasks = $user->tasks()->count();

        // Pending Tasks
        $pendingTasks = $user->tasks()
            ->where('status', 'pending')
            ->count();

        // Completed Tasks
        $completedTasks = $user->tasks()
            ->where('status', 'completed')
            ->count();

        // High Priority Tasks
        $highPriorityTasks = $user->tasks()
            ->where('priority', 'high')
            ->count();

        // Tasks Due Soon
        // Pending tasks due from today until the next 7 days
        $dueSoonTasks = $user->tasks()
            ->where('status', 'pending')
            ->whereNotNull('due_date')
            ->whereBetween('due_date', [
                now()->toDateString(),
                now()->addDays(7)->toDateString()
            ])
            ->count();

        return view('dashboard', compact(
            'totalTasks',
            'pendingTasks',
            'completedTasks',
            'highPriorityTasks',
            'dueSoonTasks'
        ));

    })->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | Complete Task
    |--------------------------------------------------------------------------
    */

    Route::patch(
        '/tasks/{task}/complete',
        [TaskController::class, 'complete']
    )->name('tasks.complete');


    /*
    |--------------------------------------------------------------------------
    | Tasks CRUD
    |--------------------------------------------------------------------------
    */

    Route::resource('tasks', TaskController::class);

});


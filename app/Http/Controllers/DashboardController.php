<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $totalTasks = $user->tasks()->count();

        $pendingTasks = $user->tasks()
            ->where('status', 'pending')
            ->count();

        $completedTasks = $user->tasks()
            ->where('status', 'completed')
            ->count();

        return view('home', compact(
            'totalTasks',
            'pendingTasks',
            'completedTasks'
        ));
    }
}
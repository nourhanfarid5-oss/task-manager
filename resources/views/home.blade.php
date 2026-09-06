
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">

    {{-- Header --}}
    <div class="mb-8">

        <h1 class="text-3xl font-bold text-gray-800">
            Dashboard
        </h1>

        <p class="mt-2 text-gray-500">
            Welcome back, {{ auth()->user()->name }}!
        </p>

    </div>


    {{-- Statistics --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">


        {{-- Total Tasks --}}
        <div class="bg-white rounded-xl shadow-sm p-6">

            <p class="text-gray-500 text-sm">
                Total Tasks
            </p>

            <h2 class="text-4xl font-bold text-gray-800 mt-2">
                {{ $totalTasks }}
            </h2>

        </div>


        {{-- Pending Tasks --}}
        <div class="bg-white rounded-xl shadow-sm p-6">

            <p class="text-gray-500 text-sm">
                Pending Tasks
            </p>

            <h2 class="text-4xl font-bold text-yellow-600 mt-2">
                {{ $pendingTasks }}
            </h2>

        </div>


        {{-- Completed Tasks --}}
        <div class="bg-white rounded-xl shadow-sm p-6">

            <p class="text-gray-500 text-sm">
                Completed Tasks
            </p>

            <h2 class="text-4xl font-bold text-green-600 mt-2">
                {{ $completedTasks }}
            </h2>

        </div>

    </div>


    {{-- Quick Actions --}}
    <div class="bg-white rounded-xl shadow-sm p-8 text-center">

        <h2 class="text-2xl font-semibold text-gray-800">
            Manage Your Tasks
        </h2>

        <p class="text-gray-500 mt-2 mb-6">
            Create, edit and organize your tasks easily.
        </p>


        <div class="flex justify-center gap-4 flex-wrap">

            <a
                href="{{ route('tasks.index') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg transition"
            >
                View Tasks
            </a>


            <a
                href="{{ route('tasks.create') }}"
                class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg transition"
            >
                + Add Task
            </a>

        </div>

    </div>

</div>

@endsection



@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="dashboard-page">

    {{-- Header --}}
    <div class="dashboard-header">

        <div>
            <p class="dashboard-small">
                Welcome back
            </p>

            <h1>
                Dashboard
            </h1>

            <p class="dashboard-description">
                Keep track of your tasks and stay organized.
            </p>
        </div>

        <a
            href="{{ route('tasks.create') }}"
            class="add-task-btn"
        >
            + Add Task
        </a>

    </div>


    {{-- Statistics --}}
    <div class="stats-grid">

        {{-- Total --}}
        <div class="stat-card">

            <div class="stat-icon pink">
                ✓
            </div>

            <div>
                <p>Total Tasks</p>

                <h2>
                    {{ $totalTasks }}
                </h2>
            </div>

        </div>


        {{-- Pending --}}
        <div class="stat-card">

            <div class="stat-icon yellow">
                ○
            </div>

            <div>
                <p>Pending Tasks</p>

                <h2>
                    {{ $pendingTasks }}
                </h2>
            </div>

        </div>


        {{-- Completed --}}
        <div class="stat-card">

            <div class="stat-icon green">
                ✓
            </div>

            <div>
                <p>Completed Tasks</p>

                <h2>
                    {{ $completedTasks }}
                </h2>
            </div>

        </div>


        {{-- High Priority --}}
        <div class="stat-card">

            <div class="stat-icon red">
                !
            </div>

            <div>
                <p>High Priority</p>

                <h2>
                    {{ $highPriorityTasks }}
                </h2>
            </div>

        </div>


        {{-- Due Soon --}}
        <div class="stat-card">

            <div class="stat-icon purple">
                📅
            </div>

            <div>
                <p>Due Soon</p>

                <h2>
                    {{ $dueSoonTasks }}
                </h2>
            </div>

        </div>

    </div>


    {{-- Manage Tasks --}}
    <div class="manage-card">

        <div class="manage-content">

            <div>

                <p class="manage-small">
                    Stay productive
                </p>

                <h2>
                    Manage Your Tasks
                </h2>

                <p>
                    Create, update, complete, and organize your tasks
                    from one place.
                </p>

            </div>


            <div class="manage-actions">

                <a
                    href="{{ route('tasks.index') }}"
                    class="view-btn"
                >
                    View My Tasks
                </a>

                <a
                    href="{{ route('tasks.create') }}"
                    class="create-btn"
                >
                    + Create Task
                </a>

            </div>

        </div>

    </div>


    {{-- Quick Information --}}
    <div class="info-card">

        <h3>
            Task Overview
        </h3>

        <div class="info-list">

            <div class="info-row">

                <span>
                    Pending Tasks
                </span>

                <strong>
                    {{ $pendingTasks }}
                </strong>

            </div>


            <div class="info-row">

                <span>
                    Completed Tasks
                </span>

                <strong>
                    {{ $completedTasks }}
                </strong>

            </div>


            <div class="info-row">

                <span>
                    High Priority Tasks
                </span>

                <strong>
                    {{ $highPriorityTasks }}
                </strong>

            </div>


            <div class="info-row">

                <span>
                    Tasks Due Within 7 Days
                </span>

                <strong>
                    {{ $dueSoonTasks }}
                </strong>

            </div>

        </div>

    </div>

</div>


<style>

    /* =====================================
       Page
    ===================================== */

    .dashboard-page {
        max-width: 1100px;
        margin: 0 auto;
    }


    /* =====================================
       Header
    ===================================== */

    .dashboard-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 28px;
    }


    .dashboard-small {
        color: #db2777;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 4px;
    }


    .dashboard-header h1 {
        color: #1f2937;
        font-size: 30px;
        font-weight: 700;
        margin-bottom: 5px;
    }


    .dashboard-description {
        color: #6b7280;
        font-size: 14px;
    }


    .add-task-btn {
        background: #ec4899;
        color: white;
        padding: 12px 19px;
        border-radius: 10px;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
        white-space: nowrap;
    }


    .add-task-btn:hover {
        background: #db2777;
    }


    /* =====================================
       Statistics
    ===================================== */

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 14px;
        margin-bottom: 25px;
    }


    .stat-card {
        background: white;
        border: 1px solid #f3f4f6;
        border-radius: 16px;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 13px;
        box-shadow: 0 3px 12px rgba(0,0,0,0.04);
    }


    .stat-card p {
        color: #6b7280;
        font-size: 12px;
        margin-bottom: 5px;
    }


    .stat-card h2 {
        color: #1f2937;
        font-size: 25px;
        font-weight: 700;
    }


    .stat-icon {
        width: 42px;
        height: 42px;
        flex-shrink: 0;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        font-weight: 700;
    }


    .stat-icon.pink {
        background: #fce7f3;
        color: #db2777;
    }


    .stat-icon.yellow {
        background: #fef3c7;
        color: #b45309;
    }


    .stat-icon.green {
        background: #dcfce7;
        color: #15803d;
    }


    .stat-icon.red {
        background: #fee2e2;
        color: #dc2626;
    }


    .stat-icon.purple {
        background: #f3e8ff;
        color: #7e22ce;
    }


    /* =====================================
       Manage Card
    ===================================== */

    .manage-card {
        background: white;
        border: 1px solid #f3f4f6;
        border-radius: 18px;
        padding: 28px;
        margin-bottom: 20px;
        box-shadow: 0 3px 12px rgba(0,0,0,0.04);
    }


    .manage-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 25px;
    }


    .manage-small {
        color: #db2777;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 5px;
    }


    .manage-content h2 {
        color: #1f2937;
        font-size: 21px;
        font-weight: 700;
        margin-bottom: 6px;
    }


    .manage-content p {
        color: #6b7280;
        font-size: 13px;
    }


    .manage-actions {
        display: flex;
        gap: 8px;
        flex-shrink: 0;
    }


    .view-btn,
    .create-btn {
        padding: 10px 15px;
        border-radius: 9px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
    }


    .view-btn {
        background: #f3f4f6;
        color: #374151;
    }


    .view-btn:hover {
        background: #e5e7eb;
    }


    .create-btn {
        background: #ec4899;
        color: white;
    }


    .create-btn:hover {
        background: #db2777;
    }


    /* =====================================
       Information Card
    ===================================== */

    .info-card {
        background: white;
        border: 1px solid #f3f4f6;
        border-radius: 18px;
        padding: 25px;
        box-shadow: 0 3px 12px rgba(0,0,0,0.04);
    }


    .info-card h3 {
        color: #1f2937;
        font-size: 17px;
        font-weight: 700;
        margin-bottom: 15px;
    }


    .info-list {
        display: flex;
        flex-direction: column;
    }


    .info-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px solid #f3f4f6;
    }


    .info-row:last-child {
        border-bottom: none;
    }


    .info-row span {
        color: #6b7280;
        font-size: 13px;
    }


    .info-row strong {
        color: #db2777;
        font-size: 14px;
    }


    /* =====================================
       Responsive
    ===================================== */

    @media (max-width: 1000px) {

        .stats-grid {
            grid-template-columns: repeat(3, 1fr);
        }

    }


    @media (max-width: 700px) {

        .dashboard-header {
            flex-direction: column;
            align-items: flex-start;
        }


        .add-task-btn {
            width: 100%;
            text-align: center;
        }


        .stats-grid {
            grid-template-columns: 1fr 1fr;
        }


        .manage-content {
            flex-direction: column;
            align-items: flex-start;
        }


        .manage-actions {
            width: 100%;
        }


        .view-btn,
        .create-btn {
            flex: 1;
            text-align: center;
        }

    }


    @media (max-width: 450px) {

        .stats-grid {
            grid-template-columns: 1fr;
        }

    }

</style>

@endsection


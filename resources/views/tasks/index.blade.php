
@extends('layouts.app')

@section('title', 'My Tasks')

@section('content')

<div class="tasks-page">

    {{-- Page Header --}}
    <div class="page-header">

        <div>
            <p class="page-small">
                Stay organized
            </p>

            <h1>
                My Tasks
            </h1>

            <p class="page-description">
                Manage your tasks easily.
            </p>
        </div>

        <a
            href="{{ route('tasks.create') }}"
            class="add-task-btn"
        >
            + Add Task
        </a>

    </div>


    {{-- Search & Filter --}}
    <div class="filter-card">

        <form
            method="GET"
            action="{{ route('tasks.index') }}"
            class="filter-form"
        >

            {{-- Search --}}
            <div class="search-box">

                <label for="search">
                    Search
                </label>

                <div class="input-wrapper">

                    <span>
                        🔍
                    </span>

                    <input
                        type="text"
                        id="search"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search tasks..."
                    >

                </div>

            </div>


            {{-- Status --}}
            <div class="status-box">

                <label for="status">
                    Status
                </label>

                <select
                    id="status"
                    name="status"
                >

                    <option
                        value=""
                        {{ request('status') == '' ? 'selected' : '' }}
                    >
                        All
                    </option>

                    <option
                        value="pending"
                        {{ request('status') == 'pending' ? 'selected' : '' }}
                    >
                        Pending
                    </option>

                    <option
                        value="completed"
                        {{ request('status') == 'completed' ? 'selected' : '' }}
                    >
                        Completed
                    </option>

                </select>

            </div>


            {{-- Priority --}}
            <div class="priority-box">

                <label for="priority">
                    Priority
                </label>

                <select
                    id="priority"
                    name="priority"
                >

                    <option
                        value=""
                        {{ request('priority') == '' ? 'selected' : '' }}
                    >
                        All
                    </option>

                    <option
                        value="low"
                        {{ request('priority') == 'low' ? 'selected' : '' }}
                    >
                        Low
                    </option>

                    <option
                        value="medium"
                        {{ request('priority') == 'medium' ? 'selected' : '' }}
                    >
                        Medium
                    </option>

                    <option
                        value="high"
                        {{ request('priority') == 'high' ? 'selected' : '' }}
                    >
                        High
                    </option>

                </select>

            </div>


            <button
                type="submit"
                class="search-btn"
            >
                Search
            </button>

        </form>

    </div>


    {{-- Success Message --}}
    @if(session('success'))

        <div class="success-message">
            ✓ {{ session('success') }}
        </div>

    @endif


    {{-- Tasks --}}
    @if($tasks->count() > 0)

        <div class="tasks-list">

            @foreach($tasks as $task)

                <div class="task-card">

                    {{-- Task Main --}}
                    <div class="task-main">

                        <div class="task-icon">

                            @if($task->status === 'completed')
                                ✓
                            @else
                                ○
                            @endif

                        </div>


                        <div class="task-content">

                            <div class="task-title-row">

                                <h2>
                                    {{ $task->title }}
                                </h2>


                                @if($task->status === 'completed')

                                    <span class="status completed">
                                        ✓ Completed
                                    </span>

                                @else

                                    <span class="status pending">
                                        ● Pending
                                    </span>

                                @endif

                            </div>


                            @if($task->description)

                                <p class="task-description">
                                    {{ $task->description }}
                                </p>

                            @else

                                <p class="task-description empty">
                                    No description provided.
                                </p>

                            @endif


                            {{-- Priority & Due Date --}}
                            <div class="task-meta">

                                @php
                                    $priority = $task->priority ?? 'medium';
                                @endphp

                                @if($priority === 'high')

                                    <span class="priority high">
                                        🔴 High
                                    </span>

                                @elseif($priority === 'low')

                                    <span class="priority low">
                                        🟢 Low
                                    </span>

                                @else

                                    <span class="priority medium">
                                        🟡 Medium
                                    </span>

                                @endif


                                @if($task->due_date)

                                    <span class="due-date">
                                        📅 {{ $task->due_date->format('M d, Y') }}
                                    </span>

                                @else

                                    <span class="due-date no-date">
                                        📅 No due date
                                    </span>

                                @endif

                            </div>


                            <p class="task-date">
                                Created {{ $task->created_at->format('M d, Y') }}
                            </p>

                        </div>

                    </div>


                    {{-- Actions --}}
                    <div class="task-actions">

                        <a
                            href="{{ route('tasks.show', $task) }}"
                            class="details-btn"
                        >
                            Details
                        </a>


                        <a
                            href="{{ route('tasks.edit', $task) }}"
                            class="edit-btn"
                        >
                            Edit
                        </a>


                        @if($task->status === 'pending')

                            <form
                                method="POST"
                                action="{{ route('tasks.complete', $task) }}"
                            >

                                @csrf
                                @method('PATCH')

                                <button
                                    type="submit"
                                    class="complete-btn"
                                >
                                    ✓ Complete
                                </button>

                            </form>

                        @endif


                        <form
                            method="POST"
                            action="{{ route('tasks.destroy', $task) }}"
                            onsubmit="return confirm('Are you sure you want to delete this task?');"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="delete-btn"
                            >
                                Delete
                            </button>

                        </form>

                    </div>

                </div>

            @endforeach

        </div>


        {{-- Pagination --}}
        <div class="pagination-wrapper">

            {{ $tasks->links() }}

        </div>


    @else

        {{-- Empty State --}}
        <div class="empty-card">

            <div class="empty-icon">
                📝
            </div>

            <h2>
                No Tasks Found
            </h2>

            <p>
                Create your first task to get started.
            </p>

            <a
                href="{{ route('tasks.create') }}"
                class="empty-btn"
            >
                + Create Task
            </a>

        </div>

    @endif

</div>


<style>

    /* =====================================
       Page
    ===================================== */

    .tasks-page {
        max-width: 1100px;
        margin: 0 auto;
    }


    /* =====================================
       Header
    ===================================== */

    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        margin-bottom: 25px;
    }


    .page-small {
        color: #db2777;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 4px;
    }


    .page-header h1 {
        color: #1f2937;
        font-size: 30px;
        font-weight: 700;
        margin-bottom: 5px;
    }


    .page-description {
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
       Filter
    ===================================== */

    .filter-card {
        background: white;
        border: 1px solid #f3f4f6;
        border-radius: 16px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 3px 12px rgba(0,0,0,0.04);
    }


    .filter-form {
        display: grid;
        grid-template-columns: 1fr 170px 170px auto;
        align-items: end;
        gap: 15px;
    }


    .search-box label,
    .status-box label,
    .priority-box label {
        display: block;
        color: #374151;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 7px;
    }


    .input-wrapper {
        position: relative;
    }


    .input-wrapper span {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 14px;
    }


    .input-wrapper input,
    .status-box select,
    .priority-box select {
        width: 100%;
        height: 42px;
        border: 1px solid #e5e7eb;
        border-radius: 9px;
        outline: none;
        font-size: 13px;
        background: white;
    }


    .input-wrapper input {
        padding: 0 12px 0 38px;
    }


    .status-box select,
    .priority-box select {
        padding: 0 12px;
    }


    .input-wrapper input:focus,
    .status-box select:focus,
    .priority-box select:focus {
        border-color: #ec4899;
        box-shadow: 0 0 0 3px rgba(236,72,153,0.08);
    }


    .search-btn {
        height: 42px;
        padding: 0 20px;
        background: #fce7f3;
        color: #be185d;
        border: 1px solid #fbcfe8;
        border-radius: 9px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
    }


    .search-btn:hover {
        background: #fbcfe8;
    }


    /* =====================================
       Success
    ===================================== */

    .success-message {
        background: #ecfdf5;
        color: #15803d;
        border: 1px solid #bbf7d0;
        border-radius: 10px;
        padding: 12px 15px;
        margin-bottom: 18px;
        font-size: 13px;
        font-weight: 600;
    }


    /* =====================================
       Task List
    ===================================== */

    .tasks-list {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }


    .task-card {
        background: white;
        border: 1px solid #f3f4f6;
        border-radius: 16px;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        box-shadow: 0 3px 12px rgba(0,0,0,0.04);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }


    .task-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 7px 20px rgba(236,72,153,0.09);
    }


    .task-main {
        display: flex;
        align-items: flex-start;
        gap: 15px;
        min-width: 0;
    }


    .task-icon {
        width: 45px;
        height: 45px;
        flex-shrink: 0;
        background: #fce7f3;
        color: #db2777;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
        font-weight: 700;
    }


    .task-content {
        min-width: 0;
    }


    .task-title-row {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 7px;
    }


    .task-title-row h2 {
        color: #1f2937;
        font-size: 17px;
        font-weight: 700;
    }


    /* =====================================
       Status
    ===================================== */

    .status {
        display: inline-block;
        padding: 4px 9px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }


    .status.pending {
        background: #fef3c7;
        color: #b45309;
    }


    .status.completed {
        background: #dcfce7;
        color: #15803d;
    }


    /* =====================================
       Priority
    ===================================== */

    .task-meta {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
        margin-top: 8px;
        margin-bottom: 6px;
    }


    .priority,
    .due-date {
        display: inline-block;
        padding: 4px 9px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }


    .priority.high {
        background: #fee2e2;
        color: #dc2626;
    }


    .priority.medium {
        background: #fef3c7;
        color: #b45309;
    }


    .priority.low {
        background: #dcfce7;
        color: #15803d;
    }


    .due-date {
        background: #f3e8ff;
        color: #7e22ce;
    }


    .due-date.no-date {
        background: #f3f4f6;
        color: #9ca3af;
    }


    /* =====================================
       Description
    ===================================== */

    .task-description {
        color: #6b7280;
        font-size: 13px;
        line-height: 1.6;
        margin-bottom: 7px;
        max-width: 650px;
    }


    .task-description.empty {
        color: #9ca3af;
        font-style: italic;
    }


    .task-date {
        color: #9ca3af;
        font-size: 11px;
    }


    /* =====================================
       Actions
    ===================================== */

    .task-actions {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        flex-wrap: wrap;
        gap: 7px;
        flex-shrink: 0;
    }


    .task-actions form {
        margin: 0;
    }


    .details-btn,
    .edit-btn,
    .complete-btn,
    .delete-btn {
        display: inline-block;
        padding: 8px 11px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        white-space: nowrap;
    }


    .details-btn {
        background: #f3f4f6;
        color: #374151;
    }


    .details-btn:hover {
        background: #e5e7eb;
    }


    .edit-btn {
        background: #fce7f3;
        color: #be185d;
    }


    .edit-btn:hover {
        background: #fbcfe8;
    }


    .complete-btn {
        background: #dcfce7;
        color: #15803d;
        border: none;
    }


    .complete-btn:hover {
        background: #bbf7d0;
    }


    .delete-btn {
        background: #fee2e2;
        color: #dc2626;
        border: none;
    }


    .delete-btn:hover {
        background: #fecaca;
    }


    /* =====================================
       Empty
    ===================================== */

    .empty-card {
        background: white;
        border: 1px dashed #f9a8d4;
        border-radius: 18px;
        padding: 50px 25px;
        text-align: center;
        box-shadow: 0 3px 12px rgba(0,0,0,0.03);
    }


    .empty-icon {
        font-size: 42px;
        margin-bottom: 12px;
    }


    .empty-card h2 {
        color: #1f2937;
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 7px;
    }


    .empty-card p {
        color: #6b7280;
        font-size: 14px;
        margin-bottom: 20px;
    }


    .empty-btn {
        display: inline-block;
        background: #ec4899;
        color: white;
        padding: 11px 18px;
        border-radius: 9px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
    }


    .empty-btn:hover {
        background: #db2777;
    }


    /* =====================================
       Pagination
    ===================================== */

    .pagination-wrapper {
        margin-top: 25px;
        display: flex;
        justify-content: center;
    }


    /* =====================================
       Responsive
    ===================================== */

    @media (max-width: 1000px) {

        .filter-form {
            grid-template-columns: 1fr 1fr;
        }

        .search-box {
            grid-column: 1 / -1;
        }

        .search-btn {
            width: 100%;
        }
    }


    @media (max-width: 900px) {

        .task-card {
            flex-direction: column;
            align-items: stretch;
        }


        .task-actions {
            justify-content: flex-start;
        }

    }


    @media (max-width: 700px) {

        .filter-form {
            grid-template-columns: 1fr;
        }

        .search-box {
            grid-column: auto;
        }

        .search-btn {
            width: 100%;
        }


        .page-header {
            flex-direction: column;
            align-items: flex-start;
        }


        .add-task-btn {
            width: 100%;
            text-align: center;
        }

    }

</style>

@endsection


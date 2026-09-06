
@extends('layouts.app')

@section('title', 'Task Details')

@section('content')

<div class="details-page">

    {{-- Header --}}
    <div class="details-header">

        <a href="{{ route('tasks.index') }}" class="back-btn">
            ← Back to My Tasks
        </a>

        <h1>Task Details</h1>

        <p>
            View information about your task.
        </p>

    </div>


    {{-- Task Card --}}
    <div class="details-card">

        {{-- Title & Status --}}
        <div class="title-section">

            <div>
                <h2>
                    {{ $task->title }}
                </h2>

                <p class="created-text">
                    Created {{ $task->created_at->format('M d, Y') }}
                </p>
            </div>


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


        {{-- Description --}}
        <div class="section">

            <h3>Description</h3>

            @if($task->description)

                <p class="description">
                    {{ $task->description }}
                </p>

            @else

                <p class="description empty">
                    No description provided.
                </p>

            @endif

        </div>


        {{-- Task Information --}}
        <div class="section">

            <h3>Task Information</h3>

            <div class="info-grid">

                {{-- Priority --}}
                <div class="info-item">

                    <span class="info-label">
                        Priority
                    </span>

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

                </div>


                {{-- Due Date --}}
                <div class="info-item">

                    <span class="info-label">
                        Due Date
                    </span>

                    @if($task->due_date)

                        <span class="due-date">
                            📅 {{ $task->due_date->format('M d, Y') }}
                        </span>

                    @else

                        <span class="no-date">
                            No due date
                        </span>

                    @endif

                </div>


                {{-- Created --}}
                <div class="info-item">

                    <span class="info-label">
                        Created
                    </span>

                    <span class="info-value">
                        {{ $task->created_at->format('M d, Y') }}
                    </span>

                </div>


                {{-- Last Updated --}}
                <div class="info-item">

                    <span class="info-label">
                        Last Updated
                    </span>

                    <span class="info-value">
                        {{ $task->updated_at->format('M d, Y') }}
                    </span>

                </div>


                {{-- Status --}}
                <div class="info-item">

                    <span class="info-label">
                        Status
                    </span>

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

            </div>

        </div>


        {{-- Actions --}}
        <div class="actions">

            <a
                href="{{ route('tasks.edit', $task) }}"
                class="edit-btn"
            >
                Edit Task
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
                        ✓ Mark as Completed
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
                    Delete Task
                </button>

            </form>

        </div>

    </div>

</div>


<style>

    /* =====================================
       Page
    ===================================== */

    .details-page {
        max-width: 900px;
        margin: 0 auto;
    }


    /* =====================================
       Header
    ===================================== */

    .details-header {
        margin-bottom: 25px;
    }


    .back-btn {
        display: inline-block;
        color: #be185d;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 15px;
    }


    .back-btn:hover {
        color: #db2777;
    }


    .details-header h1 {
        color: #1f2937;
        font-size: 30px;
        font-weight: 700;
        margin-bottom: 5px;
    }


    .details-header p {
        color: #6b7280;
        font-size: 14px;
    }


    /* =====================================
       Card
    ===================================== */

    .details-card {
        background: white;
        border: 1px solid #f3f4f6;
        border-radius: 18px;
        padding: 30px;
        box-shadow: 0 3px 12px rgba(0,0,0,0.04);
    }


    /* =====================================
       Title
    ===================================== */

    .title-section {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 20px;
        padding-bottom: 25px;
        border-bottom: 1px solid #f3f4f6;
    }


    .title-section h2 {
        color: #1f2937;
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 6px;
    }


    .created-text {
        color: #9ca3af;
        font-size: 12px;
    }


    /* =====================================
       Status
    ===================================== */

    .status {
        display: inline-block;
        padding: 6px 11px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
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
       Sections
    ===================================== */

    .section {
        padding: 25px 0;
        border-bottom: 1px solid #f3f4f6;
    }


    .section h3 {
        color: #374151;
        font-size: 15px;
        font-weight: 700;
        margin-bottom: 12px;
    }


    .description {
        color: #6b7280;
        font-size: 14px;
        line-height: 1.7;
        white-space: pre-line;
    }


    .description.empty {
        color: #9ca3af;
        font-style: italic;
    }


    /* =====================================
       Information
    ===================================== */

    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }


    .info-item {
        background: #fdf2f8;
        border-radius: 10px;
        padding: 14px;
    }


    .info-label {
        display: block;
        color: #9ca3af;
        font-size: 11px;
        font-weight: 600;
        margin-bottom: 7px;
    }


    .info-value {
        color: #374151;
        font-size: 13px;
        font-weight: 600;
    }


    /* =====================================
       Priority
    ===================================== */

    .priority {
        display: inline-block;
        padding: 5px 10px;
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


    /* =====================================
       Due Date
    ===================================== */

    .due-date {
        display: inline-block;
        background: #f3e8ff;
        color: #7e22ce;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
    }


    .no-date {
        color: #9ca3af;
        font-size: 12px;
        font-style: italic;
    }


    /* =====================================
       Actions
    ===================================== */

    .actions {
        display: flex;
        align-items: center;
        flex-wrap: wrap;
        gap: 8px;
        padding-top: 25px;
    }


    .actions form {
        margin: 0;
    }


    .edit-btn,
    .complete-btn,
    .delete-btn {
        display: inline-block;
        padding: 10px 14px;
        border-radius: 9px;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        border: none;
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
    }


    .complete-btn:hover {
        background: #bbf7d0;
    }


    .delete-btn {
        background: #fee2e2;
        color: #dc2626;
    }


    .delete-btn:hover {
        background: #fecaca;
    }


    /* =====================================
       Responsive
    ===================================== */

    @media (max-width: 600px) {

        .details-card {
            padding: 20px;
        }


        .title-section {
            flex-direction: column;
        }


        .info-grid {
            grid-template-columns: 1fr;
        }


        .actions {
            flex-direction: column;
            align-items: stretch;
        }


        .actions a,
        .actions button {
            width: 100%;
            text-align: center;
        }

    }

</style>

@endsection


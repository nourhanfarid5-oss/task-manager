@extends('layouts.app')

@section('title', 'Edit Task')

@section('content')

<div class="form-page">

```
<div class="form-card">

    {{-- Header --}}
    <div class="form-header">

        <div class="form-icon">
            ✎
        </div>

        <div>
            <h1>Edit Task</h1>

            <p>
                Update your task information.
            </p>
        </div>

    </div>


    {{-- Form --}}
    <form
        method="POST"
        action="{{ route('tasks.update', $task) }}"
    >

        @csrf
        @method('PUT')


        {{-- Title --}}
        <div class="form-group">

            <label for="title">
                Task Title
            </label>

            <input
                id="title"
                type="text"
                name="title"
                value="{{ old('title', $task->title) }}"
                placeholder="Enter task title..."
                required
            >

            @error('title')
                <span class="error">
                    {{ $message }}
                </span>
            @enderror

        </div>


        {{-- Description --}}
        <div class="form-group">

            <label for="description">
                Description
            </label>

            <textarea
                id="description"
                name="description"
                rows="5"
                placeholder="Describe your task..."
            >{{ old('description', $task->description) }}</textarea>

            @error('description')
                <span class="error">
                    {{ $message }}
                </span>
            @enderror

        </div>


        {{-- Status --}}
        <div class="form-group">

            <label for="status">
                Status
            </label>

            <select
                id="status"
                name="status"
                required
            >

                <option
                    value="pending"
                    {{ old('status', $task->status) === 'pending' ? 'selected' : '' }}
                >
                    Pending
                </option>

                <option
                    value="completed"
                    {{ old('status', $task->status) === 'completed' ? 'selected' : '' }}
                >
                    Completed
                </option>

            </select>

            @error('status')
                <span class="error">
                    {{ $message }}
                </span>
            @enderror

        </div>


        {{-- Priority --}}
        <div class="form-group">

            <label for="priority">
                Priority
            </label>

            <select
                id="priority"
                name="priority"
                required
            >

                <option
                    value="low"
                    {{ old('priority', $task->priority ?? 'medium') === 'low' ? 'selected' : '' }}
                >
                    🟢 Low
                </option>

                <option
                    value="medium"
                    {{ old('priority', $task->priority ?? 'medium') === 'medium' ? 'selected' : '' }}
                >
                    🟡 Medium
                </option>

                <option
                    value="high"
                    {{ old('priority', $task->priority ?? 'medium') === 'high' ? 'selected' : '' }}
                >
                    🔴 High
                </option>

            </select>

            @error('priority')
                <span class="error">
                    {{ $message }}
                </span>
            @enderror

        </div>


        {{-- Due Date --}}
        <div class="form-group">

            <label for="due_date">
                Due Date
            </label>

            <input
                id="due_date"
                type="date"
                name="due_date"
                value="{{ old('due_date', $task->due_date ? $task->due_date->format('Y-m-d') : '') }}"
            >

            @error('due_date')
                <span class="error">
                    {{ $message }}
                </span>
            @enderror

        </div>


        {{-- Buttons --}}
        <div class="form-actions">

            <a
                href="{{ route('tasks.index') }}"
                class="cancel-btn"
            >
                Cancel
            </a>


            <button
                type="submit"
                class="save-btn"
            >
                Save Changes
            </button>

        </div>

    </form>

</div>
```

</div>

<style>

    /* =====================================
       Form Page
    ===================================== */

    .form-page {
        max-width: 750px;
        margin: 0 auto;
    }


    .form-card {
        background: white;
        border: 1px solid #fbcfe8;
        border-radius: 18px;
        padding: 35px;
        box-shadow: 0 4px 15px rgba(236, 72, 153, 0.07);
    }


    /* =====================================
       Header
    ===================================== */

    .form-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 30px;
    }


    .form-icon {
        width: 55px;
        height: 55px;
        background: #fce7f3;
        color: #db2777;
        border-radius: 14px;

        display: flex;
        align-items: center;
        justify-content: center;

        font-size: 25px;
        font-weight: 700;
    }


    .form-header h1 {
        font-size: 26px;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 5px;
    }


    .form-header p {
        color: #6b7280;
        font-size: 14px;
    }


    /* =====================================
       Form Fields
    ===================================== */

    .form-group {
        margin-bottom: 22px;
    }


    .form-group label {
        display: block;
        color: #374151;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 8px;
    }


    .form-group input,
    .form-group textarea,
    .form-group select {

        width: 100%;

        padding: 12px 14px;

        border: 1px solid #e5e7eb;

        border-radius: 10px;

        outline: none;

        font-size: 14px;

        background: white;

        font-family: Arial, sans-serif;

    }


    .form-group textarea {
        resize: vertical;
    }


    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {

        border-color: #ec4899;

        box-shadow:
            0 0 0 3px
            rgba(236, 72, 153, 0.10);

    }


    /* =====================================
       Errors
    ===================================== */

    .error {
        display: block;
        color: #dc2626;
        font-size: 13px;
        margin-top: 6px;
    }


    /* =====================================
       Buttons
    ===================================== */

    .form-actions {

        display: flex;

        justify-content: flex-end;

        gap: 10px;

        margin-top: 30px;

    }


    .cancel-btn,
    .save-btn {

        padding: 11px 18px;

        border-radius: 9px;

        font-size: 14px;

        font-weight: 600;

        text-decoration: none;

        cursor: pointer;

    }


    .cancel-btn {

        background: #f3f4f6;

        color: #374151;

    }


    .cancel-btn:hover {

        background: #e5e7eb;

    }


    .save-btn {

        background: #ec4899;

        color: white;

        border: none;

    }


    .save-btn:hover {

        background: #db2777;

    }


    /* =====================================
       Responsive
    ===================================== */

    @media (max-width: 600px) {

        .form-card {
            padding: 25px;
        }


        .form-actions {

            flex-direction: column;

        }


        .cancel-btn,
        .save-btn {

            width: 100%;

            text-align: center;

        }

    }

</style>

@endsection

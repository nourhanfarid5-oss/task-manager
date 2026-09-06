@extends('layouts.app')

@section('title', 'Create Task')

@section('content')

<div class="create-page">

```
{{-- Page Header --}}
<div class="page-header">
    <a href="{{ route('tasks.index') }}" class="back-link">
        ← Back to My Tasks
    </a>

    <h1>Create New Task</h1>

    <p>
        Add a new task and stay organized.
    </p>
</div>


{{-- Create Form --}}
<div class="form-card">

    <form
        method="POST"
        action="{{ route('tasks.store') }}"
    >

        @csrf


        {{-- Title --}}
        <div class="form-group">

            <label for="title">
                Task Title
            </label>

            <input
                type="text"
                id="title"
                name="title"
                value="{{ old('title') }}"
                placeholder="e.g. Learn Laravel"
                required
            >

            @error('title')
                <p class="error">
                    {{ $message }}
                </p>
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
                placeholder="What do you need to accomplish?"
            >{{ old('description') }}</textarea>

            @error('description')
                <p class="error">
                    {{ $message }}
                </p>
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
                    {{ old('status', 'pending') === 'pending' ? 'selected' : '' }}
                >
                    Pending
                </option>

                <option
                    value="completed"
                    {{ old('status') === 'completed' ? 'selected' : '' }}
                >
                    Completed
                </option>

            </select>

            @error('status')
                <p class="error">
                    {{ $message }}
                </p>
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
                    {{ old('priority', 'medium') === 'low' ? 'selected' : '' }}
                >
                    🟢 Low
                </option>

                <option
                    value="medium"
                    {{ old('priority', 'medium') === 'medium' ? 'selected' : '' }}
                >
                    🟡 Medium
                </option>

                <option
                    value="high"
                    {{ old('priority', 'medium') === 'high' ? 'selected' : '' }}
                >
                    🔴 High
                </option>

            </select>

            @error('priority')
                <p class="error">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Due Date --}}
        <div class="form-group">

            <label for="due_date">
                Due Date
            </label>

            <input
                type="date"
                id="due_date"
                name="due_date"
                value="{{ old('due_date') }}"
            >

            <small>
                Optional — choose a deadline for this task.
            </small>

            @error('due_date')
                <p class="error">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- Actions --}}
        <div class="form-actions">

            <a
                href="{{ route('tasks.index') }}"
                class="cancel-btn"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="create-btn"
            >
                + Create Task
            </button>

        </div>

    </form>

</div>
```

</div>

<style>

    .create-page {
        max-width: 750px;
        margin: 0 auto;
    }


    .page-header {
        margin-bottom: 25px;
    }


    .back-link {
        display: inline-block;
        margin-bottom: 15px;
        color: #db2777;
        text-decoration: none;
        font-size: 14px;
        font-weight: 600;
    }


    .back-link:hover {
        color: #be185d;
    }


    .page-header h1 {
        font-size: 30px;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 7px;
    }


    .page-header p {
        color: #6b7280;
        font-size: 15px;
    }


    .form-card {
        background: white;
        border: 1px solid #fbcfe8;
        border-radius: 18px;
        padding: 35px;
        box-shadow:
            0 4px 15px rgba(236, 72, 153, 0.07);
    }


    .form-group {
        margin-bottom: 22px;
    }


    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #374151;
        font-size: 14px;
        font-weight: 700;
    }


    .form-group input,
    .form-group textarea,
    .form-group select {
        width: 100%;
        border: 1px solid #e5e7eb;
        border-radius: 10px;
        padding: 12px 14px;
        font-size: 14px;
        color: #374151;
        background: white;
        outline: none;
        transition: 0.2s;
        font-family: Arial, sans-serif;
    }


    .form-group textarea {
        resize: vertical;
    }


    .form-group input:focus,
    .form-group textarea:focus,
    .form-group select:focus {
        border-color: #f472b6;
        box-shadow: 0 0 0 3px #fce7f3;
    }


    .form-group input::placeholder,
    .form-group textarea::placeholder {
        color: #9ca3af;
    }


    .form-group small {
        display: block;
        margin-top: 6px;
        color: #9ca3af;
        font-size: 12px;
    }


    .error {
        margin-top: 6px;
        color: #dc2626;
        font-size: 13px;
    }


    .form-actions {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 10px;
        padding-top: 10px;
        border-top: 1px solid #f3f4f6;
    }


    .cancel-btn,
    .create-btn {
        padding: 11px 18px;
        border-radius: 9px;
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
    }


    .cancel-btn {
        background: #f9fafb;
        color: #6b7280;
        border: 1px solid #e5e7eb;
    }


    .cancel-btn:hover {
        background: #f3f4f6;
    }


    .create-btn {
        background: #db2777;
        color: white;
        border: none;
    }


    .create-btn:hover {
        background: #be185d;
    }


    @media (max-width: 650px) {

        .form-card {
            padding: 25px;
        }

        .page-header h1 {
            font-size: 24px;
        }

        .form-actions {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .cancel-btn,
        .create-btn {
            width: 100%;
            text-align: center;
        }

    }

</style>

@endsection

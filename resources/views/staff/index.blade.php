<!DOCTYPE html>
<html>
<head>
    <title>Staff</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #1e3c72, #2a5298);
            margin: 0;
            padding: 40px;
        }

        h1 {
            color: white;
            text-align: center;
        }

        h2 {
            margin-bottom: 15px;
        }

        .back-btn {
            display: inline-block;
            margin-bottom: 20px;
            color: white;
            text-decoration: none;
            font-weight: bold;
        }

        .container {
            width: 70%;
            margin: auto;
        }

        .card {
            background: white;
            padding: 20px;
            margin: 20px 0;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }

        input, select {
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #ccc;
            width: 100%;
            margin-bottom: 10px;
        }

        button {
            padding: 10px 18px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn-primary {
            background: #007bff;
            color: white;
        }

        .btn-success {
            background: #28a745;
            color: white;
        }

        .staff-list {
            margin-top: 15px;
        }

        .staff-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px;
            background: #f9f9f9;
            margin: 8px 0;
            border-radius: 8px;
        }

        .edit-link {
            background: #ffc107;
            padding: 6px 12px;
            border-radius: 5px;
            text-decoration: none;
            color: black;
            font-weight: bold;
        }

        .status-active {
            color: green;
            font-weight: bold;
        }

        .status-inactive {
            color: red;
            font-weight: bold;
        }

    </style>
</head>
<body>

<div class="container">

    <h1>Staff Management</h1>
    <a href="{{ route('admin.dashboard') }}" class="back-btn">← Back to Dashboard</a>

@unless(isset($staff))
<div class="card">
    <h2>Add Staff</h2>
    <form method="POST" action="{{ route('staff.save') }}">
        @csrf

        <input type="text" name="first_name" placeholder="First Name">
        <input type="text" name="position" placeholder="Position">

        <button type="submit" class="btn-primary">Add Staff</button>
    </form>
</div>
@endunless


@isset($staff)
<div class="card">
    <h2>Edit Staff</h2>

    <form method="POST" action="{{ route('staff.update', $staff->id) }}">
        @csrf

        <input type="text" name="first_name" value="{{ $staff->first_name }}" placeholder="First Name">

        <input type="text" name="last_name" value="{{ $staff->last_name }}" placeholder="Last Name">

        <input type="text" name="position" value="{{ $staff->position }}" placeholder="Position">

        <input type="text" name="address" value="{{ $staff->address }}" placeholder="Address">

        <select name="status">
            <option value="Active" {{ $staff->status == 'Active' ? 'selected' : '' }}>Active</option>
            <option value="Inactive" {{ $staff->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
        </select>

        <button type="submit" class="btn-success">Update Staff</button>
    </form>
</div>
@endisset


<div class="card">
    <h2>Staff List</h2>
    <div class="staff-list">
        @foreach($staffList as $s)
            <div class="staff-item">
                <div>
                    <strong>{{ $s->first_name }}</strong>
                    - {{ $s->position }}
                    |
                    <span class="{{ $s->status == 'Active' ? 'status-active' : 'status-inactive' }}">
                        {{ $s->status }}
                    </span>
                </div>

                <a class="edit-link" href="{{ route('staff.edit', $s->id) }}">Edit</a>
            </div>
        @endforeach
    </div>
</div>

</div>

</body>
</html>
<h1 class="title">Teacher Management</h1>
<a href="{{ route('admin.dashboard') }}" class="back-btn">← Back to Dashboard</a>

<div class="container">

    {{-- ADD TEACHER --}}
    @unless(isset($teacher))
    <div class="card">
        <h2>Add Teacher</h2>

        <form action="{{ route('teachers.save') }}" method="POST">
            @csrf

            <div class="form-grid">
                <input type="text" name="first_name" placeholder="First Name" required>
                <input type="text" name="middle_initial" placeholder="Middle Initial">
                <input type="text" name="last_name" placeholder="Last Name" required>
                <input type="number" name="age" placeholder="Age" required>
                <input type="text" name="subject" placeholder="Subject" required>
                <input type="text" name="address" placeholder="Address">

                <select name="status">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn-primary">Add Teacher</button>
        </form>
    </div>
    @endunless


    {{-- EDIT TEACHER --}}
    @isset($teacher)
    <div class="card">
        <h2>Edit Teacher</h2>

        <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
            @csrf

            <div class="form-grid">
                <input type="text" name="first_name" value="{{ $teacher->first_name }}" required>
                <input type="text" name="middle_initial" value="{{ $teacher->middle_initial }}">
                <input type="text" name="last_name" value="{{ $teacher->last_name }}" required>
                <input type="number" name="age" value="{{ $teacher->age }}" required>
                <input type="text" name="subject" value="{{ $teacher->subject }}" required>
                <input type="text" name="address" value="{{ $teacher->address }}">

                <select name="status">
                    <option value="Active" {{ $teacher->status == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ $teacher->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <button type="submit" class="btn-success">Update Teacher</button>
        </form>
    </div>
    @endisset


    {{-- TEACHER LIST --}}
    <div class="card">
        <h2>Teacher List</h2>

        @foreach($teachers as $t)
            <div class="list-item">
                <div>
                    <strong>
                        {{ $t->first_name }}
                        {{ $t->middle_initial }}
                        {{ $t->last_name }}
                    </strong>
                    <br>
                    {{ $t->subject }} | 
                    <span class="{{ $t->status == 'Active' ? 'status-active' : 'status-inactive' }}">
                        {{ $t->status }}
                    </span>
                </div>

                <a href="{{ route('teachers.edit', $t->id) }}" class="edit-btn">Edit</a>
            </div>
        @endforeach
    </div>

</div>

<style>
body {
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    margin: 0;
    padding: 20px;
}

.title {
    color: white;
    text-align: center;
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

.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 10px;
    margin-bottom: 15px;
}

input, select {
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
}

.btn-primary {
    background: #007bff;
    color: white;
    padding: 10px 18px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}

.btn-success {
    background: #28a745;
    color: white;
    padding: 10px 18px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}

.list-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px;
    background: #f9f9f9;
    margin: 8px 0;
    border-radius: 8px;
}

.edit-btn {
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
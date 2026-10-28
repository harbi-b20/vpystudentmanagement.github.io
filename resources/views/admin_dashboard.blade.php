@extends('layouts.app')

@section('content')

<style>
body {
    font-family: Arial, sans-serif;
}

.top-nav {
    margin-bottom: 20px;
}

.menu-btn {
    display: inline-block;
    padding: 10px 18px;
    background: #0d6efd;
    color: white;
    border-radius: 8px;
    text-decoration: none;
    margin-right: 10px;
    font-weight: bold;
}

.menu-btn:hover {
    background: #0b5ed7;
}

.logout {
    float: right;
}

.section {
    display: none;
    margin-top: 20px;
}

.section.active {
    display: block;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 15px;
}

th {
    background: #28a745;
    color: white;
    padding: 10px;
}

td {
    padding: 8px;
    border-bottom: 1px solid #ddd;
}

.btn-edit {
    background: #0d6efd;
    color: white;
    padding: 6px 12px;
    border-radius: 6px;
    text-decoration: none;
    font-size: 14px;
    border: none;
    cursor: pointer;
}

.btn-edit:hover {
    background: #0b5ed7;
}

.btn-delete {
    background: #dc3545;
    color: white;
    border: none;
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 14px;
    cursor: pointer;
}

.btn-delete:hover {
    background: #bb2d3b;
}

form.inline {
    display: inline;
}

/* Seating */
.seating-container {
    margin-top: 25px;
}

.seating-table {
    border-collapse: separate;
    border-spacing: 10px;
}

.seat {
    width: 140px;
    height: 70px;
    background: #f1f3f5;
    border-radius: 10px;
    text-align: center;
    vertical-align: middle;
    font-size: 13px;
    padding: 8px;
    transition: 0.2s;
}

.seat:hover {
    background: #dbeafe;
    transform: scale(1.05);
}

.seat a {
    text-decoration: none;
    color: #111;
    font-weight: bold;
}

.top-nav {
    display: flex;
    gap: 10px;
    margin-bottom: 20px;
}

.nav-btn {
    background: #0d6efd;
    color: white;
    padding: 8px 14px;
    border-radius: 6px;
    text-decoration: none;
    border: none;
    cursor: pointer;
    font-size: 14px;
}

.nav-btn:hover {
    background: #0b5ed7;
}

.add-btn {
    background: #198754;
}

.add-btn:hover {
    background: #157347;
}

/* MODAL */
.modal {
    display: none;
    position: fixed;
    z-index: 999;
    left: 0; top: 0;
    width: 100%; height: 100%;
    background: rgba(0,0,0,0.4);
}

.modal-content {
    background: white;
    margin: 5% auto;
    padding: 25px;
    border-radius: 10px;
    width: 600px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
}

.close {
    float: right;
    font-size: 22px;
    cursor: pointer;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 10px;
    margin-top: 15px;
}

.form-grid input,
.form-grid select {
    padding: 8px;
    border-radius: 6px;
    border: 1px solid #ccc;
}

.save-btn {
    margin-top: 15px;
    width: 100%;
    padding: 10px;
    background: #0d6efd;
    color: white;
    border: none;
    border-radius: 6px;
}
</style>


<h1>Admin Dashboard</h1>

<div class="logout">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn-delete">Logout</button>
    </form>
</div>

<div class="top-nav">
    <a href="#dashboard" class="menu-btn">Dashboard</a>
    <a href="#students" class="menu-btn">Students</a>
    <a href="#staff" class="menu-btn">Staff</a>
    <a href="#teachers" class="menu-btn">Teachers</a>

     <!-- ADD STUDENT BUTTON -->
    <button class="nav-btn add-btn" onclick="openModal()">
        + Add Student
    </button>
</div>

<div id="addStudentModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>

        <h2>Add Student</h2>

        <form method="POST" action="{{ route('students.save') }}">
            @csrf

            <div class="form-grid">
                <input type="text" name="first_name" placeholder="First Name" required>
                <input type="text" name="mi" placeholder="MI">
                <input type="text" name="last_name" placeholder="Last Name" required>
                <input type="number" name="age" placeholder="Age">
                <input type="text" name="address" placeholder="Address">
                <input type="text" name="lrn" placeholder="LRN">
                <input type="number" name="math_1st" placeholder="Math 1">
                <input type="number" name="math_2nd" placeholder="Math 2">

            </div>

            <button type="submit" class="save-btn">Save Student</button>
        </form>
    </div>
</div>
<!-- dashbaordddddddd -->
<div id="dashboard-section" class="section active">
    <h2>Overview</h2>
    <table>
        <tr><th>Type</th><th>Count</th></tr>
        <tr><td>Students</td><td>{{ count($students) }}</td></tr>
        <tr><td>Staff</td><td>{{ count($staff) }}</td></tr>
        <tr><td>Teachers</td><td>{{ count($teachers) }}</td></tr>
    </table>
</div>

<!-- zstudentz -->
<div id="students-section" class="section">

      
    </form>

    <h2>Students List</h2>

    <table>
        <tr>
            <th>ID</th><th>First Name</th><th>MI</th><th>Last Name</th>
            <th>Age</th><th>Address</th><th>LRN</th>
            <th>Math 1</th><th>Math 2</th><th>Average</th>
            <th>Academic Awards</th><th>Actions</th>
        </tr>

        @foreach($students as $s)
        <tr>
            <td>{{ $s->id }}</td>
            <td>{{ $s->first_name }}</td>
            <td>{{ $s->middle_initial }}</td>
            <td>{{ $s->last_name }}</td>
            <td>{{ $s->age }}</td>
            <td>{{ $s->address }}</td>
            <td>{{ $s->lrn }}</td>
            <td>{{ $s->math_1st }}</td>
            <td>{{ $s->math_2nd }}</td>
            <td>{{ $s->general_average }}</td>
            <td>{{ $s->status }}</td>
            <td>
                <a href="{{ route('students.edit', $s->id) }}" class="btn-edit">Edit</a>

                <form method="POST" action="{{ route('students.delete', $s->id) }}" class="inline">
                    @csrf
                    <button type="submit" class="btn-delete">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    <!-- seat arrangemtns -->
    <div class="seating-container">
        <h2>Seating Arrangement</h2>

        @php
            $shuffled = $students->shuffle();
            $cols = 5;
            $rows = ceil($shuffled->count() / $cols);
        @endphp

        <table class="seating-table">
            @for($r = 0; $r < $rows; $r++)
                <tr>
                    @for($c = 0; $c < $cols; $c++)
                        @php $index = $r * $cols + $c; @endphp
                        <td class="seat">
                            @if(isset($shuffled[$index]))
                                <a href="{{ route('students.edit', $shuffled[$index]->id) }}">
                                    Seat {{ $index + 1 }} <br>
                                    {{ $shuffled[$index]->first_name }}
                                    {{ $shuffled[$index]->last_name }}
                                </a>
                            @endif
                        </td>
                    @endfor
                </tr>
            @endfor
        </table>
    </div>
</div>

<!-- staffzgfahjw -->
<div id="staff-section" class="section">
    <h2>Add Staff</h2>

    <form method="POST" action="{{ route('staff.save') }}">
        @csrf
        <input type="text" name="first_name" placeholder="First Name" required>
        <input type="text" name="last_name" placeholder="Last Name" required>
        <input type="text" name="position" placeholder="Position" required>
        <input type="text" name="address" placeholder="Address" required>

        <select name="status">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select>

        <button type="submit" class="btn-edit">Add Staff</button>
    </form>

    <h2>Staff List</h2>

    <table>
        <tr>
            <th>ID</th><th>First Name</th><th>Last Name</th>
            <th>Position</th><th>Address</th><th>Status</th><th>Actions</th>
        </tr>

        @foreach($staff as $s)
        <tr>
            <td>{{ $s->id }}</td>
            <td>{{ $s->first_name }}</td>
            <td>{{ $s->last_name }}</td>
            <td>{{ $s->position }}</td>
            <td>{{ $s->address }}</td>
            <td>{{ $s->status }}</td>
            <td>
                <a href="{{ route('staff.edit', $s->id) }}" class="btn-edit">Edit</a>

                <form method="POST" action="{{ route('staff.delete', $s->id) }}" class="inline">
                    @csrf
                    <button type="submit" class="btn-delete">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

<!-- maestro , maestra, bisag kinsa -->
<div id="teachers-section" class="section">
    <h2>Add Teacher</h2>

    <form method="POST" action="{{ route('teachers.save') }}">
        @csrf
        <input type="text" name="first_name" placeholder="First Name" required>
        <input type="text" name="middle_initial" placeholder="MI">
        <input type="text" name="last_name" placeholder="Last Name" required>
        <input type="number" name="age" placeholder="Age" required>
        <input type="text" name="address" placeholder="Address" required>
        <input type="text" name="subject" placeholder="Subject" required>

        <select name="status">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>
        </select>

        <button type="submit" class="btn-edit">Add Teacher</button>
    </form>

    <h2>Teachers List</h2>

    <table>
        <tr>
            <th>ID</th><th>First Name</th><th>Last Name</th>
            <th>Age</th><th>Address</th><th>Subject</th>
            <th>Status</th><th>Actions</th>
        </tr>

        @foreach($teachers as $t)
        <tr>
            <td>{{ $t->id }}</td>
            <td>{{ $t->first_name }}</td>
            <td>{{ $t->last_name }}</td>
            <td>{{ $t->age }}</td>
            <td>{{ $t->address }}</td>
            <td>{{ $t->subject }}</td>
            <td>{{ $t->status }}</td>
            <td>
                <a href="{{ route('teachers.edit', $t->id) }}" class="btn-edit">Edit</a>

                <form method="POST" action="{{ route('teachers.delete', $t->id) }}" class="inline">
                    @csrf
                    <button type="submit" class="btn-delete">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>

<script>
document.querySelectorAll('.menu-btn').forEach(btn => {
    btn.addEventListener('click', e => {
        e.preventDefault();
        document.querySelectorAll('.section').forEach(sec => sec.classList.remove('active'));
        const id = btn.getAttribute('href').replace('#','') + '-section';
        document.getElementById(id).classList.add('active');
    });
});

function openModal() {
    document.getElementById('addStudentModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('addStudentModal').style.display = 'none';
}

</script>

@endsection
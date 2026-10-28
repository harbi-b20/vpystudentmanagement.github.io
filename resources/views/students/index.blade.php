@extends('layouts.app')

@section('content')

<h1>Students</h1>

<a href="{{ route('admin.dashboard') }}" class="dashboard-btn">
    ← Back to Admin Dashboard
</a>

<h3>Seating Arrangement</h3>

<div class="seating-grid">
@foreach($students as $student)
    <a href="{{ route('students.edit', $student->id) }}"
       class="student-seat"
       data-initials="{{ strtoupper(substr($student->first_name,0,1) . substr($student->last_name,0,1)) }}">

        {{ $student->first_name }}<br>
        <strong>{{ $student->last_name }}</strong>

    </a>
@endforeach
</div>

<hr>

<h2>Students List</h2>

<table border="1" width="100%">
    <tr>
        <th>Name</th>
        <th>Actions</th>
    </tr>

@foreach($students as $s)
<tr>
    <td>{{ $s->first_name }} {{ $s->last_name }}</td>
    <td>
        <a href="{{ route('students.edit', $s->id) }}">Edit</a>
    </td>
</tr>
@endforeach

</table>

<style>
    .student-seat::before {
    content: attr(data-initials);
    display: block;
    width: 36px;
    height: 36px;
    margin: 0 auto 6px;
    border-radius: 50%;
    background: #3498db;
    color: white;
    line-height: 36px;
    font-weight: bold;
}
    .seating-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
    gap: 12px;
    margin-top: 15px;
}

.student-seat {
    display: block;
    text-decoration: none;
    background: #f8f9fa;
    border: 1px solid #ddd;
    border-radius: 10px;
    padding: 10px;
    text-align: center;
    font-size: 14px;
    color: #2c3e50;
    transition: 0.2s ease;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
}

.student-seat:hover {
    background: #3498db;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}
.classroom {
    display: grid;
    grid-template-columns: repeat(6, 1fr);
    gap: 10px;
    max-width: 800px;
}

.seat {
    display: block;
    padding: 15px;
    background: #28a745;
    color: white;
    text-align: center;
    border-radius: 8px;
    text-decoration: none;
    font-weight: bold;
}

.seat:hover {
    background: #218838;
    transform: scale(1.05);
}

.btn-back {
    text-decoration: none;
    color: #0d6efd;
    font-weight: bold;
}

.dashboard-btn {
    display: inline-block;
    padding: 10px 18px;
    background-color: #2c3e50;
    color: #fff;
    text-decoration: none;
    border-radius: 6px;
    margin-bottom: 20px;
    transition: 0.3s;
}

.dashboard-btn:hover {
    background-color: #1a252f;
}

</style>

@endsection
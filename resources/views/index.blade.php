@extends('layouts.app')

@section('content')

<h1>Students</h1>

<a href="{{ route('dashboard') }}" class="btn-back">← Back</a>

<h2>Add Student</h2>

<form method="POST" action="{{ route('students.save') }}">
    @csrf
    <input name="first_name" placeholder="First Name" required>
    <input name="last_name" placeholder="Last Name" required>
    <button type="submit">Add</button>
</form>

<hr>

<h2>Seating Arrangement</h2>

<div class="seats">
@foreach($students as $s)
    <a href="{{ route('students.edit', $s->id) }}" class="seat">
        {{ $s->first_name }}
    </a>
@endforeach
</div>

<hr>

<h2>Students List</h2>

<table>
@foreach($students as $s)
<tr>
    <td>{{ $s->first_name }}</td>
    <td>
        <a href="{{ route('students.edit', $s->id) }}">Edit</a>
    </td>
</tr>
@endforeach
</table>

<style>
.seats { display:flex; flex-wrap:wrap; gap:10px; }
.seat {
    display:inline-block;
    padding:15px;
    background:#28a745;
    color:white;
    border-radius:6px;
    text-decoration:none;
}
.btn-back { text-decoration:none; }
</style>

@endsection
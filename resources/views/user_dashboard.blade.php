<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6fb;
            margin: 0;
        }

        .header {
            background: #1976D2;
            color: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h2 {
            margin: 0;
        }

        .logout-btn {
            background: white;
            color: #1976D2;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }

        .container {
            padding: 30px;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 8px;
            margin-bottom: 25px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .seat-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 10px;
            margin-top: 15px;
        }

        .seat {
            background: #1976D2;
            color: white;
            padding: 15px;
            text-align: center;
            border-radius: 6px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>Welcome, {{ $user->username }}</h2>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="logout-btn">Logout</button>
        </form>
    </div>

    <div class="container">

        <div class="card">
            <h3>Classmates</h3>

        <ul>
@foreach($classmates as $student)
    <li>
        {{ $student->first_name }} 
        {{ $student->middle_initial }}. 
        {{ $student->last_name }}
    </li>
@endforeach
</ul>
        </div>

        <div class="card">
            <h3>Seating Arrangement</h3>

<div class="seat-grid">
@foreach($classmates as $student)
    <div class="seat">
        {{ $student->first_name }} <br>
        {{ $student->last_name }}
    </div>
@endforeach
</div>
        </div>

    </div>

</body>
</html>
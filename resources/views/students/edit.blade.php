<h1 class="page-title">Edit Student</h1>

<a href="{{ route('students') }}" class="back-link">← Back to Students</a>

<div class="edit-card">
    <form method="POST" action="{{ route('students.update', $student->id) }}">
        @csrf

        <div class="form-grid">

            <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" value="{{ $student->first_name }}">
            </div>

            <div class="form-group">
                <label>Middle Initial</label>
                <input type="text" name="middle_initial" value="{{ $student->middle_initial }}">
            </div>

            <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" value="{{ $student->last_name }}">
            </div>

            <div class="form-group">
                <label>Age</label>
                <input type="number" name="age" value="{{ $student->age }}">
            </div>

            <div class="form-group">
                <label>Address</label>
                <input type="text" name="address" value="{{ $student->address }}">
            </div>

            <div class="form-group">
                <label>LRN</label>
                <input type="text" name="lrn" value="{{ $student->lrn }}">
            </div>

            <div class="form-group">
                <label>Math 1</label>
                <input type="number" id="math1" name="math_1st" value="{{ $student->math_1st }}">
            </div>

            <div class="form-group">
                <label>Math 2</label>
                <input type="number" id="math2" name="math_2nd" value="{{ $student->math_2nd }}">
            </div>

            <div class="form-group">
                <label>General Average</label>
                <input type="number" id="average" value="{{ $student->general_average }}" readonly>
            </div>

            <div class="form-group">
                <label>Status</label>
                <select name="status">
                    <option value="Active" {{ $student->status == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ $student->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

        </div>

        <!-- Hidden input so average is saved -->
        <input type="hidden" name="general_average" id="hidden_average">

        <button type="submit" class="update-btn">Update Student</button>
    </form>
</div>

<script>
function computeAverage() {
    let m1 = parseFloat(document.getElementById('math1').value) || 0;
    let m2 = parseFloat(document.getElementById('math2').value) || 0;

    let avg = (m1 + m2) / 2;

    document.getElementById('average').value = avg.toFixed(2);
    document.getElementById('hidden_average').value = avg.toFixed(2);
}

document.getElementById('math1').addEventListener('input', computeAverage);
document.getElementById('math2').addEventListener('input', computeAverage);

computeAverage();
</script>

<style>
body {
    font-family: Arial, sans-serif;
    background: linear-gradient(135deg, #1e3c72, #2a5298);
    margin: 0;
    padding: 40px;
}

.page-title {
    color: white;
    text-align: center;
    margin-bottom: 10px;
}

.back-link {
    display: inline-block;
    margin-bottom: 20px;
    text-decoration: none;
    color: white;
    font-weight: bold;
}

.edit-card {
    background: white;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    max-width: 1000px;
    margin: auto;
}

.form-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 15px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group label {
    font-size: 13px;
    margin-bottom: 5px;
    font-weight: bold;
    color: #555;
}

.form-group input,
.form-group select {
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
}

.update-btn {
    margin-top: 20px;
    padding: 12px 20px;
    border: none;
    border-radius: 8px;
    background-color: #28a745;
    color: white;
    font-weight: bold;
    cursor: pointer;
}

.update-btn:hover {
    background-color: #218838;
}
</style>
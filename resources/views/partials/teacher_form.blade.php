<form method="POST" action="{{ route('admin.teacher.save') }}">
    @csrf
    <input type="hidden" name="id" value="{{ $editTeacher->id ?? '' }}">

    <input type="text" name="first_name" placeholder="First Name" value="{{ $editTeacher->first_name ?? '' }}">
    <input type="text" name="last_name" placeholder="Last Name" value="{{ $editTeacher->last_name ?? '' }}">
    <input type="text" name="subject" placeholder="Subject" value="{{ $editTeacher->subject ?? '' }}">

    <button>{{ isset($editTeacher) ? 'Update Teacher' : 'Add Teacher' }}</button>
</form>

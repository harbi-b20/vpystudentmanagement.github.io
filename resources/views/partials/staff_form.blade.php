<form method="POST" action="{{ route('admin.staff.save') }}">
    @csrf
    <input type="hidden" name="id" value="{{ $editStaff->id ?? '' }}">

    <input type="text" name="first_name" placeholder="First Name" value="{{ $editStaff->first_name ?? '' }}">
    <input type="text" name="last_name" placeholder="Last Name" value="{{ $editStaff->last_name ?? '' }}">

    <button>{{ isset($editStaff) ? 'Update Staff' : 'Add Staff' }}</button>
</form>
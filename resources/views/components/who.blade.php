@if (Auth::guard('web')->check())
    <p class="text-success">
        You are logged in as a <strong>User</strong>
    </p>
@else
    <p class="text-danger">
        You are logged out in as a <strong>User</strong>
    </p>
@endif

@if (Auth::guard('admin')->check())
    <p class="text-success">
        You are logged in as a <strong>Admin</strong>
    </p>
@else
    <p class="text-danger">
        You are logged out in as a <strong>Admin</strong>
    </p>
@endif
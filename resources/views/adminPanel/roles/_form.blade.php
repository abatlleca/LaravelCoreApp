<p>
    <label>Name: </label>
    <input type="text" name="role_name" value="{{ old ('role_name', $role->role_name ?? null) }}">
</p>
@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
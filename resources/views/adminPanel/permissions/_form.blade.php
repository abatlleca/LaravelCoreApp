<p>
    <label>Name: </label>
    <input type="text" name="name" value="{{ old ('name', $permission->name ?? null) }}">
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

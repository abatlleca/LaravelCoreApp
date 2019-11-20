<div class="form-group row">
    <label>Name: </label>
    <input type="text" name="name" value="{{ old ('name', $user->name ?? null) }}">
</div>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

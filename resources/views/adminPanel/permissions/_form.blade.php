<div class="form-group row">
    <label>Name: </label>
    <input type="text" name="name" value="{{ old ('name', $permission->name ?? null) }}">
</div>
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-11">
        @foreach ($roles as $role)

            <div class="form-group row">
                <input id="{{ $role->name }}" type="checkbox" name="roles[]" value="{{ $role->name }}"
                    @include('adminPanel.partials.checklist', ['list' => $permission->roles, 'origin' => $role])
                >
                <label for="{{ $role->name }}">{{ $role->name }}</label>
            </div>

        @endforeach
    </div>
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

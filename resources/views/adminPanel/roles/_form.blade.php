<div class="form-group row">
    <label>Name: </label>
    <input type="text" name="name" value="{{ old ('name', $role->name ?? null) }}">
</div>
<div class="form-group row">
    <div class="col-md-1"></div>
    <div class="col-md-11">
        <div class="form-group row">
            @include('adminPanel.roles.partials.list', ['permissions_list' => $permissions, 'role' => $role])
        </div>
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

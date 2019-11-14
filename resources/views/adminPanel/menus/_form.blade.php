<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">ID: </label>
    <div class="col-md-6">
        {{ $menu->id ?? "Pending..." }}
    </div>
</div>
<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Name: </label>
    <div class="col-md-6">
        <input id="name" class="form-text" type="text" name="name" value="{{ old ('name', $menu->name ?? null) }}">
    </div>
</div>
<div class="form-group row">
    <label for="route" class="col-md-4 col-form-label text-md-right">Route: </label>
    <div class="col-md-6">
        <input id="route" class="form-text" type="text" name="route" value="{{ old ('route', $menu->route ?? null) }}">
    </div>
</div>
<div class="form-group row">
    <label for="parent_id" class="col-md-4 col-form-label text-md-right">Parent Menu: </label>
    <div class="col-md-6">
        <select id="parent_id" name="parent_id">
            <option value="0">No parent</option>
            @foreach($parents as $parent)
                @if (isset($menu) && $parent->id == $menu->id)

                @else
                    <option value="{{ $parent->id }}"
                    @if (isset($menu) && $menu->parent_id == $parent->id)
                        selected
                    @endif
                    >{{ $parent->name }}</option>
                @endif
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="order" class="col-md-4 col-form-label text-md-right">Order: </label>
    <div class="col-md-6">
        <input id="order" class="form-text" type="text" name="order" value="{{ old ('order', $menu->order ?? 0) }}">
    </div>
</div>

<div class="form-group row">
    <label for="role" class="col-md-4 col-form-label text-md-right">Role: </label>
    <div class="col-md-6">
        <select id="role" name="role">
            @foreach($roles as $role)
                <option value="{{ $role->name }}"
                    @if (isset($menu) && $menu->role == $role->name)
                    selected
                    @endif
                >{{ $role->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="permission" class="col-md-4 col-form-label text-md-right">Permission: </label>
    <div class="col-md-6">
        <select id="permission" name="permission">
            <option value="">Choose permission</option>
            @foreach($permissions as $permission)
                <option value="{{ $permission->name }}"
                        @if (isset($menu) && $menu->permission == $permission->name)
                        selected
                    @endif
                >{{ $permission->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="environment" class="col-md-4 col-form-label text-md-right">Environment: </label>
    <div class="col-md-6">
        <select id="environment" name="environment">
            @foreach($environments as $environment)
                <option value="{{ $environment }}"
                        @if (isset($menu) && $menu->environment == $environment)
                        selected
                    @endif
                >{{ $environment }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <input type="hidden" name="isActive" value="0">
    <label for="isActive" class="col-md-4 col-form-label text-md-right">Enabled</label>
    <div class="col-md-6">
        <input id="isActive" class="" type="checkbox" name="isActive" value="1" {{ in_array (1, [old('isActive'), $menu->isActive] ) ? 'checked' : ''}} >
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

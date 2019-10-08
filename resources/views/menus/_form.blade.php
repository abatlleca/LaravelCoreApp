<p>
    <label>ID: {{ $menu->id ?? "Pending..." }}</label>
</p>
<p>
    <label>Name: </label>
    <input type="text" name="name" value="{{ old ('name', $menu->name ?? null) }}">
</p>
<p>
    <label>Route: </label>
    <input type="text" name="route" value="{{ old ('route', $menu->route ?? null) }}">
</p>
<p>
    <label>Parent Menu: </label>
    <select name="parent_id"
        @if (isset($menu) && count($menu->submenus) > 0)
            disabled
        @endif
    >
        <option value="">No parent</option>
        @foreach($parents as $parent)
            <option value="{{ $parent->id }}"
            @if (isset($menu) && $menu->parent_id == $parent->id)
                selected
            @endif
            >{{ $parent->name }}</option>
        @endforeach
    </select>
</p>
<p>
    <label>Order: </label>
    <input type="text" name="order" value="{{ old ('order', $menu->order ?? null) }}">
</p>
<p>
    <label>Role Required: </label>
    <select name="role_name">
        @foreach($roles as $role)
            <option value="{{ $role->role_name }}"
                @if (isset($menu) && $menu->role_name == $role->role_name)
                selected
                @endif
            >{{ $role->role_name }}</option>
        @endforeach
    </select>
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
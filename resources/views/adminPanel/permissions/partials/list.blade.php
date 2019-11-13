<!--Print all Permissions for a Role for a given User-->
{{--Receives a Permission_list and a User to check--}}
@foreach ($permission_list as $permission)

    <div class="form-group row">
        <input id="{{ $permission->name }}" type="checkbox" name="permissions[]" value="{{ $permission->name }}"
            @include('adminPanel.partials.checklist', ['list' => $user->permissions, 'origin' => $permission])
        >
        <label for="{{ $permission->name }}">{{ $permission->name }}</label>
    </div>

@endforeach

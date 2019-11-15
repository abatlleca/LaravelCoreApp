<!--Print all Roles with associated Permissions for a given User-->
{{--Receives a Role_list and a User to check--}}
<?php $i = 0; ?>
@foreach ($role_list as $role)
    @if($i == 0)
        <div class="form-group row">
    @endif
    <div class="col-md-4">
        <div class="row">
        <input id="{{ $role->name }}" type="checkbox" name="roles[]" value="{{ $role->name }}"
        @include('adminPanel.partials.checklist', [
        'list' => $user->roles,
        'origin' => $role
        ])
        >
        <label for="{{ $role->name }}"><b>{{$role->name}}</b></label>
        </div>
        <div class="form-group row">
            <div class="col-md-2"></div>
            <div class="col-md-10">
            @include('adminPanel.permissions.partials.list', [
                'permission_list' => $role->permissions,
                'listToCheck' => $user->permissions,
                ])
            </div>
        </div>

    </div>

    <?php $i++; ?>
    @if($i>2)
        </div>
        <?php $i = 0; ?>
    @endif
@endforeach
@if($i > 0 && $i < 3)
    </div>
@endif

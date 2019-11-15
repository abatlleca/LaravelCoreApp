<!--Print all Roles with associated Permissions for a given User-->
{{--Receives a Role_list and a User to check--}}
<?php $rowsForColumn = count($permissions_list) / 3;
$i = 0; ?>
@foreach ($permissions_list as $permission)
    @if($i == 0)
        <div class="col-md-4">
    @endif
    <div class="form-group row">
        <input id="{{ $permission->name }}" type="checkbox" name="permissions[]" value="{{ $permission->name }}"
            @include('adminPanel.partials.checklist', ['list' => $role->permissions, 'origin' => $permission])
        >
        <label for="{{ $permission->name }}">{{ $permission->name }}</label>
    </div>
    <?php $i++; ?>
    @if($i > $rowsForColumn - 1)
        </div>
        <?php $i = 0; ?>
    @endif
@endforeach
@if($i > 0 && $i < $rowsForColumn)
    </div>
@endif

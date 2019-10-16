<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

    <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name ?? null) }}" required autocomplete="name" autofocus>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email ?? null) }}" required autocomplete="email">

        @error('email')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">Required Role: </label>
    <div class="col-md-6">
        <select name="role_name">
            @foreach($roles as $role)
                <option value="{{ $role->role_name }}"
                        @if (isset($user) && $user->role_name == $user->role_name)
                        selected
                    @endif
                >{{ $role->role_name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <input type="hidden" name="isActive" value="0">
    <label for="isActive" class="col-md-4 col-form-label text-md-right">Is Active</label>

    <div class="col-md-6">
        <input id="isActive" type="checkbox" name="isActive" value="1" {{ in_array (1, [old('isActive'), $user->isActive] ) ? 'checked' : ''}} >

        @error('isActive')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
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

<div class="form-group row">
    <label class="col-md-4 col-form-label text-md-right">ID: </label>
    <div class="col-md-6">
        {{ $customer->id ?? "Pending..." }}
    </div>
</div>
<div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Name: </label>
    <div class="col-md-6">
        <input id="name" class="form-text" type="text" name="name" value="{{ old ('name', $customer->name ?? null) }}">
    </div>
</div>

<div class="form-group row">
    <input type="hidden" name="isActive" value="0">
    <label for="isActive" class="col-md-4 col-form-label text-md-right">Enabled</label>
    <div class="col-md-6">
        <input id="isActive" class="" type="checkbox" name="isActive" value="1" {{ in_array (1, [old('isActive'), $customer->isActive] ) ? 'checked' : ''}} >
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

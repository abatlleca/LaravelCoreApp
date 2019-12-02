<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">ID: </label>
    <div class="col-md-6">
        {{ $actuation->id ?? "Pending..." }}
    </div>
</div>
<div class="form-group row">
    <label for="origin" class="col-md-2 col-form-label text-md-right">Origin: </label>
    <div class="col-md-10">
        <input id="origin" class="form-text" type="text" name="origin" value="{{ old ('title', $actuation->origin ?? null) }}">
    </div>
</div>

<div class="form-group row">
    <input type="hidden" name="ticket_id" value="{{ $actuation->ticket->id }}">
</div>

<div class="form-group row">
    <input type="hidden" name="isPrivate" value="0">
    <label for="isPrivate" class="col-md-2 col-form-label text-md-right">Private</label>
    <div class="col-md-10">
        <input id="isPrivate" class="" type="checkbox" name="isPrivate" value="1" {{ in_array (1, [old('isPrivate'), $actuation->isPrivate] ) ? 'checked' : ''}} >
    </div>
</div>

<div class="form-group row">
    <label for="description"class="col-md-2 col-form-label text-md-right">Description</label>
    <div class="col-md-10">
        <textarea class="col-md-12" name="description">{{ old ('description', $actuation->description ?? null) }}
        </textarea>
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

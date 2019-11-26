<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right">ID: </label>
    <div class="col-md-6">
        {{ $ticket->id ?? "Pending..." }}
    </div>
</div>
<div class="form-group row">
    <label for="title" class="col-md-2 col-form-label text-md-right">Title: </label>
    <div class="col-md-10">
        <input id="title" class="form-text" type="text" name="title" value="{{ old ('title', $ticket->title ?? null) }}">
    </div>
</div>
<div class="form-group row">
    <label for="priority" class="col-md-2 col-form-label text-md-right">Priority: </label>
    <div class="col-md-10">
        <input id="priority" class="form-text" type="text" name="priority" value="{{ old ('priority', $ticket->priority ?? null) }}">
    </div>
</div>
<div class="form-group row">
    <label for="origin" class="col-md-2 col-form-label text-md-right">Origin: </label>
    <div class="col-md-10">
        <input id="origin" class="form-text" type="text" name="origin" value="{{ old ('origin', $ticket->origin ?? null) }}">
    </div>
</div>
<div class="form-group row">
    <label for="customer_id" class="col-md-2 col-form-label text-md-right">Customer: </label>
    <div class="col-md-10">
        <select id="customer_id" name="customer_id">
            <option value="0">Select Customer</option>
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}"
                @if (isset($ticket) && $ticket->customer_id == $customer->id)
                    selected
                @endif
                >{{ $customer->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="status_id" class="col-md-2 col-form-label text-md-right">Status: </label>
    <div class="col-md-10">
        <select id="status_id" name="status_id">
            @foreach($statuses as $status)
                <option value="{{ $status->id }}"
                    @if (isset($ticket) && $ticket->status->id == $status->id)
                    selected
                    @endif
                >{{ $status->name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="form-group row">
    <input type="hidden" name="isPrivate" value="0">
    <label for="isPrivate" class="col-md-2 col-form-label text-md-right">Private</label>
    <div class="col-md-10">
        <input id="isPrivate" class="" type="checkbox" name="isPrivate" value="1" {{ in_array (1, [old('isPrivate'), $ticket->isPrivate] ) ? 'checked' : ''}} >
    </div>
</div>

<div class="form-group row">
    <label for="description"class="col-md-2 col-form-label text-md-right">Description</label>
    <div class="col-md-10">
        <textarea class="col-md-12" name="description">{{ old ('description', $ticket->description ?? null) }}
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

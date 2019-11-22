<form method="GET" action="{{ route('ad.tickets.index') }}">
    @csrf
    <label for="title">Title:</label>
    <input id="title" type="text" name="title">
    <label for="status">Status</label>
    <select id="status" name="status_id">
        <option value="">All...</option>
        @foreach($statuses as $status)
            <option value="{{ $status->id }}">{{ $status->name }}</option>
        @endforeach
    </select>
    <input type="submit" value="Search" />
</form>

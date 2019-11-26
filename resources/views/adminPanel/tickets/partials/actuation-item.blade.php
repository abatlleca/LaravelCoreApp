{{--{{ dd($item) }}--}}
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8">
                        {{ $item->created_at }} - {{ $item->creator->name }}
                    </div>
                    <div class="col-md-4 text-right">
                        <a href="{{ route('ad.actuations.edit', ['ticket' => $item->id]) }}">Edit</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <p><b>Description: </b> {{ $item->description }}</p>
            </div>
        </div>
    </div>
</div>

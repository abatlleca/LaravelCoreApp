{{--{{ dd($item) }}--}}
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-5">
                        <b><a href="{{ route('ad.tickets.show', ['ticket' => $item->id]) }}"> {{ $item->title }} </a></b>
                    </div>
                    <div class="col-md-4">
                        {{ $item->customer->name }}
                    </div>
                    <div class="col-md-3">
                        {{ $item->status->name }}
                    </div>
                </div>
            </div>

            <div class="card-body">
                <p><b>Description: </b> {{ $item->description }}</p>
            </div>
        </div>
    </div>
</div>

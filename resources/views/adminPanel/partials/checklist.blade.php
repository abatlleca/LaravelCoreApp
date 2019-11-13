{{--Used to add checked attribute to a checkbox--}}
{{--Receives $list, $origin to check name--}}

@foreach ($list as $single)
    @if ($single->name == $origin->name)
        checked
        @break
    @endif
@endforeach

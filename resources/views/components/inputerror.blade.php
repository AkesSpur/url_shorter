{{-- @props(['messages']) --}}


@if ($errors->any())
<div class = 'text-sm text-red-600 space-y-1'>
 
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
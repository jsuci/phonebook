<h1>{{ $heading }}</h1>

{{-- @if (count($listings) == 2)
    <p>There are {{ count($listings) }} listings</p>    
@endif --}}

@foreach ($listings as $listing)
<h2>
    {{ $listing['name']}}
</h2>
<p>
    {{ $listing['email']}}
</p>
    
@endforeach
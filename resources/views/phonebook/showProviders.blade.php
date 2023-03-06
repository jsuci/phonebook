{{-- @php
    $subscriber = $results;
@endphp --}}

{{-- <h2>{{ $results[0]->lastname }}, {{ $results[0]->firstname }}</h2> --}}
{{-- <table class="table pt-3" id="providerTable">
    <thead class="thead-light">
        <tr>
            <th scope="col">PROVIDER</th>
            <th scope="col">PHONE NO</th>
        </tr>
    </thead> --}}
    {{-- <tbody> --}}
@if (!empty($results))
    @foreach ($results as $provider)
        <tr data-id="{{ $provider->id }}" class="provider-row">
            <td>{{ $provider->provider }}</td>
            <td>{{ $provider->phoneno }}</td>
        </tr>
    @endforeach
@endif
{{--     
    </tbody>
</table> --}}


<script>

    var selectedRowId = null;

    $('.provider-row').click(function() {
        $('tr').removeClass('table-primary');
        $(this).toggleClass('table-primary');

        selectedRowId = $(this).data('id');

        // console.log(selectedRowId, selectedId)
        
    });
    

</script>
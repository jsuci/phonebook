@php
    $subscriber = $data['subscriber'];
@endphp

<h2>{{ $subscriber->lastname }}, {{ $subscriber->firstname }}</h2>
<table class="table pt-3" id="providerTable">
    <thead class="thead-light">
        <tr>
            <th scope="col">PROVIDER</th>
            <th scope="col">PHONE NO</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data['providers'] as $provider)
            <tr data-id="{{ $provider->id }}" class="provider-row">
                <td>{{ $provider->phoneno }}</th>
                <td>{{ $provider->provider }}</td>
            </tr>
        @endforeach
    </tbody>
</table>


<script>

    var selectedRowId = null;

    $('.provider-row').click(function() {
        $('tr').removeClass('table-primary');
        $(this).toggleClass('table-primary');

        selectedRowId = $(this).data('id');

        console.log(selectedRowId, selectedId)
        
    });

    // // delete provider button
    // $('#deleteProviderBtn').click(function() {
    //     $('tr').removeClass('table-primary');
    //     $(this).toggleClass('table-primary');

    //     console.log(selectedRowId, selectedId)

    //     if (selectedRowId) {
    //         // Send an AJAX request to retrieve the providers for this subscriber
    //         $.ajax({
    //             url: '/delete-provider/' + selectedRowId,
    //             type: 'POST',
    //             data: {
    //                 _token: '{{ csrf_token() }}' // Add the CSRF token to the data
    //             },
    //             success: function(data) {
    //                 notificationToast('alert-success', 'Provider deleted successfully!')
    //             }
    //         }).then(function() {
    //             $.ajax({
    //                 type: "GET",
    //                 url: '/providers/' + selectedId,
    //                 success: function(data) {
    //                     $('#providers .modal-body').html(data);
    //                 },
    //                 error: function(xhr) {
    //                     console.log(xhr.responseText);
    //                 }
    //             });
    //         });
    //     } else {
    //         notificationToast('alert-danger', 'Please select a Provider')
    //     }
        
    // });
    

</script>
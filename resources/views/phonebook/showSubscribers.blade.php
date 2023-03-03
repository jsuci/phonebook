@foreach ($subscribers as $subscriber)
    <tr data-id='{{ $subscriber->id }}' class="subscriber-row">
    <td>{{ $subscriber->lastname }}</th>
    <td>{{ $subscriber->firstname }}</td>
    <td>{{ $subscriber->middlename }}</td>
    <td>
        @if ($subscriber->gender === 'M')
        MALE
        @elseif ($subscriber->gender === 'F')
        FEMALE
        @endif
    </td>
    <td>{{ $subscriber->address }}</td>
    </tr>
@endforeach

<script>

    var selectedId = null;


    $('.subscriber-row').click(function() {
        $('tr').removeClass('table-primary');
        $(this).toggleClass('table-primary');

        selectedId = $(this).data('id');
        $('#headerid').val(selectedId);
    });

    $('.subscriber-row').dblclick(function() {
        $("tr").removeClass('table-primary');
        $(this).toggleClass('table-primary');

        selectedId = $(this).data('id');

        console.log(selectedId)

        // Send an AJAX request to retrieve the providers for this subscriber
        $.ajax({
            url: '/providers/' + selectedId,
            success: function(response) {
                // Display the providers in a modal
                $('#providers').modal('show');
                $('#providers .modal-body').html(response);
            }
        });
    });

    // // providers button
    // $( "#subProviders" ).click(function() {
    //     $('#headerid').val(selectedId);

    //     if (selectedId) {
    //     // Send an AJAX request to retrieve the providers for this subscriber
    //     $.ajax({
    //         url: '/providers/' + selectedId,
    //         success: function(data) {
    //         // Display the providers in a modal
    //         $('#providers').modal('show');
    //         $('#providers .modal-body').html(data);
    //         }
    //     });
    //     } else {
    //         notificationToast('alert-danger', 'Please select a subscriber')
    //     }
    // });


    // // add provider button
    // $("#addProviderPhoneForm").submit(function(event) {
    //     // Prevent the form from being submitted via the default method
    //     event.preventDefault();
        
    //     // Serialize the form data into a query string
    //     var formData = $(this).serialize();
        
    //     console.log(formData)
    //     console.log(selectedId)


    //     $.ajax({
    //     url: $(this).attr('action'),
    //     type: $(this).attr('method'),
    //     data: formData,
    //     success: function(response) {
    //         $('#addProviderPhone').modal('hide');
    //     },
    //     error: function(xhr) {
    //         $('#addProviderPhone').modal('hide');
    //         notificationToast('alert-danger', 'Error adding new provider')
    //     }
    //     }).then(function() {
    //         $.ajax({
    //             type: "GET",
    //             url: '/providers/' + selectedId,
    //             success: function(data) {
    //                 $('#providers .modal-body').html(data);
    //             },
    //             error: function(xhr) {
    //                 console.log(xhr.responseText);
    //             }
    //         });
    //     });
    // });






    // // delete subscriber button
    // $( "#subDelete" ).click(function() {
    //     if (selectedId) {
    //         // Send an AJAX request to retrieve the providers for this subscriber
    //         $.ajax({
    //             url: '/delete-subscriber/' + selectedId,
    //             type: 'POST',
    //             data: {
    //                 _token: '{{ csrf_token() }}' // Add the CSRF token to the data
    //             },
    //             success: function(data) {
    //                 notificationToast('alert-success', 'Subscriber deleted successfully!')
    //             }
    //         }).then(function() {
    //             $.ajax({
    //                 type: "GET",
    //                 url: "/subscribers",
    //                 success: function(data) {
    //                 $('#subscriberTable > tbody').html(data);
    //                 },
    //                 error: function(xhr) {
    //                 console.log(xhr.responseText);
    //                 }
    //             });
    //         });
    //     } else {
    //         notificationToast('alert-danger', 'Please select a subscriber')
    //     }
    // });
</script>
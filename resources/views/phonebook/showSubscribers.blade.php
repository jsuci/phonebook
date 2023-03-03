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
    });

    $('.subscriber-row').dblclick(function() {
        $("tr").removeClass('table-primary');
        $(this).toggleClass('table-primary');

        selectedId = $(this).data('id');

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

    // providers button
    $( "#subProviders" ).click(function() {
        if (selectedId) {
        // Send an AJAX request to retrieve the providers for this subscriber
        $.ajax({
            url: '/providers/' + selectedId,
            success: function(data) {
            // Display the providers in a modal
            $('#providers').modal('show');
            $('#providers .modal-body').html(data);
            }
        });
        } else {
        $( "#warningModal" ).modal('show');
        }
    });
</script>
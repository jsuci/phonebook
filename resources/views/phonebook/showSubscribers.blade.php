<table class="table" id="subscriberTable">
    <thead class="thead-light">
    <tr>
        <th scope="col">LASTNAME</th>
        <th scope="col">FIRSTNAME</th>
        <th scope="col">MIDDLENAME</th>
        <th scope="col">GENDER</th>
        <th scope="col">ADDRESS</th>
    </tr>
    </thead>
    <tbody>
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
    </tbody>
</table>
<div class="prevNext pt-3">
    {{-- <button class="prev btn btn-secondary" id="prevButton">Prev</button>
    <button class="nxt btn btn-secondary" id="nextButton">Next</button> --}}
    {{ $subscribers->links() }}
</div>

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

        // console.log(selectedId)

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

</script>
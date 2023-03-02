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
            <tr data-id="pr{{ $provider->id }}">
                <td>{{ $provider->phoneno }}</th>
                <td>{{ $provider->provider }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
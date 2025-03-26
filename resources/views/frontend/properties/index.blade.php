<h1>Property List</h1>

<form method="GET" action="{{ route('properties.index') }}">
    <label for="location">Filter by Location:</label>
    <select name="location_id" id="location" onchange="this.form.submit()">
        <option value="">All</option>
        @foreach ($locations as $location)
            <option value="{{ $location->id }}" {{ $locationId == $location->id ? 'selected' : '' }}>
                {{ $location->name }}
            </option>
        @endforeach
    </select>
</form>

<ul>
@foreach ($properties as $property)
    <li>
        <a href="{{ route('properties.show', $property->id) }}">
            {{ $property->name }} - {{ number_format($property->feature_price, 0, ',', '.') }} €
            ({{ $property->location->name ?? 'Without location' }})
        </a>
    </li>
@endforeach
</ul>

{{ $properties->withQueryString()->links() }}
<h1>{{ $property->name }}</h1>

<p><strong>Description:</strong> {{ $property->description }}</p>
<p><strong>Type:</strong> {{ $property->type->name ?? 'N/A' }}</p>

<h3>Características</h3>
<ul>
@foreach ($property->features as $feature)
    <li><strong>Price:</strong> {{ number_format($feature->price, 0, ',', '.') }} €</li>
    <li><strong>Rooms:</strong> {{ $feature->rooms }}</li>
    <li><strong>Bathroom:</strong> {{ $feature->bathrooms ?? 'N/A' }}</li>
    <li><strong>Others:</strong> {{ $feature->description ?? '' }}</li>
@endforeach
</ul>

<h3>Agent to contact</h3>
@if ($property->agent)
    <p>{{ $property->agent->name }} {{ $property->agent->surname }}</p>
    <p>Email: {{ $property->agent->email }}</p>
    <p>Phone: {{ $property->agent->mobile }}</p>
@endif

<hr>

<p><strong>Total visits to property:</strong> {{ $property->visits }}</p>

@if ($userVisits)
    <p><em>Times you visited the property this session: {{ $userVisits }}</em></p>
@endif

<hr>

<h2>Similar properties</h2>
<ul>
@forelse ($similarProperties as $similar)
    <li>
        <a href="{{ route('properties.show', $similar->id) }}">
            {{ $similar->name }} - {{ $similar->location->name ?? '' }}
        </a>
    </li>
@empty
    <p>No similar properties where found.</p>
@endforelse
</ul>

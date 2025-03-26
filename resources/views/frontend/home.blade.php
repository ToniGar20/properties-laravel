<h1>Most seen properties</h1>

<ul>
@foreach ($properties as $property)
    <li>
        <a href="{{ route('properties.show', $property->id) }}">
            {{ $property->title }} - {{ $property->location->name ?? 'Without location' }}
        </a>
    </li>
@endforeach
</ul>

<a href="{{ route('properties.index') }}">Checkout all properties →</a>
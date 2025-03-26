<h1>Listado de Propiedades</h1>

<ul>
@foreach ($properties as $property)
    <li>
        <a href="{{ route('properties.show', $property->id) }}">
            {{ $property->title }} - {{ $property->location->name ?? 'Sin ubicación' }}
        </a>
    </li>
@endforeach
</ul>

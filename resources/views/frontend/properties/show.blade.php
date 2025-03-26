<h1>{{ $property->title }}</h1>

<p><strong>Ubicación:</strong> {{ $property->location->name ?? 'N/A' }}</p>
<p><strong>Agente:</strong> {{ $property->agent->name ?? 'N/A' }} {{ $property->agent->surname ?? '' }}</p>
<p><strong>Tipo:</strong> {{ $property->type->name ?? 'N/A' }}</p>

<h3>Características:</h3>
<ul>
@foreach ($property->features as $feature)
    <li>{{ $feature->name }}</li>
@endforeach
</ul>

<a href="{{ route('properties.index') }}">← Volver al listado</a>

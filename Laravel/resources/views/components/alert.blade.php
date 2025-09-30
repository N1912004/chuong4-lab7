@props(['type' => 'success','title' => 'Thông báo'])

@php
    $baseClasses = "p-3 rounded-lg mb-3";
    $typeClasses = $type === 'success'
        ? "bg-green-100 text-green-800"
        : "bg-yellow-100 text-yellow-800";
@endphp

<div class="{{ $baseClasses }} {{ $typeClasses }}">
    <strong>{{ $title }}:</strong> {{ $slot }}
</div>

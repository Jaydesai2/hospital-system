@props(['variant' => 'primary', 'type' => 'submit'])

@php
    $baseClasses = 'font-semibold text-sm px-5 py-2.5 rounded-lg transition duration-200 inline-flex items-center justify-center';

    $variants = [
        'primary' => 'bg-blue-600 hover:bg-blue-700 text-white shadow-sm',
        'secondary' => 'bg-teal-600 hover:bg-teal-700 text-white shadow-sm',
        'outline' => 'border border-slate-300 text-slate-700 hover:bg-slate-100 font-medium',
        'danger' => 'bg-red-600 hover:bg-red-700 text-white shadow-sm',
    ];

    $classes = $baseClasses . ' ' . ($variants[$variant] ?? $variants['primary']);
@endphp

<button {{ $attributes->merge(['type' => $type, 'class' => $classes]) }}>
    {{ $slot }}
</button>
@props(['type' => 'success'])

@php
    $types = [
        'success' => 'bg-emerald-50 border-emerald-200 text-emerald-700',
        'warning' => 'bg-amber-50 border-amber-200 text-amber-700',
        'error' => 'bg-red-50 border-red-200 text-red-700',
    ];

    $classes = 'border px-4 py-3 rounded-lg text-sm font-medium flex items-center gap-3 ' . ($types[$type] ?? $types['success']);
@endphp

<div {{ $attributes->merge(['class' => $classes]) }} role="alert">
    {{ $slot }}
</div>
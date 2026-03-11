@props(['padding' => 'p-6'])

<div {{ $attributes->merge(['class' => 'bg-white border border-slate-200 rounded-xl shadow-sm ' . $padding]) }}>
    {{ $slot }}
</div>
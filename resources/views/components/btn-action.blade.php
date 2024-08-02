@props(['color' => '', 'model' => ''])
<a {{ $attributes->merge(['class' => "btn btn-sm btn-$color text-light"]) }} wire:click="{{ $model }}">
    <i class="fa-solid fa-{!! $slot !!}"></i>
</a>


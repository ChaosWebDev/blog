@props(['href', 'i' => null, 'text'])

<a href="{{ $href }}" {{ $attributes }}>
    @isset($i)
        <i class="nf {{ $i }}"></i>
    @endisset

    <span class="text">{{ $text }}</span>
</a>

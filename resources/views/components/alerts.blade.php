<div {{ $attributes->merge(['class' => 'alert ' . $class]) }} role="alert">
    {{ $slot }}
</div>

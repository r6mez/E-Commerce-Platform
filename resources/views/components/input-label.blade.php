@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-p-dark dark:text-p-light']) }}>
    {{ $value ?? $slot }}
</label>

@props(['disabled' => false])

<select @disabled($disabled) {{ $attributes->merge(['class' => 'w-full p-2.5 my-2.5 border-none rounded-lg bg-p-medium text-p-light']) }}>
    {{ $slot }}
</select>
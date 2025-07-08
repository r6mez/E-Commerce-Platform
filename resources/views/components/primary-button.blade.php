<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full p-2.5 bg-p-light border-none text-p-dark font-bold rounded-lg cursor-pointer mt-2.5 hover:bg-p-light/80']) }}>
    {{ $slot }}
</button>

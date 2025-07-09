<x-app-layout>
    <div class="flex flex-col items-center justify-center min-h-screen">
        <h1 class="text-4xl md:text-6xl font-extrabold text-p-light mb-8 mt-8 tracking-tight relative glow-header">
            World War II Timeline
        </h1>
        <style>
        .glow-header {
            text-shadow:
                0 0 4px #fff,
                0 0 8px #facc15,
                0 0 12px #facc15,
                0 0 16px #f59e42;
            background: linear-gradient(90deg, #facc15 10%, #f59e42 90%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            filter: brightness(1);
            letter-spacing: 0.04em;
            animation: glow-pulse 2.5s ease-in-out infinite alternate;
        }
        @keyframes glow-pulse {
            0% {
                text-shadow:
                    0 0 4px #fff,
                    0 0 8px #facc15,
                    0 0 12px #facc15,
                    0 0 16px #f59e42;
            }
            100% {
                text-shadow:
                    0 0 8px #fff,
                    0 0 16px #facc15,
                    0 0 24px #facc15,
                    0 0 32px #f59e42;
            }
        }
        </style>
        <x-timeline />
    </div>
</x-app-layout>

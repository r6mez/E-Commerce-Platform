@props([
    'year', 
    'title', 
    'description', 
    'flag', 
    'flag2' => null, // Optional second flag
    'date' => null   // Optional full date
])

<div class="relative flex items-center animate-timeline-fadein">
    <div class="flex items-center bg-p-medium rounded-xl shadow-lg px-8 py-6 w-full md:w-4/5 mx-auto border border-p-light transition-all duration-500 ease-out cursor-pointer card-hover-animate">
        <div class="flex-shrink-0 mr-8 flex flex-col items-center justify-center">
            <div class="flex items-center space-x-2 mb-2">
                <span class="text-8xl select-none">{{ $flag }}</span>
                @if($flag2)
                    <span class="text-6xl select-none">{{ $flag2 }}</span>
                @endif
            </div>
            <span class="inline-block bg-p-light text-p-dark font-bold text-xs rounded-full px-3 py-1 shadow-sm tracking-wide mb-1 mt-1">{{ $date ?? $year }}</span>
        </div>
        <div class="flex flex-col flex-1 min-w-0">
            <span class="font-semibold text-p-light text-xl mb-1 leading-tight">{{ $title }}</span>
            <span class="text-p-light/80 text-base mb-2 leading-snug">{{ $description }}</span>
        </div>
    </div>
</div>
<style>
@keyframes timeline-fadein {
  0% { opacity: 0; transform: translateY(32px); }
  100% { opacity: 1; transform: translateY(0); }
}
.animate-timeline-fadein {
  animation: timeline-fadein 0.8s cubic-bezier(0.22, 1, 0.36, 1) forwards;
}
.card-hover-animate {
  transition: transform 0.3s cubic-bezier(0.22, 1, 0.36, 1), box-shadow 0.3s cubic-bezier(0.22, 1, 0.36, 1);
}
.card-hover-animate:hover {
  transform: scale(1.08);
  box-shadow: 0 10px 32px 0 rgba(0,0,0,0.25), 0 2px 4px 0 rgba(0,0,0,0.18);
}
</style>

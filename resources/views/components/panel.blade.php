<div class="py-3">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg" style="min-height: 100svh;">
            <div {{ $attributes->class(['p-6 sm:px-20 bg-white ' => true]) }}> {{-- CLASS border-b border-gray-200 --}}
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
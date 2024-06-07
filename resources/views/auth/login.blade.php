<x-layout>
    <x-slot name="header">
        {{ 'Login' }}
    </x-slot>

    <x-panel class="flex flex-col items-center pt-16 pb-16">
        <div class="mt-8 text-2xl">
            <x-splade-form class="flex flex-col items-center  pt-16 pb-16" :for="$form" />
        </div>
    </x-panel>
</x-layout>

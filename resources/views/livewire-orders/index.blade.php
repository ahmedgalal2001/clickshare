<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Order Management') }}
        </h2>
    </x-slot>
    <section class="mx-2 my-3">
        @livewire('order-management')
    </section>
</x-app-layout>

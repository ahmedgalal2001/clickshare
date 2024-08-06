<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('History Order') }}
        </h2>
    </x-slot>
    <section class="mx-2 my-3">
        @livewire('order-history', ['orderId' => $orderId])
    </section>

</x-app-layout>

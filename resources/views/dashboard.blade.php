<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @role('admin')
        @include('admin.index')
    @endrole
    @role('manager')
        @include('manager.index')
    @endrole
    @role('staff')
        @include('staff.index')
    @endrole
</x-app-layout>

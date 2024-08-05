<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Attribute') }}
        </h2>
    </x-slot>

    <section class="mx-2 my-3">
        <form class="max-w-sm mx-auto bg-white  shadow p-4" action="{{ route('attributes.store') }}" method="POST">
            @csrf
            <div class="mb-5">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                <input type="name" id="name" name="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    placeholder="Name" required />
            </div>
            <div class="mb-5">
                <label for="type" class="block mb-2 text-sm font-medium text-gray-900">Type</label>
                <input type="type" id="type" name="type"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    placeholder="Type" required />
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Add
                Attribute</button>
        </form>
    </section>
</x-app-layout>

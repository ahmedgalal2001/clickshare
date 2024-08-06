<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Attribute Value') }}
        </h2>
    </x-slot>

    <section class="mx-2 my-3">
        <form class="max-w-sm mx-auto bg-white  shadow p-4" action="{{ route('attribute-values.store') }}" method="POST">
            @csrf
            <div class="mb-5">
                <label for="value">Value:</label>
                <input
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    type="text" id="value" name="value" required>
            </div>
            <div class="mb-5">
                <label for="attribute_id">Attribute:</label>
                <select
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    id="attribute_id" name="attribute_id" required>
                    @foreach ($attributes as $attribute)
                        <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-5">
                <label for="attributable_id">Attributable ID:</label>
                <input
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    type="text" id="attributable_id" name="attributable_id" required>
            </div>
            <div class="mb-5">
                <label for="attributable_type">Attributable Type:</label>
                <input
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    type="text" id="attributable_type" name="attributable_type" required>
            </div>
            <button
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
                type="submit">Create</button>
        </form>
    </section>
</x-app-layout>

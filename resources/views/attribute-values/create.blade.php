<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Attribute Value') }}
        </h2>
    </x-slot>

    <section class="mx-2 my-3">
        <h1>Create Attribute Value</h1>
        <form action="{{ route('attribute-values.store') }}" method="POST">
            @csrf
            <label for="value">Value:</label>
            <input type="text" id="value" name="value" required>

            <label for="attribute_id">Attribute:</label>
            <select id="attribute_id" name="attribute_id" required>
                @foreach ($attributes as $attribute)
                    <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                @endforeach
            </select>

            <label for="attributable_id">Attributable ID:</label>
            <input type="text" id="attributable_id" name="attributable_id" required>

            <label for="attributable_type">Attributable Type:</label>
            <input type="text" id="attributable_type" name="attributable_type" required>

            <button type="submit">Create</button>
        </form>
    </section>
</x-app-layout>

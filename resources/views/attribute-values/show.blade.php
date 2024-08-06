<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Attribute Values') }}
        </h2>
    </x-slot>

    <section class="mx-2 my-3">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Attribute Values Data</h5>
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Attribute Value Value
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>

                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <a
                                href="{{ route('attribute-values.show', $attributeValue->id) }}">{{ $attributeValue->value }}</a>
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('attribute-values.edit', $attributeValue->id) }}">
                                <i class="fa-solid fa-pen-to-square text-blue-500"></i>
                            </a>
                            <form action="{{ route('attribute-values.destroy', $attributeValue->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="fa-solid fa-trash text-red-600"></i>
                                </button>
                            </form>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </section>

</x-app-layout>

 <x-app-layout>
     <x-slot name="header">
         <h2 class="font-semibold text-xl text-gray-800 leading-tight">
             {{ __('Attributes') }}
         </h2>
     </x-slot>
     @include('components.flatButton', ['route' => 'attributes.create'])
     <section class="mx-2 my-3">
         <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">Attribute Data</h5>
         <div class="relative overflow-x-auto">
             <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                 <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                     <tr>
                         <th scope="col" class="px-6 py-3">
                             Attribute Name
                         </th>
                         <th scope="col" class="px-6 py-3">
                             Attribute Type
                         </th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($attributes as $attribute)
                         <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                             <td class="px-6 py-4">
                                 {{ $attribute->name }}
                             </td>
                             <td class="px-6 py-4">
                                 {{ $attribute->type }}
                             </td>
                         </tr>
                     @endforeach
                 </tbody>
             </table>
         </div>
     </section>
 </x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Liste des types de paiement') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <div class="flex justify-end mb-4">
                    <x-button>
                        <a href="{{ route('payement-types.create') }}" class="flex items-center">
                            <span class="mdi mdi-plus mr-2"></span>
                            Nouveau type de paiement
                        </a>
                    </x-button>
                </div>

                <div class="overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-100">
                            <tr>
                                <th scope="col" class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th scope="col" class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Libellé</th>
                                <th scope="col" class="py-3 px-6 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($paymentTypes as $paymentType)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-4 px-6 whitespace-nowrap">{{ $paymentType->id }}</td>
                                    <td class="py-4 px-6 whitespace-nowrap">{{ $paymentType->wording }}</td>
                                    <td class="py-4 px-6 text-right whitespace-nowrap space-x-2">
                                        <a href="{{ route('payement-types.show', $paymentType->id) }}" class="text-blue-600 hover:text-blue-900">
                                            <span class="mdi mdi-eye bg-blue-100 p-1 rounded"></span>
                                        </a>
                                        <a href="{{ route('payement-types.edit', $paymentType->id) }}" class="text-yellow-600 hover:text-yellow-900">
                                            <span class="mdi mdi-pencil bg-yellow-100 p-1 rounded"></span>
                                        </a>
                                        <form action="{{ route('payement-types.destroy', $paymentType->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce type de paiement ?')">
                                                <span class="mdi mdi-delete bg-red-100 p-1 rounded"></span>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

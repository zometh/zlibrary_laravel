@include('base')
<div class="min-h-screen flex">
    @include('layouts.admin.sidebar')
    <main class="flex-1 overflow-y-auto p-4">
        <div class="bg-white rounded-lg shadow overflow-hidden mb-6">
            <div class="flex justify-between items-center p-4 border-b">
                <h4 class="text-lg font-semibold text-gray-800">Toutes les paiements</h4>

            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Client
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Commande ID
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            MONTANT
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Action
                        </th>


                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($paiements as $p)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{$p->id}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{strtoupper($p->user->name)}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">#{{$p->commande->id.$p->commande->created_at->day.$p->commande->created_at->month.'2025'}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{$p->montant}} FCFA</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($p->created_at)->translatedFormat('j F Y à H:i') }}</div>
                            </td>
                            <td>
                                <div class="px-6 py-4 whitespace-nowrap space-x-4">
                                    <a href="{{ route('factures.show', $p->commande->id) }}" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600" target="_blank">
                                        Consulter
                                    </a>
                                    <a href="{{ route('factures.show', ['commande' => $p->commande->id, 'download' => true]) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                                        Télécharger
                                    </a>
                                </div>
                            </td>

                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
            <div class="mt-2 mb-2">
                {{$paiements->links()}}
            </div>
        </div>
    </main>
</div>

@include('base')

<div class="min-h-screen flex">
    @include('layouts.admin.sidebar')
    <main class="flex-1 overflow-y-auto p-4">
<div class="bg-white rounded-lg shadow overflow-hidden mb-6">
    <div class="flex justify-between items-center p-4 border-b">
        <h4 class="text-lg font-semibold text-gray-800">Toutes les commandes</h4>

    </div>
    @if (session('success'))

        <x-alert >
            {{ session('success') }}
        </x-alert>
    @endif
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Commande
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Client
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Date
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Montant
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Statut
                </th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            @foreach($recent_commands as $c)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm font-medium text-gray-900">#{{$c->id.$c->created_at->day.$c->created_at->month.$c->created_at->year}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ strtoupper($c->user->name) }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($c->created_at)->translatedFormat('j F Y à H:i') }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $c->total_amount }} FCFA</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            {{ $c->statut }}
                                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                        <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">Détails</a>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button onclick="openModal({{ $c->id }}, '{{ $c->statut }}')"
                                class="text-green-600 hover:text-indigo-900 mr-3">
                            Modifier
                        </button>
                        <div id="statusModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
                            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                                <h2 class="text-xl font-bold mb-4">Modifier le statut</h2>
                                <form method="post" action="{{route('commande.update-status', $c->id)}}">
                                    @csrf
                                    <!-- Sélection du statut -->
                                    <select id="statusSelect" class="w-full p-2 border rounded" name="statut">
                                        @foreach(['en attente', 'en préparation', 'expédiée', 'payée'] as $status)
                                            <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                                        @endforeach
                                    </select>

                                    <!-- Boutons -->
                                    <div class="mt-4 flex justify-end">
                                        <button onclick="closeModal()" class="px-4 py-2 bg-gray-500 text-white rounded mr-2">
                                            Annuler
                                        </button>
                                        <button type="submit" id="saveStatusBtn" class="px-4 py-2 bg-green-500 text-white rounded">
                                            Enregistrer
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </td>

                    </td>
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
    <div class="mt-2 mb-2">
        {{$recent_commands->links()}}
    </div>
</div>
    </main>
</div>
<script>
    let selectedCommandeId = null;

    function openModal(commandeId, currentStatus) {
        selectedCommandeId = commandeId;
        document.getElementById("statusSelect").value = currentStatus;
        document.getElementById("statusModal").classList.remove("hidden");
    }

    function closeModal() {
        document.getElementById("statusModal").classList.add("hidden");
    }

    // Tu peux ajouter ta propre logique pour gérer la modification ici
    document.getElementById("saveStatusBtn").addEventListener("click", function() {
        let newStatus = document.getElementById("statusSelect").value;
        console.log("Commande ID:", selectedCommandeId, "Nouveau statut:", newStatus);
        closeModal();
    });
</script>

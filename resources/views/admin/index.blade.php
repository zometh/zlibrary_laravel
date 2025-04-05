
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Gestionnaire - ZLibrary</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body class="bg-gray-100">
<div class="min-h-screen flex">
    <!-- Sidebar -->
    @include('layouts.admin.sidebar')

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Top Navbar -->
        <!--<header class="bg-white shadow-sm">
            <div class="flex items-center justify-between p-4">
                <button class="md:hidden p-2 rounded-md text-gray-500 hover:text-gray-800 hover:bg-gray-100">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="flex items-center space-x-4">
                    <button class="p-2 rounded-full text-gray-500 hover:text-gray-800 hover:bg-gray-100 relative">
                        <i class="fas fa-bell"></i>
                        <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-red-500"></span>
                    </button>

                    <div class="flex items-center space-x-2">
                        <div class="w-8 h-8 rounded-full bg-indigo-500 flex items-center justify-center text-white">
                            <span>{{$connected_user->name[0]}}</span>
                        </div>
                        <span class="text-gray-700 font-medium hidden md:inline-block">{{$connected_user->name}}</span>
                    </div>
                </div>
            </div>
        </header>-->
@include('layouts.admin.header')
        <!-- Main Dashboard -->
        <main class="flex-1 overflow-y-auto p-4">
            <div class="mb-6">
                <h2 class="text-2xl font-bold text-gray-800">Dashboard</h2>
                <p class="text-gray-600">Bienvenue sur votre espace gestionnaire</p>
            </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Commandes du jour</p>
                            <h3 class="text-2xl font-bold text-gray-800">{{$daily_commande}}</h3>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-500">
                            <i class="fas fa-shopping-bag"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center">
                            <span class="text-green-500 text-sm flex items-center">
                                <i class="fas fa-arrow-up mr-1"></i> 16%
                            </span>
                        <span class="text-gray-400 text-sm ml-2">vs hier</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Recette journalière</p>
                            <h3 class="text-2xl font-bold text-gray-800">{{$daily_amount}} FCFA</h3>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-green-100 flex items-center justify-center text-green-500">
                            <i class="fas fa-euro-sign"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center">
                            <span class="text-green-500 text-sm flex items-center">
                                <i class="fas fa-arrow-up mr-1"></i> 8%
                            </span>
                        <span class="text-gray-400 text-sm ml-2">vs hier</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Commande validées aujourd'hui</p>
                            <h3 class="text-2xl font-bold text-gray-800">{{$validated_command}}</h3>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-amber-100 flex items-center justify-center text-amber-500">
                            <i class="fas fa-book"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center">
                            <span class="text-red-500 text-sm flex items-center">
                                <i class="fas fa-arrow-down mr-1"></i> 4%
                            </span>
                        <span class="text-gray-400 text-sm ml-2">vs hier</span>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-500 text-sm">Nombre total de clients</p>
                            <h3 class="text-2xl font-bold text-gray-800">{{$nb_client}}</h3>
                        </div>
                        <div class="w-12 h-12 rounded-full bg-blue-100 flex items-center justify-center text-blue-500">
                            <i class="fas fa-user-plus"></i>
                        </div>
                    </div>
                    <div class="mt-4 flex items-center">
                            <span class="text-green-500 text-sm flex items-center">
                                <i class="fas fa-arrow-up mr-1"></i> 12%
                            </span>
                        <span class="text-gray-400 text-sm ml-2">vs hier</span>
                    </div>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="text-lg font-semibold text-gray-800">Commandes par mois</h4>
                        <select class="text-sm border rounded p-1">
                            <option>Année 2025</option>
                            <option>Année 2024</option>
                        </select>
                    </div>
                    <div class="h-64">
                        <canvas id="ordersChart"></canvas>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="text-lg font-semibold text-gray-800">Livres vendus par catégorie</h4>
                        <select class="text-sm border rounded p-1">
                            <option>Avril 2025</option>
                            <option>Mars 2025</option>
                        </select>
                    </div>
                    <div class="h-64">
                        <canvas id="booksChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Recent Orders Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden mb-6">
                <div class="flex justify-between items-center p-4 border-b">
                    <h4 class="text-lg font-semibold text-gray-800">Commandes récentes</h4>

                </div>

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
            </div>

        </main>
    </div>
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

<script>
    // Orders Chart
    const ordersCtx = document.getElementById('ordersChart').getContext('2d');
    const ordersChart = new Chart(ordersCtx, {
        type: 'bar',
        data: {
            labels: ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Aoû', 'Sep', 'Oct', 'Nov', 'Déc'],
            datasets: [{
                label: 'Nombre de commandes',
                data: [65, 59, 80, 89, 76, 78, 90, 85, 92, 98, 103, 110],
                backgroundColor: 'rgba(79, 70, 229, 0.6)',
                borderColor: 'rgba(79, 70, 229, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Books by Category Chart
    const booksCtx = document.getElementById('booksChart').getContext('2d');
    const booksChart = new Chart(booksCtx, {
        type: 'doughnut',
        data: {
            labels: ['Roman', 'Science-Fiction', 'Histoire', 'Biographie', 'Sciences', 'Jeunesse'],
            datasets: [{
                label: 'Livres vendus',
                data: [35, 25, 15, 10, 8, 7],
                backgroundColor: [
                    'rgba(79, 70, 229, 0.8)',
                    'rgba(16, 185, 129, 0.8)',
                    'rgba(245, 158, 11, 0.8)',
                    'rgba(239, 68, 68, 0.8)',
                    'rgba(59, 130, 246, 0.8)',
                    'rgba(168, 85, 247, 0.8)'
                ],
                borderColor: [
                    'rgba(79, 70, 229, 1)',
                    'rgba(16, 185, 129, 1)',
                    'rgba(245, 158, 11, 1)',
                    'rgba(239, 68, 68, 1)',
                    'rgba(59, 130, 246, 1)',
                    'rgba(168, 85, 247, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right',
                }
            }
        }
    });
</script>
</body>
</html>

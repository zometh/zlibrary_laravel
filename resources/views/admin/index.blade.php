
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
                            <h3 class="text-2xl font-bold text-gray-800">12</h3>
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
                            <h3 class="text-2xl font-bold text-gray-800">3 450 €</h3>
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
                            <p class="text-gray-500 text-sm">Livres vendus</p>
                            <h3 class="text-2xl font-bold text-gray-800">27</h3>
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
                            <p class="text-gray-500 text-sm">Nouveaux clients</p>
                            <h3 class="text-2xl font-bold text-gray-800">5</h3>
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
                    <a href="#" class="text-indigo-600 hover:text-indigo-800 text-sm">Voir toutes</a>
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
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">#CMD-1234</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Sophie Martin</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">01/04/2025 09:45</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">54,90 €</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            En préparation
                                        </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">Détails</a>
                                <a href="#" class="text-green-600 hover:text-green-900">Modifier</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">#CMD-1233</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Jean Dupont</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">01/04/2025 08:32</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">98,50 €</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Expédiée
                                        </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">Détails</a>
                                <a href="#" class="text-green-600 hover:text-green-900">Modifier</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">#CMD-1232</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Marie Petit</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">01/04/2025 07:15</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">32,00 €</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            Payée
                                        </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">Détails</a>
                                <a href="#" class="text-green-600 hover:text-green-900">Modifier</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">#CMD-1231</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Thomas Bernard</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">31/03/2025 22:10</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">125,75 €</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                            En attente
                                        </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">Détails</a>
                                <a href="#" class="text-green-600 hover:text-green-900">Modifier</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">#CMD-1230</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Laura Dubois</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">31/03/2025 19:22</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">76,20 €</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Annulée
                                        </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900 mr-3">Détails</a>
                                <a href="#" class="text-green-600 hover:text-green-900">Modifier</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Low Stock Books Alert -->
            <div class="bg-white rounded-lg shadow overflow-hidden">
                <div class="flex justify-between items-center p-4 border-b">
                    <h4 class="text-lg font-semibold text-gray-800">Alerte Stock Faible</h4>
                    <a href="#" class="text-indigo-600 hover:text-indigo-800 text-sm">Gérer les stocks</a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Livre
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Auteur
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Catégorie
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Stock
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 bg-gray-200 rounded"></div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">L'Art de la Guerre</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Sun Tzu</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Stratégie</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-red-600 font-semibold">2</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Commander</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 bg-gray-200 rounded"></div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">1984</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">George Orwell</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Science-Fiction</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-red-600 font-semibold">3</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Commander</a>
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 bg-gray-200 rounded"></div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Le Petit Prince</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Antoine de Saint-Exupéry</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">Littérature</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-orange-600 font-semibold">5</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="#" class="text-indigo-600 hover:text-indigo-900">Commander</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- Charts JS -->
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

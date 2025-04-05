
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des livres</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        img{
            object-fit: cover;
        }

    </style>
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
            <div class="mb-3">
                <h2 class="text-2xl font-bold text-gray-800">GESTION DES LIVRES</h2>
            </div>
            @if (session('success'))

                <x-alert >
                    {{ session('success') }}
                </x-alert>
            @endif
            <!-- Statistics Cards -->



            <div class="mt-4 mb-4">
                <a href="{{route('books.create')}}" class="bg-indigo-800 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-indigo-500 hover:border-blue-500 rounded ">
                    Ajouter un livre
                </a>
            </div>
            <!-- Recent Orders Table -->
            <div class="bg-white rounded-lg shadow overflow-hidden mb-6">
                <div class="flex justify-between items-center p-4 border-b">
                    <h4 class="text-lg font-semibold text-gray-800">Tous les livres</h4>
                    <h4 class="text-lg font-semibold text-gray-800">TOTAL {{ $books->count() }}</h4>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Id
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Titre
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Description
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Auteur
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Catégorie
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Prix unitaire
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Stock
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Image
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Date ajout
                            </th>

                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($books as $book)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">{{ $book->id }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $book->title }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900" title="{{ $book->description }}">
                                        {{ \Illuminate\Support\Str::limit($book->description, 25, '...') }}
                                    </div>                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $book->author }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $book->category->name }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $book->price }} FCFA</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $book->stock }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        <img src="/storage/{{$book->image}}" alt="">
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $book->created_at->format('d/m/y') }}</div>
                                </td>


                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button onclick="openModal()" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600 transition">
                                        Supprimer
                                    </button>

                                    <!-- Modal -->
                                    <div id="deleteModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center hidden">
                                        <div class="bg-white rounded-lg p-6 w-96 shadow-lg">
                                            <h2 class="text-lg font-semibold text-gray-800">Confirmation</h2>
                                            <p class="text-gray-600 mt-2">Êtes-vous sûr de vouloir supprimer ce livre ?</p>

                                            <!-- Formulaire de suppression -->
                                            <form method="POST" action="{{ route('books.destroy', $book->id) }}" class="mt-4 flex justify-end space-x-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-300 rounded-md hover:bg-gray-400">
                                                    Annuler
                                                </button>
                                                <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                                                    Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </div>


                                    <a href="{{route('books.edit', $book->id)}}">
                                        <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md hover:bg-indigo-400 transition">
                                            Modifier
                                        </button>
                                    </a>



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
    function openModal() {
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('deleteModal').classList.add('hidden');
    }
</script>
</body>
<!-- Charts JS --
</body>
</html>

@include('base')
<body class="bg-gray-50">
<!-- Navbar -->
<nav class="bg-indigo-800 text-white shadow-lg">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
        <a href="#" class="font-bold text-xl">Librairie en Ligne</a>
        <div class="flex items-center space-x-4">
            <a href="/" class="hover:text-blue-200"><i class="fas fa-book mr-1"></i> Catalogue</a>
            <a href="{{ route('cart.show') }}" class="hover:text-blue-200"><i class="fas fa-shopping-cart mr-1"></i> Panier</a>


            <form action="{{ route('logout') }}" method="POST">
                @csrf


                    <button type="submit" class="bg-red-500 text-white px-2 py-2 rounded-md hover:bg-red-600">
                        <i class="fas fa-sign-out-alt w-5 h-5 mr-1"></i>
                        Déconnexion
                    </button>

            </form>
        </div>
    </div>
</nav>

<!-- Contenu principal -->
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Mon Profil</h1>

    <!-- Carte profil & informations personnelles -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Carte profil -->
        <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center">
            <div class="w-32 h-32 rounded-full bg-blue-100 flex items-center justify-center mb-4">
                <i class="fas fa-user text-5xl text-blue-500"></i>
            </div>
            <h2 class="font-bold text-xl">John Doe</h2>
            <p class="text-gray-600 mb-4">Client depuis: Janvier 2024</p>
            <button class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700 w-full">
                <i class="fas fa-edit mr-1"></i> Modifier mon profil
            </button>
        </div>

        <!-- Informations personnelles -->
        <div class="bg-white rounded-lg shadow-md p-6 md:col-span-2">
            <h2 class="font-bold text-xl mb-4">Informations personnelles</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <p class="text-gray-600">Nom</p>
                    <p class="font-medium">Doe</p>
                </div>
                <div>
                    <p class="text-gray-600">Prénom</p>
                    <p class="font-medium">John</p>
                </div>
                <div>
                    <p class="text-gray-600">Email</p>
                    <p class="font-medium">john.doe@example.com</p>
                </div>
                <div>
                    <p class="text-gray-600">Téléphone</p>
                    <p class="font-medium">+33 6 12 34 56 78</p>
                </div>
                <div>
                    <p class="text-gray-600">Adresse</p>
                    <p class="font-medium">123 Rue de Paris, 75001 Paris</p>
                </div>
                <div>
                    <p class="text-gray-600">Mot de passe</p>
                    <p class="font-medium">••••••••••• <a href="#"
                                                          class="text-blue-600 hover:underline ml-2">Modifier</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Mes commandes récentes -->
    <div class="bg-white rounded-lg shadow-md p-6 mb-8">
        <div class="flex justify-between items-center mb-4">
            <h2 class="font-bold text-xl">Mes commandes récentes</h2>
            <a href="#" class="text-blue-600 hover:underline">Voir toutes mes commandes</a>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead>
                <tr class="bg-gray-100 text-left">
                    <th class="py-3 px-4 font-semibold">N° Commande</th>
                    <th class="py-3 px-4 font-semibold">Date</th>
                    <th class="py-3 px-4 font-semibold">Montant</th>
                    <th class="py-3 px-4 font-semibold">Statut</th>
                    <th class="py-3 px-4 font-semibold">Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr class="border-b">
                    <td class="py-3 px-4">#CMD-2345</td>
                    <td class="py-3 px-4">28/03/2025</td>
                    <td class="py-3 px-4">42,90 €</td>
                    <td class="py-3 px-4"><span class="bg-green-100 text-green-800 py-1 px-2 rounded-full text-sm">Expédiée</span>
                    </td>
                    <td class="py-3 px-4">
                        <a href="#" class="text-blue-600 hover:underline mr-2">Détails</a>
                        <a href="#" class="text-blue-600 hover:underline">Facture</a>
                    </td>
                </tr>
                <tr class="border-b">
                    <td class="py-3 px-4">#CMD-2344</td>
                    <td class="py-3 px-4">15/03/2025</td>
                    <td class="py-3 px-4">29,50 €</td>
                    <td class="py-3 px-4"><span
                            class="bg-blue-100 text-blue-800 py-1 px-2 rounded-full text-sm">Payée</span></td>
                    <td class="py-3 px-4">
                        <a href="#" class="text-blue-600 hover:underline mr-2">Détails</a>
                        <a href="#" class="text-blue-600 hover:underline">Facture</a>
                    </td>
                </tr>
                <tr>
                    <td class="py-3 px-4">#CMD-2340</td>
                    <td class="py-3 px-4">02/03/2025</td>
                    <td class="py-3 px-4">58,75 €</td>
                    <td class="py-3 px-4"><span class="bg-purple-100 text-purple-800 py-1 px-2 rounded-full text-sm">Livrée</span>
                    </td>
                    <td class="py-3 px-4">
                        <a href="#" class="text-blue-600 hover:underline mr-2">Détails</a>
                        <a href="#" class="text-blue-600 hover:underline">Facture</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Mes livres préférés -->
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex justify-between items-center mb-4">
            <h2 class="font-bold text-xl">Mes livres préférés</h2>
            <a href="#" class="text-blue-600 hover:underline">Voir tous</a>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            <!-- Livre 1 -->
            <div class="border rounded-lg overflow-hidden hover:shadow-md transition-shadow">
                <div class="h-48 bg-gray-200 flex items-center justify-center">
                    <img src="/api/placeholder/120/180" alt="Couverture du livre" class="h-full object-cover"/>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-1">Le Petit Prince</h3>
                    <p class="text-gray-600 text-sm mb-2">Antoine de Saint-Exupéry</p>
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-blue-700">12,90 €</span>
                        <button class="bg-blue-600 text-white py-1 px-3 rounded-full text-sm hover:bg-blue-700">
                            <i class="fas fa-shopping-cart mr-1"></i> Acheter
                        </button>
                    </div>
                </div>
            </div>

            <!-- Livre 2 -->
            <div class="border rounded-lg overflow-hidden hover:shadow-md transition-shadow">
                <div class="h-48 bg-gray-200 flex items-center justify-center">
                    <img src="/api/placeholder/120/180" alt="Couverture du livre" class="h-full object-cover"/>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-1">Les Misérables</h3>
                    <p class="text-gray-600 text-sm mb-2">Victor Hugo</p>
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-blue-700">18,50 €</span>
                        <button class="bg-blue-600 text-white py-1 px-3 rounded-full text-sm hover:bg-blue-700">
                            <i class="fas fa-shopping-cart mr-1"></i> Acheter
                        </button>
                    </div>
                </div>
            </div>

            <!-- Livre 3 -->
            <div class="border rounded-lg overflow-hidden hover:shadow-md transition-shadow">
                <div class="h-48 bg-gray-200 flex items-center justify-center">
                    <img src="/api/placeholder/120/180" alt="Couverture du livre" class="h-full object-cover"/>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-1">L'Étranger</h3>
                    <p class="text-gray-600 text-sm mb-2">Albert Camus</p>
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-blue-700">9,90 €</span>
                        <button class="bg-blue-600 text-white py-1 px-3 rounded-full text-sm hover:bg-blue-700">
                            <i class="fas fa-shopping-cart mr-1"></i> Acheter
                        </button>
                    </div>
                </div>
            </div>

            <!-- Livre 4 -->
            <div class="border rounded-lg overflow-hidden hover:shadow-md transition-shadow">
                <div class="h-48 bg-gray-200 flex items-center justify-center">
                    <img src="/api/placeholder/120/180" alt="Couverture du livre" class="h-full object-cover"/>
                </div>
                <div class="p-4">
                    <h3 class="font-semibold text-lg mb-1">1984</h3>
                    <p class="text-gray-600 text-sm mb-2">George Orwell</p>
                    <div class="flex justify-between items-center">
                        <span class="font-bold text-blue-700">11,50 €</span>
                        <button class="bg-blue-600 text-white py-1 px-3 rounded-full text-sm hover:bg-blue-700">
                            <i class="fas fa-shopping-cart mr-1"></i> Acheter
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-800 text-white mt-10 py-6">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div>
                <h3 class="text-lg font-semibold mb-4">Librairie en Ligne</h3>
                <p class="text-gray-400">Votre destination pour les meilleurs livres.</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Liens rapides</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="text-gray-400 hover:text-white">Accueil</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Catalogue</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Mon Profil</a></li>
                    <li><a href="#" class="text-gray-400 hover:text-white">Mes Commandes</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Contact</h3>
                <ul class="space-y-2 text-gray-400">
                    <li><i class="fas fa-map-marker-alt mr-2"></i> 123 Rue de Paris, 75001 Paris</li>
                    <li><i class="fas fa-phone mr-2"></i> +33 1 23 45 67 89</li>
                    <li><i class="fas fa-envelope mr-2"></i> contact@librairie-en-ligne.fr</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-700 mt-6 pt-6 text-center text-gray-400">
            <p>&copy; 2025 Librairie en Ligne. Tous droits réservés.</p>
        </div>
    </div>
</footer>
</body>
</html>

@include('base');
@include('layouts.user.navbar')
<title>Mes commandes</title>

<div class="min-h-screen bg-gray-50 ">
    <!-- Navigation (même que page d'accueil) -->

    <!-- Contenu Mes commandes -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Mes commandes</h2>

        <div class="space-y-4">
            <!-- Commande 1 -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6 flex flex-wrap justify-between items-center">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Commande #12345</h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Passée le 5 mars 2025</p>
                    </div>
                    <div class="mt-2 sm:mt-0">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
              En préparation
            </span>
                    </div>
                </div>
                <div class="border-t border-gray-200">
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Total</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">33,48€</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Adresse de livraison</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            123 rue des Lilas<br>
                            75001 Paris<br>
                            France
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Articles</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            <ul class="divide-y divide-gray-200">
                                <li class="py-2 flex justify-between">
                                    <div>
                                        <span class="font-medium">Le Comte de Monte-Cristo</span>
                                        <span class="text-gray-500 ml-2">x1</span>
                                    </div>
                                    <span>15,99€</span>
                                </li>
                                <li class="py-2 flex justify-between">
                                    <div>
                                        <span class="font-medium">L'Étranger</span>
                                        <span class="text-gray-500 ml-2">x1</span>
                                    </div>
                                    <span>12,50€</span>
                                </li>
                                <li class="py-2 flex justify-between text-gray-500">
                                    <span>Frais de livraison</span>
                                    <span>4,99€</span>
                                </li>
                            </ul>
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Actions</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 space-x-2">
                            <a href="{{ route('user.command-details') }}" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Voir le détail
                            </a>
                            <a href="#" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Télécharger la facture
                            </a>
                        </dd>
                    </div>
                    </dl>
                </div>
            </div>

            <!-- Commande 2 -->
            <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                <div class="px-4 py-5 sm:px-6 flex flex-wrap justify-between items-center">
                    <div>
                        <h3 class="text-lg leading-6 font-medium text-gray-900">Commande #12344</h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">Passée le 2 février 2025</p>
                    </div>
                    <div class="mt-2 sm:mt-0">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
              Livrée
            </span>
                    </div>
                </div>
                <div class="border-t border-gray-200">
                    <dl>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Total</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">49,97€</dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Adresse de livraison</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                123 rue des Lilas<br>
                                75001 Paris<br>
                                France
                            </dd>
                        </div>
                        <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Articles</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                                <ul class="divide-y divide-gray-200">
                                    <li class="py-2 flex justify-between">
                                        <div>
                                            <span class="font-medium">1984</span>
                                            <span class="text-gray-500 ml-2">x1</span>
                                        </div>
                                        <span>14,50€</span>
                                    </li>
                                    <li class="py-2 flex justify-between">
                                        <div>
                                            <span class="font-medium">Harry Potter (Tome 1)</span>
                                            <span class="text-gray-500 ml-2">x1</span>
                                        </div>
                                        <span>19,99€</span>
                                    </li>
                                    <li class="py-2 flex justify-between">
                                        <div>
                                            <span class="font-medium">Les Misérables</span>
                                            <span class="text-gray-500 ml-2">x1</span>
                                        </div>
                                        <span>10,49€</span>
                                    </li>
                                    <li class="py-2 flex justify-between text-gray-500">
                                        <span>Frais de livraison</span>
                                        <span>4,99€</span>
                                    </li>
                                </ul>
                            </dd>
                        </div>
                        <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                            <dt class="text-sm font-medium text-gray-500">Actions</dt>
                            <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0 space-x-2">
                                <a href="#" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Voir le détail
                                </a>
                                <a href="#" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Télécharger la facture
                                </a>
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</div>

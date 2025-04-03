@include('base')
<div class="min-h-screen bg-gray-50 ">
    <!-- Navigation (même que page d'accueil) -->

    <!-- Contenu détail commande -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <a href="{{route('user.commands')}}" class="text-indigo-600 hover:text-indigo-900 mb-4 inline-flex items-center">
            <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Retour à mes commandes
        </a>

        <h2 class="text-2xl font-bold text-gray-900 mb-4">Détail de la commande #12345</h2>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Informations générales</h3>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Numéro de commande</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">#12345</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Date de commande</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">5 mars 2025 à 14:35</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Statut</dt>
                        <dd class="mt-1 text-sm sm:col-span-2 sm:mt-0">
              <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-800">
                En préparation
              </span>
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Total</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">33,48€</dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Mode de paiement</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Carte bancaire (•••• 4242)</dd>
                    </div>
                </dl>
            </div>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Livraison</h3>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Destinataire</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Jean Dupont</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Adresse</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">
                            123 rue des Lilas<br>
                            75001 Paris<br>
                            France
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Téléphone</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">+33 6 12 34 56 78</dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Mode de livraison</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:col-span-2 sm:mt-0">Livraison standard (3-5 jours ouvrés)</dd>
                    </div>
                </dl>
            </div>
        </div>

        <div class="bg-white shadow overflow-hidden sm:rounded-lg mb-6">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Articles commandés</h3>
            </div>
            <div class="border-t border-gray-200">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Produit
                            </th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Prix unitaire
                            </th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Quantité
                            </th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Total
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-md" src="/api/placeholder/40/50" alt="Couverture du livre">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">Le Comte de Monte-Cristo</div>
                                        <div class="text-sm text-gray-500">Alexandre Dumas</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-500">
                                15,99€
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-500">
                                1
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                15,99€
                            </td>
                        </tr>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-md" src="/api/placeholder/40/50" alt="Couverture du livre">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">L'Étranger</div>
                                        <div class="text-sm text-gray-500">Albert Camus</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-500">
                                12,50€
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm text-gray-500">
                                1
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                12,50€
                            </td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td colspan="3" class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                Sous-total
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                28,49€
                            </td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td colspan="3" class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                Frais de livraison
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                4,99€
                            </td>
                        </tr>
                        <tr class="bg-gray-50">
                            <td colspan="3" class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                Total
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-bold">
                                33,48€
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <a href="#" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Télécharger la facture
            </a>
        </div>
    </div>
</div>

<!-- Modal de confirmation de commande réussie -->
<div class="fixed z-10 inset-0 overflow-y-auto hidden" id="confirmation-modal">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg px-4 pt-5 pb-4 text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full sm:p-6">
            <div>
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
                    <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
                <div class="mt-3 text-center sm:mt-5">
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Commande passée avec succès !</h3>
                    <div class="mt-2">
                        <p class="text-sm text-gray-500">
                            Votre commande #12345 a été enregistrée. Vous recevrez un email de confirmation dans quelques instants.
                        </p>
                    </div>
                </div>
            </div>
            <div class="mt-5 sm:mt-6">
                <button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                    Voir le détail de ma commande
                </button>
                <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:text-sm">
                    Retour au catalogue
                </button>
            </div>
        </div>
    </div>
</div>

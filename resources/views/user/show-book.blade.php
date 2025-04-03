@include('base')
@include('layouts.user.navbar')
<div class="min-h-screen bg-gray-50">

    <!-- Navigation (même que page d'accueil) -->

    <!-- Contenu détail livre -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <a href="/" class="text-indigo-600 hover:text-indigo-900 mb-4 inline-flex items-center">
                    <svg class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Retour au catalogue
                </a>
                <div class="flex flex-col md:flex-row">
                    <div class="md:w-1/3">
                        <img src="/storage/{{ $book->image }}" alt="Couverture du livre" class="w-full rounded-lg shadow-md">
                    </div>
                    <div class="md:w-2/3 md:pl-8 mt-4 md:mt-0">
                        <h2 class="text-3xl font-bold text-gray-900">{{ $book->title }}</h2>
                        <p class="text-xl text-gray-600 mt-2">{{ $book->author }}</p>
                        <div class="mt-4">
              <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                En stock ({{ $book->stock }} exemplaires)
              </span>
                        </div>
                        <div class="mt-4">
                            <h3 class="text-lg font-medium text-gray-900">Description</h3>
                            <p class="mt-2 text-gray-600">
                                {{ $book->description }}
                            </p>
                        </div>
                        <div class="mt-6">
                            <h3 class="text-lg font-medium text-gray-900">Détails</h3>
                            <div class="mt-2 grid grid-cols-2 gap-4">
                                <div>
                                    <span class="text-sm text-gray-500">Catégorie</span>
                                    <p class="text-sm font-medium text-gray-900">{{ $book->category->name }}</p>
                                </div>


                                <div>
                                    <span class="text-sm text-gray-500">Année de publication</span>
                                    <p class="text-sm font-medium text-gray-900">{{ $book->updated_at->format('y') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8 flex items-center">
                            <h3 class="text-2xl font-bold text-gray-900 mr-4">{{ $book->price }} FCFA</h3>
                            <button type="button" class="inline-flex justify-center items-center px-6 py-3 border border-transparent shadow-sm text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Ajouter au panier
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

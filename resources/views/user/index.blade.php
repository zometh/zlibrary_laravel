@include('base')
<div class="min-h-screen bg-gray-50">
    <!-- Navigation -->
    @include('layouts.user.navbar')

    <!-- Filtres et recherche -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        <div class="bg-white p-4 rounded-lg shadow-sm">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-4">
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700">Recherche</label>
                    <input type="text" name="search" id="search"
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                           placeholder="Titre, auteur...">
                </div>
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Catégorie</label>
                    <select id="category" name="category_id"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <option value="all">Toutes les catégories</option>
                        @foreach($categories as $c)
                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div>
                    <label for="category" class="block text-sm font-medium text-gray-700">Auteur</label>
                    <select id="category" name="category_id"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <option value="all">Toutes les auteurs</option>
                        @foreach($authors as $a)
                            <option value="{{ $a }}">{{ $a }}</option>
                        @endforeach

                    </select>
                </div>

                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Prix max</label>
                    <input type="range" id="price" name="price" min="0" max="100" class="mt-1 block w-full" value="50">
                    <span class="text-sm text-gray-500">50€</span>
                </div>
            </div>
            <div class="mt-4 flex justify-end">
                <button type="button"
                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Filtrer
                </button>
            </div>
        </div>
    </div>

    <!-- Catalogue de livres -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        @if (session('success'))

            <x-alert >
                {{ session('success') }}
            </x-alert>
        @endif
        <h2 class="text-2xl font-bold text-gray-900 mb-4">Catalogue de livres</h2>
        <div class="grid grid-cols-1 gap-y-10 gap-x-6 sm:grid-cols-2 lg:grid-cols-4 xl:gap-x-8">
            <!-- Livre 1 -->
            @foreach($books as $book)

                <div class="group relative">
                    <div
                        class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                        <img src="storage/{{ $book->image }}" alt="Couverture du livre"
                             class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                    </div>
                    <div class="mt-4 flex justify-between">
                        <div>
                            <h3 class="text-sm text-gray-700">
                                {{ $book->title }}
                            </h3>
                            <p class="mt-1 text-sm text-gray-500">{{ $book->author }}</p>
                        </div>
                        <p class="text-sm font-medium text-gray-900">{{ $book->price }} FCFA</p>
                    </div>
                    <div class="mt-4 flex justify-between">
                        <x-book_status stock="{{$book->stock}}"></x-book_status>
                        <p class="text-sm font-medium text-gray-900">{{ $book->stock }} articles</p>
                    </div>
                    <div class="mt-2 mb-2">
                        <form method="GET" action="{{ route('books.show-book', $book->id) }}">
                            <button type="submit"
                                    class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                Voir le livre
                            </button>
                        </form>
                        @if($book->stock == 0)
                            <button type="button" disabled class="mt-2 mb-2 w-full inline-flex justify-center items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-400 cursor-not-allowed">
                                Indisponible
                            </button>
                        @else

                            <form method="POST" action="{{ route('cart.add', $book->id) }}">
                                @csrf
                                <button type="submit"
                                        class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                                    Ajouter au panier
                                </button>
                            </form>
                        @endif

                    </div>


                </div>

            @endforeach
            <!--

            <div class="group relative">
                <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                    <img src="/api/placeholder/240/320" alt="Couverture du livre" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-sm text-gray-700">
                            <a href="#">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                L'Étranger
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">Albert Camus</p>
                    </div>
                    <p class="text-sm font-medium text-gray-900">12,50€</p>
                </div>
                <div class="mt-2">
          <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
            En stock
          </span>
                </div>
                <div class="mt-2">
                    <button type="button" class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Ajouter au panier
                    </button>
                </div>
            </div>


            <div class="group relative">
                <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                    <img src="/api/placeholder/240/320" alt="Couverture du livre" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-sm text-gray-700">
                            <a href="#">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                Harry Potter et la Chambre des Secrets
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">J.K. Rowling</p>
                    </div>
                    <p class="text-sm font-medium text-gray-900">19,99€</p>
                </div>
                <div class="mt-2">
          <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
            Rupture de stock
          </span>
                </div>
                <div class="mt-2">
                    <button type="button" disabled class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-400 cursor-not-allowed">
                        Indisponible
                    </button>
                </div>
            </div>


            <div class="group relative">
                <div class="w-full min-h-80 bg-gray-200 aspect-w-1 aspect-h-1 rounded-md overflow-hidden group-hover:opacity-75 lg:h-80 lg:aspect-none">
                    <img src="/api/placeholder/240/320" alt="Couverture du livre" class="w-full h-full object-center object-cover lg:w-full lg:h-full">
                </div>
                <div class="mt-4 flex justify-between">
                    <div>
                        <h3 class="text-sm text-gray-700">
                            <a href="#">
                                <span aria-hidden="true" class="absolute inset-0"></span>
                                1984
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-500">George Orwell</p>
                    </div>
                    <p class="text-sm font-medium text-gray-900">14,50€</p>
                </div>
                <div class="mt-2">
          <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
            En stock
          </span>
                </div>
                <div class="mt-2">
                    <button type="button" class="w-full inline-flex justify-center items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Ajouter au panier
                    </button>
                </div>
            </div>-->
        </div>
        <div class="mt-2 mb-2">
            {{$books->links()}}

        </div>
        <!--  <div class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6 mt-4 rounded-lg">
              <div class="flex flex-1 justify-between sm:hidden">
                  <a href="#" class="relative inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Précédent</a>
                  <a href="#" class="relative ml-3 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50">Suivant</a>
              </div>
              <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
                  <div>
                      <p class="text-sm text-gray-700">
                          Affichage de <span class="font-medium">1</span> à <span class="font-medium">4</span> sur <span class="font-medium">20</span> résultats
                      </p>
                  </div>
                  <div>
                      <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                          <a href="#" class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                              <span class="sr-only">Précédent</span>
                              <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                  <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                              </svg>
                          </a>
                          <a href="#" aria-current="page" class="relative z-10 inline-flex items-center bg-indigo-600 px-4 py-2 text-sm font-semibold text-white focus:z-20 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">1</a>
                          <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">2</a>
                          <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">3</a>
                          <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-700 ring-1 ring-inset ring-gray-300 focus:outline-offset-0">...</span>
                          <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">5</a>
                          <a href="#" class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                              <span class="sr-only">Suivant</span>
                              <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                  <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                              </svg>
                          </a>
                      </nav>
                  </div>
              </div>
          </div>-->
    </div>
</div>

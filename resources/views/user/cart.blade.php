@include('base')
@include('layouts.user.navbar')
<!-- Page Panier -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <h1 class="text-2xl font-bold text-gray-900 mb-6">Mon Panier</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Articles du panier (2 colonnes sur grand écran) -->
        <div class="lg:col-span-2">
            @if (session('success'))

                <x-alert >
                    {{ session('success') }}
                </x-alert>
            @endif
            <div class="bg-white rounded-lg shadow p-6 mb-6">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="font-bold text-xl">Articles ({{count(session()->get('cart'))}})</h2>
                    @if(session('cart'))
                        @if(count(session()->get('cart')) != 0)
                            <form method="post" action="{{route('cart.clear')}}">
                                @csrf
                                <button class="text-gray-500 hover:text-red-500 text-sm flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Vider le panier
                                </button>
                            </form>
                        @endif
                    @endif


                </div>

                <!-- Liste des articles -->
                <div class="divide-y">
                    <!-- Article 1 -->
                    @if(session('cart'))
                        @php
                        $nb_books = count(session('cart'));
                            $amount_total = 0;

                        @endphp
                        @foreach(session('cart') as $id => $book)
                            @php
                                $amount_total += $book['price'] * $book['quantity'];
                            @endphp
                        <div class="py-4 flex flex-col sm:flex-row">
                            <div class="flex-shrink-0 w-full sm:w-24 h-36 bg-gray-100 flex items-center justify-center mb-4 sm:mb-0 sm:mr-4 border">
                                <img src="/storage/{{$book['image']}}" alt="Couverture du livre" class="h-full object-cover" />
                            </div>
                            <div class="flex-grow">
                                <div class="flex flex-col sm:flex-row sm:justify-between">
                                    <div>
                                        <h3 class="font-semibold text-lg">{{$book['title']}}</h3>
                                        <p class="text-gray-600 mb-2">{{$book['author']}}</p>

                                        <p class="text-sm text-indigo-600 mb-2">Disponible en stock</p>
                                    </div>
                                    <div class="flex flex-col items-start sm:items-end mt-2 sm:mt-0">
                                        <span class="font-bold text-indigo-700 text-lg mb-2">{{$book['price']}} FCFA</span>
                                        <div class="flex items-center border overflow-hidden space-x-1">
                                            <h3 class="font-semibold text-lg">Quantité</h3>
                                            <h3 class="font-semibold text-lg"> {{$book['quantity']}} </h3>
                                            <form method="post" action="{{route('cart.increment', $book['id'])}}">
                                                @csrf
                                                <button type="submit" class="px-3 py-1 bg-gray-100 hover:bg-gray-200 border-l">+</button>
                                            </form>
                                            <form method="post" action="{{route('cart.decrement', $book['id'])}}">
                                                @csrf
                                                <button type="submit" class="px-3 py-1 bg-gray-100 hover:bg-gray-200 border-l">-</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center mt-4">

                                   <form method="post" action="{{route('cart.delete', $book['id'])}}">
                                       @csrf
                                       @method('DELETE')
                                       <button type="submit" class="text-red-500 hover:text-red-700 text-sm flex items-center">
                                           <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                           </svg>
                                           Supprimer
                                       </button>
                                   </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @else
                        <p>Votre panier est vide.</p>
                    @endif

                    <!--
                    <div class="py-4 flex flex-col sm:flex-row">
                        <div class="flex-shrink-0 w-full sm:w-24 h-36 bg-gray-100 flex items-center justify-center mb-4 sm:mb-0 sm:mr-4 border">
                            <img src="/api/placeholder/90/120" alt="Couverture du livre" class="h-full object-cover" />
                        </div>
                        <div class="flex-grow">
                            <div class="flex flex-col sm:flex-row sm:justify-between">
                                <div>
                                    <h3 class="font-semibold text-lg">1984</h3>
                                    <p class="text-gray-600 mb-2">George Orwell</p>
                                    <p class="text-sm text-indigo-600 mb-2">Disponible en stock</p>
                                </div>
                                <div class="flex flex-col items-start sm:items-end mt-2 sm:mt-0">
                                    <span class="font-bold text-indigo-700 text-lg mb-2">11,50 €</span>
                                    <div class="flex items-center border rounded overflow-hidden">
                                        <button class="px-3 py-1 bg-gray-100 hover:bg-gray-200 border-r">-</button>
                                        <input type="number" value="1" min="1" class="w-12 py-1 text-center focus:outline-none" />
                                        <button class="px-3 py-1 bg-gray-100 hover:bg-gray-200 border-l">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between items-center mt-4">
                                <button class="text-indigo-600 hover:text-indigo-800 text-sm flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                    Ajouter aux favoris
                                </button>
                                <button class="text-red-500 hover:text-red-700 text-sm flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Supprimer
                                </button>
                            </div>
                        </div>
                    </div>


                    <div class="py-4 flex flex-col sm:flex-row">
                        <div class="flex-shrink-0 w-full sm:w-24 h-36 bg-gray-100 flex items-center justify-center mb-4 sm:mb-0 sm:mr-4 border">
                            <img src="/api/placeholder/90/120" alt="Couverture du livre" class="h-full object-cover" />
                        </div>
                        <div class="flex-grow">
                            <div class="flex flex-col sm:flex-row sm:justify-between">
                                <div>
                                    <h3 class="font-semibold text-lg">L'Étranger</h3>
                                    <p class="text-gray-600 mb-2">Albert Camus</p>
                                    <p class="text-sm text-indigo-600 mb-2">Disponible en stock</p>
                                </div>
                                <div class="flex flex-col items-start sm:items-end mt-2 sm:mt-0">
                                    <span class="font-bold text-indigo-700 text-lg mb-2">9,90 €</span>
                                    <div class="flex items-center border rounded overflow-hidden">
                                        <button class="px-3 py-1 bg-gray-100 hover:bg-gray-200 border-r">-</button>
                                        <input type="number" value="1" min="1" class="w-12 py-1 text-center focus:outline-none" />
                                        <button class="px-3 py-1 bg-gray-100 hover:bg-gray-200 border-l">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between items-center mt-4">
                                <button class="text-indigo-600 hover:text-indigo-800 text-sm flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                    </svg>
                                    Ajouter aux favoris
                                </button>
                                <button class="text-red-500 hover:text-red-700 text-sm flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                    Supprimer
                                </button>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>

            <!-- Continuer vos achats -->
            <div class="flex mt-4">
                <a href="/" class="flex items-center text-indigo-600 hover:text-indigo-800">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
                    </svg>
                    Continuer vos achats
                </a>
            </div>
        </div>

        <!-- Résumé de la commande -->
        @if(count(session()->get('cart')) != 0)
        <div class="lg:col-span-1">
            <div class="bg-white rounded-lg shadow p-6 sticky top-4">
                <h2 class="font-bold text-xl mb-4">Résumé de la commande</h2>

                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-gray-600">Nombre d'articles total</span>
                        <span class="font-semibold">{{$nb_books}}</span>
                    </div>
                    @foreach(session('cart') as $id => $book)
                    <div class="flex justify-between">
                        <span class="text-gray-600">{{$book['title']}}</span>
                        <span class="font-semibold">{{$book['quantity']}}</span>
                    </div>
                    @endforeach
                    <div class="border-t pt-3 mt-3">
                        <div class="flex justify-between">
                            <span class="font-bold text-lg">Total</span>
                            <span class="font-bold text-xl text-indigo-700">{{$amount_total}} FCFA</span>
                        </div>
                    </div>
                </div>



                <!-- Bouton de validation -->
                <div class="mt-6">
                    <form action="{{route('user.command-confirm')}}" method="post">
                        @csrf
                        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white py-3 px-4 rounded font-semibold transition duration-150 ease-in-out">
                            Passer la commande
                        </button>
                    </form>
                </div>

                <!-- Méthodes de paiement acceptées -->
                <div class="mt-6">
                    <p class="text-sm text-gray-600 mb-2">Nous acceptons:</p>
                    <div class="flex space-x-2">
                        <span class="bg-gray-100 p-1 rounded">
                            <svg class="h-6 w-10" viewBox="0 0 40 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="40" height="24" rx="4" fill="#F3F4F6" />
                                <path d="M24 16H16V8H24V16Z" fill="#FF5F00" />
                                <path d="M16.6 12C16.6 10.2 17.5 8.7 18.9 7.8C18.1 7.3 17.1 7 16 7C12.7 7 10 9.2 10 12C10 14.8 12.7 17 16 17C17.1 17 18.1 16.7 18.9 16.2C17.5 15.3 16.6 13.8 16.6 12Z" fill="#EB001B" />
                                <path d="M30 12C30 14.8 27.3 17 24 17C22.9 17 21.9 16.7 21.1 16.2C22.5 15.3 23.4 13.8 23.4 12C23.4 10.2 22.5 8.7 21.1 7.8C21.9 7.3 22.9 7 24 7C27.3 7 30 9.2 30 12Z" fill="#0099DF" />
                            </svg>
                        </span>
                        <span class="bg-gray-100 p-1 rounded">
                            <svg class="h-6 w-10" viewBox="0 0 40 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="40" height="24" rx="4" fill="#F3F4F6" />
                                <path d="M16 16.3L17.2 8H19.1L17.9 16.3H16Z" fill="#0066B2" />
                                <path d="M24.8 8.1C24.2 7.9 23.1 7.6 22 7.6C19.6 7.6 18 8.7 18 10.4C18 11.7 19.2 12.3 20.1 12.7C21 13.1 21.3 13.4 21.3 13.7C21.3 14.2 20.7 14.5 19.9 14.5C18.9 14.5 18.3 14.3 17.4 13.9L17.1 13.8L16.8 15.5C17.5 15.8 18.6 16 19.8 16C22.4 16 24 14.9 24 13.1C24 12.1 23.4 11.3 22 10.8C21.2 10.5 20.6 10.2 20.6 9.8C20.6 9.5 21 9.1 21.9 9.1C22.6 9.1 23.2 9.2 23.6 9.5L23.8 9.6L24.2 8.1H24.8Z" fill="#0066B2" />
                                <path d="M27.8 8H29.3L31.3 16.3H29.6C29.6 16.3 29.3 15 29.3 14.7H26.1C26 15.1 25.6 16.3 25.6 16.3H23.6L27.2 8.8C27.4 8.3 27.5 8.1 27.8 8ZM27.1 12.8H28.8C28.7 12.2 28.2 10.5 28.2 10.5C28.2 10.5 28 10 27.9 9.6L27.7 10.8C27.7 10.8 27.3 12.2 27.1 12.8Z" fill="#0066B2" />
                                <path d="M13.7 8L11.9 13.7L11.7 12.9C11.3 11.6 10 10.1 8.5 9.4L10.2 16.3H12.2L15.7 8H13.7Z" fill="#0066B2" />
                                <path d="M10.1 8.3H7L7 8.5C9.2 9.1 10.7 10.8 11.2 12.8L10.5 8.9C10.4 8.4 10.3 8.3 10.1 8.3Z" fill="#FAA61A" />
                            </svg>
                        </span>
                        <span class="bg-gray-100 p-1 rounded">
                            <svg class="h-6 w-10" viewBox="0 0 40 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="40" height="24" rx="4" fill="#F3F4F6" />
                                <path d="M22.3 7.9H17.7V16.1H22.3V7.9Z" fill="#006FCF" />
                                <path d="M18 11.5C18 13.4 19.9 15 22.3 15C23 15 23.8 14.8 24.5 14.5L25 16C24.1 16.3 23.2 16.5 22.3 16.5C19.2 16.5 16.6 14.3 16.6 11.5C16.6 8.7 19.2 6.5 22.3 6.5C23.2 6.5 24.1 6.7 24.9 7L24.5 8.5C23.8 8.2 23 8 22.3 8C19.9 8 18 9.6 18 11.5Z" fill="#006FCF" />
                            </svg>
                        </span>
                        <span class="bg-gray-100 p-1 rounded">
                            <svg class="h-6 w-10" viewBox="0 0 40 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="40" height="24" rx="4" fill="#F3F4F6" />
                                <path d="M26.5 12C26.5 9.5 24.5 7.5 22 7.5C19.5 7.5 17.5 9.5 17.5 12C17.5 14.5 19.5 16.5 22 16.5C24.5 16.5 26.5 14.5 26.5 12Z" fill="#FFB600" />
                                <path d="M22 7.5C24.5 7.5 26.5 9.5 26.5 12C26.5 14.5 24.5 16.5 22 16.5" fill="#F7981D" />
                                <path d="M22 7.5C19.5 7.5 17.5 9.5 17.5 12C17.5 14.5 19.5 16.5 22 16.5" fill="#FF8500" />
                                <path d="M15 7.5H29V16.5H15V7.5Z" fill="#FF5050" opacity="0" />
                                <path d="M15 7.5H22V16.5H15V7.5Z" fill="#E83639" opacity="0" />
                                <path d="M22 16.5H29V7.5H22V16.5Z" fill="#C01031" opacity="0" />
                            </svg>
                        </span>
                    </div>
                </div>

                <!-- Sécurité -->
                <div class="mt-6 flex items-center text-sm text-gray-500">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                    Paiement sécurisé
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

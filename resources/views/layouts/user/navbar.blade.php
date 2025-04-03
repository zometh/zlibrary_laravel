
@php
    $style = 'border-indigo-500';
@endphp
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="/"><span class="text-2xl font-bold text-indigo-600">ZLibrary</span></a>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a
                            @class(['text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium',
                                request()->route()->getName() == '' ? $style : ''
])
                            href="/">
                            Catalogue
                        </a>
                        <a
                            @class(['text-gray-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium',
                                request()->route()->getName() == 'user.commands' ? $style : ''
])
                            href="{{ route('user.commands') }}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                            Mes commandes
                        </a>
                    </div>
                </div>
                <div class="flex items-center">
                    <div class="ml-3 relative">
                        <a href="{{ route('cart.show') }}">
                            <div>
                                <button type="button"
                                        class="mr-2 bg-white p-1 rounded-full text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <span class="sr-only">Voir le panier</span>
                                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    <span
                                        class="absolute -top-1 -right-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs">{{ count(session()->get('cart', []) )}}</span>
                                </button>
                            </div>
                        </a>
                    </div>
                    <div class="ml-3 relative">
                        <a href="{{ route('user.profil') }}">
                            <div>
                                <button type="button"
                                        class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <span class="sr-only">Ouvrir le menu utilisateur</span>
                                    <span
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                  Mon compte
                                </span>
                                </button>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

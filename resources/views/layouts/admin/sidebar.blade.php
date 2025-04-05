<aside class="w-64 bg-indigo-800 text-white p-4 hidden md:block">
    <div class="mb-8">
        <h1 class="text-2xl font-bold">ZLibrary</h1>
        <p class="text-indigo-200 text-sm">Espace Gestionnaire</p>
    </div>

    <nav>
        @php
            $style = 'flex items-center p-2 rounded-lg';
        @endphp
        <ul class="space-y-2">
            <li>
                <a
                    @class([$style, request()->route()->getName() == 'books.index' ? 'bg-indigo-900' : ''])

                    href="{{ route('books.index') }}" >
                    <i class="fas fa-chart-line w-5 h-5 mr-3"></i>
                    <span>Tableau de bord</span>
                </a>
            </li>
            <li>
                <a
                    @class([$style, request()->route()->getName() == 'books.all' ? 'bg-indigo-900' : ''])
                    href="{{ route('books.all') }}">
                    <i class="fas fa-book w-5 h-5 mr-3"></i>
                    <span>Gestion des livres</span>
                </a>
            </li>
            <li>
                <a
                    @class([$style, request()->route()->getName() == 'commande.index' ? 'bg-indigo-900' : ''])
                    href="{{route('commande.index')}}">
                    <i class="fas fa-shopping-cart w-5 h-5 mr-3"></i>
                    <span>Commandes</span>
                </a>
            </li>
            <li>
                <a
                    @class([$style, request()->route()->getName() == 'admin.paiements' ? 'bg-indigo-900' : ''])
                    href="{{route('admin.paiements')}}" >
                    <i class="fas fa-credit-card w-5 h-5 mr-3"></i>
                    <span>Paiements</span>
                </a>
            </li>
            <li>
                <a
                    @class([$style, request()->route()->getName() == 'admin.users' ? 'bg-indigo-900' : ''])
                    href="{{route('admin.users')}}" >
                    <i class="fas fa-users w-5 h-5 mr-3"></i>
                    <span>Clients</span>
                </a>
            </li>


        </ul>
    </nav>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
    <div class="mt-auto pt-8">

        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
            <i class="fas fa-sign-out-alt w-5 h-5 mr-3"></i>
            Déconnexion
        </button>
    </div>
    </form>
</aside>

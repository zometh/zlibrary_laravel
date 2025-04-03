<header class="bg-white shadow-sm">
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
</header>

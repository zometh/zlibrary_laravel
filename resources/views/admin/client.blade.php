@include('base')
<div class="min-h-screen flex">
    @include('layouts.admin.sidebar')
    <main class="flex-1 overflow-y-auto p-4">
        <div class="bg-white rounded-lg shadow overflow-hidden mb-6">
            <div class="flex justify-between items-center p-4 border-b">
                <h4 class="text-lg font-semibold text-gray-800">Toutes les utilisateurs</h4>

            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nom complet
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Adresse email
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Date
                        </th>



                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{strtoupper($user->name)}}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $user->email }}</div>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($user->created_at)->translatedFormat('j F Y à H:i') }}</div>
                            </td>


                        </tr>
                    @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </main>
</div>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-900">
    <div class="min-h-screen">
        <x-admin-sidebar />
        <x-admin-navbar />

        <main class="ml-64 pt-16 p-8">
            <div class="bg-slate-900 p-8">
                <div class="max-w-7xl mx-auto">
                    <div class="bg-slate-800 rounded-xl p-6 shadow-lg">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-2xl font-bold text-slate-100">Residents</h2>
                            <a href="{{ route('admin.residents.create') }}" 
                               class="bg-gradient-to-br from-blue-600 to-cyan-600 text-white px-4 py-2 rounded-lg hover:from-blue-700 hover:to-cyan-700 transition-all">
                                Add New Resident
                            </a>
                        </div>

                        <div class="overflow-x-auto">
                            <table class="w-full">
                                <thead class="bg-slate-700">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-slate-300">Name</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-slate-300">Contact</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-slate-300">Address</th>
                                        <th class="px-6 py-3 text-left text-sm font-medium text-slate-300">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-700">
                                    @foreach($residents as $resident)
                                    <tr class="hover:bg-slate-700/50">
                                        <td class="px-6 py-4">
                                            <div class="flex items-center space-x-4">
                                                <div class="relative group">
                                                    @if($resident->profile_picture)
                                                        <img src="{{ asset($resident->profile_picture) }}" 
                                                            class="w-10 h-10 rounded-2xl shadow-lg"
                                                            alt="Profile picture">
                                                    @else
                                                        <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center">
                                                            {{ strtoupper(substr($resident->firstname, 0, 1)) }}{{ strtoupper(substr($resident->lastname, 0, 1)) }}
                                                        </div>
                                                    @endif
                                                </div>
                                                <div>
                                                    <div class="font-medium text-slate-100">{{ $resident->firstname }} {{$resident->lastname}}</div>
                                                    <div class="text-sm text-slate-400">{{ $resident->email }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-slate-400">
                                            {{ $resident->contact_number }}
                                        </td>
                                        <td class="px-6 py-4 text-slate-400">
                                            {{ Str::limit($resident->address, 40) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex space-x-2">
                                                <a href="{{ route('admin.residents.show', $resident) }}" 
                                                   class="text-blue-400 hover:text-blue-300 p-2 hover:bg-blue-500/10 rounded-lg">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                    </svg>
                                                </a>
                                                <a href="{{ route('admin.residents.edit', $resident) }}" 
                                                   class="text-amber-400 hover:text-amber-300 p-2 hover:bg-amber-500/10 rounded-lg">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                                                    </svg>
                                                </a>
                                                <form method="POST" action="{{ route('admin.residents.destroy', $resident) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" 
                                                            class="text-red-400 hover:text-red-300 p-2 hover:bg-red-500/10 rounded-lg">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        
                        <div class="mt-6">
                            {{ $residents->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="//unpkg.com/@popperjs/core@2"></script>
    <script src="//unpkg.com/tippy.js@6"></script>
    <script>
        tippy('[data-tippy-content]', {
            arrow: false,
            theme: 'translucent',
        });
    </script>
</body>
</html>
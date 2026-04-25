<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8">
                <h2 class="text-4xl font-bold text-white tracking-tight">Dashboard</h2>
            </div>
            
            <div class="bg-white/5 backdrop-blur-xl border border-white/10 overflow-hidden shadow-2xl sm:rounded-[2.5rem]">
                <div class="p-12">
                    <div class="flex items-center gap-4 text-2xl font-bold text-gray-300">
                        <span class="text-white">Role:</span>
                        <span class="px-6 py-2 bg-indigo-500/10 border border-indigo-500/20 text-indigo-400 rounded-2xl capitalize">
                            {{ Auth::user()->role }}
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

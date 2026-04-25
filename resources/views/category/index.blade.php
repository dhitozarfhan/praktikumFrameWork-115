<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/5 backdrop-blur-xl border border-white/10 overflow-hidden shadow-2xl sm:rounded-3xl">
                <div class="p-8">
                    <div class="flex items-center justify-between mb-10">
                        <div>
                            <h2 class="text-3xl font-extrabold text-white tracking-tight">Category List</h2>
                            <p class="text-gray-400 mt-2">Manage your product categories</p>
                        </div>
                        @can('manage-category')
                        <a href="{{ route('category.create') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-bold rounded-2xl transition-all duration-300 shadow-lg shadow-indigo-500/25 hover:-translate-y-0.5">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            Add Category
                        </a>
                        @endcan
                    </div>

                    @if (session('success'))
                        <div class="mb-8 p-4 bg-emerald-500/10 border border-emerald-500/20 text-emerald-400 rounded-2xl flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-hidden rounded-2xl border border-white/5 bg-white/[0.02]">
                        <table class="min-w-full divide-y divide-white/5">
                            <thead>
                                <tr class="bg-white/[0.03]">
                                    <th class="px-8 py-5 text-left text-xs font-bold text-gray-400 uppercase tracking-[0.2em]">#</th>
                                    <th class="px-8 py-5 text-left text-xs font-bold text-gray-400 uppercase tracking-[0.2em]">Name</th>
                                    <th class="px-8 py-5 text-left text-xs font-bold text-gray-400 uppercase tracking-[0.2em]">Total Product</th>
                                    <th class="px-8 py-5 text-center text-xs font-bold text-gray-400 uppercase tracking-[0.2em]">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/5">
                                @forelse ($categories as $category)
                                <tr class="hover:bg-white/[0.04] transition-colors duration-200">
                                    <td class="px-8 py-6 text-sm font-medium text-gray-300">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-8 py-6">
                                        <div class="text-sm font-semibold text-white">{{ $category->name }}</div>
                                    </td>
                                    <td class="px-8 py-6">
                                        <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-indigo-500/10 text-indigo-400 border border-indigo-500/20">
                                            {{ $category->products_count }} Products
                                        </div>
                                    </td>
                                    <td class="px-8 py-6 text-sm">
                                        <div class="flex items-center justify-center gap-4">
                                            @can('manage-category')
                                            <a href="{{ route('category.edit', $category->id) }}" class="p-2 rounded-xl bg-white/5 text-gray-400 hover:text-white hover:bg-white/10 transition-all duration-300 border border-white/10" title="Edit">
                                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                </svg>
                                            </a>
                                            <form action="{{ route('category.destroy', $category->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="p-2 rounded-xl bg-red-500/10 text-red-400 hover:text-white hover:bg-red-500 transition-all duration-300 border border-red-500/20" title="Delete">
                                                    <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="px-8 py-20 text-center">
                                        <div class="flex flex-col items-center justify-center opacity-20">
                                            <svg class="h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                            </svg>
                                            <p class="text-xl font-medium text-gray-400">No categories found.</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

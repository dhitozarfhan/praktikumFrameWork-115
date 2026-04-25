<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/5 backdrop-blur-xl border border-white/10 overflow-hidden shadow-2xl sm:rounded-3xl">
                <div class="p-8">
                    <div class="flex items-center mb-10">
                        <a href="{{ route('category.index') }}" class="mr-6 p-3 rounded-2xl bg-white/5 text-gray-400 hover:text-white hover:bg-white/10 transition-all duration-300 border border-white/10">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                        <div>
                            <h2 class="text-3xl font-extrabold text-white tracking-tight">Edit Category</h2>
                            <p class="text-gray-400 mt-1">Modify existing category details</p>
                        </div>
                    </div>

                    <form action="{{ route('category.update', $category->id) }}" method="POST" class="space-y-8">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="name" class="block text-sm font-bold text-gray-400 uppercase tracking-widest mb-3">Category Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $category->name) }}" 
                                class="w-full bg-white/5 border border-white/10 rounded-2xl px-6 py-4 text-white placeholder-gray-500 focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all duration-300"
                                placeholder="e.g. Electronics, Furniture..." required>
                            @error('name')
                                <p class="mt-2 text-sm text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end gap-4 pt-4">
                            <a href="{{ route('category.index') }}" class="px-8 py-4 bg-white/5 hover:bg-white/10 text-white text-sm font-bold rounded-2xl transition-all duration-300 border border-white/10">
                                Cancel
                            </a>
                            <button type="submit" class="px-8 py-4 bg-indigo-600 hover:bg-indigo-500 text-white text-sm font-bold rounded-2xl transition-all duration-300 shadow-lg shadow-indigo-500/25 hover:-translate-y-0.5">
                                Update Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

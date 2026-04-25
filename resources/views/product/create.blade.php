<x-app-layout>
    <div class="py-12 min-h-[calc(100vh-80px)] flex items-center justify-center px-4">
        <div class="max-w-2xl w-full">
            <div class="bg-[#1e293b]/50 backdrop-blur-2xl border border-white/10 rounded-[2.5rem] p-10 md:p-14 shadow-2xl relative overflow-hidden">
                {{-- Background glow effect --}}
                <div class="absolute -top-24 -right-24 w-64 h-64 bg-indigo-500/10 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-indigo-500/10 rounded-full blur-3xl"></div>

                <div class="relative">
                    {{-- Header --}}
                    <div class="flex items-start gap-6 mb-12">
                        <a href="{{ route('product.index') }}" 
                           class="group p-3.5 rounded-2xl bg-white/5 border border-white/10 hover:bg-white/10 hover:border-white/20 transition-all duration-300">
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-400 group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                            </svg>
                        </a>
                        <div>
                            <h1 class="text-4xl font-bold text-white tracking-tight mb-2">Add Product</h1>
                            <p class="text-gray-400 font-medium text-lg">Fill in the details to add a new product</p>
                        </div>
                    </div>

                    {{-- Form --}}
                    <form action="{{ route('product.store') }}" method="POST" class="space-y-10">
                        @csrf

                        {{-- Name --}}
                        <div class="space-y-3">
                            <label for="name" class="block text-sm font-semibold text-gray-300 ml-1 uppercase tracking-widest">
                                Nama Produk
                            </label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                   placeholder="e.g. Wireless Headphones"
                                   class="w-full px-8 py-5 rounded-[1.5rem] bg-slate-900/40 border {{ $errors->has('name') ? 'border-red-500/50' : 'border-white/5' }} focus:border-indigo-500/50 focus:ring-0 text-white placeholder-gray-600 transition-all duration-300 text-lg">
                            @error('name')
                                <p class="mt-2 text-sm text-red-500 font-medium ml-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Category --}}
                        <div class="space-y-3">
                            <label for="category_id" class="block text-sm font-semibold text-gray-300 ml-1 uppercase tracking-widest">
                                Kategori
                            </label>
                            <div class="relative">
                                <select id="category_id" name="category_id"
                                        class="w-full px-8 py-5 rounded-[1.5rem] bg-slate-900/40 border {{ $errors->has('category_id') ? 'border-red-500/50' : 'border-white/5' }} focus:border-indigo-500/50 focus:ring-0 text-white transition-all duration-300 appearance-none text-lg">
                                    <option value="" disabled selected>-- Pilih Kategori --</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute right-8 top-1/2 -translate-y-1/2 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </div>
                            </div>
                            @error('category_id')
                                <p class="mt-2 text-sm text-red-500 font-medium ml-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Quantity & Price --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                            <div class="space-y-3">
                                <label for="quantity" class="block text-sm font-semibold text-gray-300 ml-1 uppercase tracking-widest">
                                    Quantity
                                </label>
                                <input type="number" id="quantity" name="quantity" value="{{ old('quantity', 0) }}"
                                       placeholder="0" min="0"
                                       class="w-full px-8 py-5 rounded-[1.5rem] bg-slate-900/40 border {{ $errors->has('quantity') ? 'border-red-500/50' : 'border-white/5' }} focus:border-indigo-500/50 focus:ring-0 text-white placeholder-gray-600 transition-all duration-300 text-lg">
                                @error('quantity')
                                    <p class="mt-2 text-sm text-red-500 font-medium ml-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="space-y-3">
                                <label for="price" class="block text-sm font-semibold text-gray-300 ml-1 uppercase tracking-widest">
                                    Price (Rp)
                                </label>
                                <input type="number" id="price" name="price" value="{{ old('price', 0) }}"
                                       placeholder="0" min="0"
                                       class="w-full px-8 py-5 rounded-[1.5rem] bg-slate-900/40 border {{ $errors->has('price') ? 'border-red-500/50' : 'border-white/5' }} focus:border-indigo-500/50 focus:ring-0 text-white placeholder-gray-600 transition-all duration-300 text-lg">
                                @error('price')
                                    <p class="mt-2 text-sm text-red-500 font-medium ml-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        {{-- Description (Hidden or kept as per original if needed, but not in image) --}}
                        <input type="hidden" name="description" value="No description provided">

                        {{-- Actions --}}
                        <div class="flex flex-col md:flex-row items-center justify-end gap-6 pt-10 border-t border-white/5">
                            <a href="{{ route('product.index') }}"
                               class="w-full md:w-auto text-center px-10 py-4.5 rounded-2xl bg-white/5 border border-white/10 text-gray-300 font-bold hover:bg-white/10 transition-all duration-300">
                                Cancel
                            </a>
                            <button type="submit"
                                    class="w-full md:w-auto px-12 py-4.5 bg-indigo-600 hover:bg-indigo-500 text-white font-bold rounded-2xl shadow-xl shadow-indigo-600/20 transition-all duration-300 hover:-translate-y-1 active:scale-95">
                                Save Product
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

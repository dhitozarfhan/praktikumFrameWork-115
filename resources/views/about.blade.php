<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('About Me') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div>
                                <h3 class="text-lg font-medium text-gray-700">BIODATA DIRI</h3>
                                <hr class="my-2">
                            </div>
                            <div class="flex flex-col space-y-2">
                                <p><strong>Nama:</strong> Erindhito Nur Fauzan Z</p>
                                <p><strong>NIM:</strong> 20230140115</p>
                                <p><strong>Program Studi:</strong> Teknologi Informasi</p>
                                <p><strong>Hobi:</strong> Coding, Gaming, and Learning New Tech</p>
                            </div>
                        </div>
                        <div class="flex items-center justify-center">
                            <div class="w-48 h-48 bg-gray-200 rounded-full flex items-center justify-center border-4 border-indigo-500 overflow-hidden shadow-inner">
                                <span class="text-gray-400 text-5xl">EF</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

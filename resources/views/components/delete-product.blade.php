<form action="{{ $action }}" method="POST" onsubmit="return confirm('Delete this product?')" class="inline">
    @csrf
    @method('DELETE')
    <button type="submit"
            class="{{ $label ? 'inline-flex items-center gap-1.5 px-4 py-2 text-sm font-medium rounded-lg border border-red-500 text-red-500 hover:bg-red-500/10 transition shadow-sm' : 'p-1.5 rounded-md text-gray-400 hover:text-red-600 hover:bg-red-50 dark:hover:bg-red-900/30 transition shadow-sm' }}"
            title="{{ $label ?? 'Delete' }}">
        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
        @if($label)
            <span>{{ $label }}</span>
        @endif
    </button>
</form>

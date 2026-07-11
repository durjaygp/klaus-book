<div x-data="{ open: @entangle('show') }" 
     x-show="open" 
     @open-consultation-modal.window="open = true"
     class="fixed inset-0 z-[100] flex items-center justify-center"
     style="display: none;">
    <!-- Backdrop -->
    <div x-show="open" 
         x-transition:enter="transition-opacity ease-linear duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-linear duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" 
         wire:click="closeModal"></div>
    
    <!-- Modal Content -->
    <div x-show="open"
         x-transition:enter="transition ease-out duration-300 transform"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-200 transform"
         x-transition:leave-start="opacity-100 scale-100"
         x-transition:leave-end="opacity-0 scale-95"
         class="bg-white rounded-2xl w-full max-w-lg mx-4 relative z-10 shadow-2xl border border-slate-200 overflow-hidden">
        
        <!-- Header -->
        <div class="bg-green-50 px-6 py-4 border-b border-green-100 flex items-center justify-between">
            <h3 class="font-bold text-slate-900 text-lg flex items-center gap-2">
                <i class="fas fa-book text-[#006341]"></i> Obtaining the Handbook
            </h3>
            <button wire:click="closeModal" class="text-slate-400 hover:text-red-500 transition-colors focus:outline-none">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="p-6">
            <p class="text-slate-600 mb-4 leading-relaxed" style="font-family: 'Inter', sans-serif;">
          We send you the Ultimate PVCMX Handbook after our first free phone consultation. Please fill out the schedule form to proceed. Many thanks!
            </p>
           
        </div>
    </div>
</div>

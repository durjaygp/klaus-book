<div class="max-w-3xl mx-auto mb-20 bg-white rounded-3xl p-8 shadow-2xl border border-slate-200 relative z-10" id="leave-review">
    <div class="text-center mb-8">
        <h2 class="text-3xl font-bold text-slate-900">Share Your Experience</h2>
        <p class="text-slate-600 mt-2" style="font-family: 'Inter', sans-serif;">Have you read the guide? We'd love to hear your thoughts.</p>
    </div>

    @if($submitted)
        <div class="bg-green-50 border border-green-200 text-green-800 rounded-2xl p-6 text-center">
            <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4 text-green-600 text-2xl">
                <i class="fas fa-check"></i>
            </div>
            <h3 class="text-xl font-bold mb-2">Thank you for your review!</h3>
            <p class="text-sm">Your review has been submitted and is pending approval.</p>
            <button wire:click="$set('submitted', false)" class="mt-4 text-green-700 font-semibold underline text-sm">Submit another review</button>
        </div>
    @else
        <form wire:submit.prevent="submit" class="space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-900 mb-2">Your Name <span class="text-red-500">*</span></label>
                    <input type="text" wire:model="name" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#006341] focus:border-transparent transition-all" placeholder="John D.">
                    @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-900 mb-2">Email Address <span class="text-red-500">*</span></label>
                    <input type="email" wire:model="email" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#006341] focus:border-transparent transition-all" placeholder="john@example.com">
                    @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-900 mb-2">Phone Number (Optional)</label>
                    <input type="tel" wire:model="phone" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#006341] focus:border-transparent transition-all" placeholder="+1 234 567 8900">
                    @error('phone') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-900 mb-2">Country / Location (Optional)</label>
                    <input type="text" wire:model="country" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#006341] focus:border-transparent transition-all" placeholder="USA">
                    @error('country') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-900 mb-2">Rating</label>
                <div class="flex items-center gap-2 text-2xl">
                    @for($i = 1; $i <= 5; $i++)
                        <button type="button" wire:click="$set('rating', {{ $i }})" class="focus:outline-none transition-colors {{ $rating >= $i ? 'text-yellow-400' : 'text-slate-300' }}">
                            <i class="fas fa-star"></i>
                        </button>
                    @endfor
                </div>
                @error('rating') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-sm font-semibold text-slate-900 mb-2">Your Review</label>
                <textarea wire:model="content" rows="4" class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-[#006341] focus:border-transparent transition-all resize-none" placeholder="How did the guide help you?"></textarea>
                @error('content') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-[#006341] to-[#004d2e] text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-0.5">
                Submit Review
                <div wire:loading wire:target="submit" class="ml-2 inline-block animate-spin rounded-full h-4 w-4 border-2 border-white border-t-transparent"></div>
            </button>
        </form>
    @endif
</div>

<div class="space-y-6">
    <flux:heading size="xl">Reviews Dashboard</flux:heading>
    
    <div class="bg-white dark:bg-slate-800 rounded-xl border border-slate-200 dark:border-slate-700 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-slate-500 bg-slate-50 dark:bg-slate-700/50 uppercase border-b border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-6 py-4 font-medium">Name & Location</th>
                        <th class="px-6 py-4 font-medium">Rating</th>
                        <th class="px-6 py-4 font-medium w-1/3">Review</th>
                        <th class="px-6 py-4 font-medium">Status</th>
                        <th class="px-6 py-4 font-medium text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    @forelse($reviews as $review)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-medium text-slate-900 dark:text-white">{{ $review->name }}</div>
                                @if($review->email)
                                    <div class="text-slate-500 text-xs mt-1"><i class="fas fa-envelope mr-1"></i> {{ $review->email }}</div>
                                @endif
                                @if($review->phone)
                                    <div class="text-slate-500 text-xs mt-1"><i class="fas fa-phone mr-1"></i> {{ $review->phone }}</div>
                                @endif
                                <div class="text-slate-500 text-xs mt-1"><i class="fas fa-map-marker-alt mr-1"></i> {{ $review->country ?? 'No location' }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex text-[#CE1126]">
                                {{$review->rating}}
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="fas fa-star {{ $i <= $review->rating ? '' : 'text-slate-300 dark:text-slate-600' }}"></i>
                                    @endfor
                                </div>
                            </td>
                            <td class="px-6 py-4 text-slate-700 dark:text-slate-300">
                                {{ Str::limit($review->content, 100) }}
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-2.5 py-1 text-xs font-semibold rounded-full {{ $review->status === 'approved' ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/30 dark:text-yellow-400' }}">
                                    {{ ucfirst($review->status) }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-2">
                                    <flux:button size="sm" variant="outline" wire:click="toggleStatus({{ $review->id }})">
                                        {{ $review->status === 'approved' ? 'Mark Pending' : 'Approve' }}
                                    </flux:button>
                                    <flux:button size="sm" variant="danger" icon="trash" wire:click="deleteReview({{ $review->id }})" wire:confirm="Are you sure you want to delete this review?" />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-slate-500">
                                No reviews found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

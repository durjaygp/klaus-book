<x-layouts::app :title="__('Dashboard')">
    @php
        $stats = cache()->remember('dashboard_stats', 60, function () {
            return [
                'totalContacts' => \App\Models\Contact::count(),
                'unreadContacts' => \App\Models\Contact::where('is_read', false)->count(),
                'totalReviews' => \App\Models\Review::count(),
                'pendingReviews' => \App\Models\Review::where('status', 'pending')->count(),
                'approvedReviews' => \App\Models\Review::where('status', 'approved')->count(),
                'totalViews' => \App\Models\View::sum('views')
            ];
        });
        
        extract($stats);
    @endphp

    <div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">
        <flux:heading size="xl" class="mb-2">Overview</flux:heading>

        <div class="grid auto-rows-min gap-6 md:grid-cols-5">
            
            <!-- Views Stat -->
            <a href="{{ route('analytics') }}" class="group relative overflow-hidden rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-6 shadow-sm hover:shadow-md hover:scale-[1.02] transition-all cursor-pointer block">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-cyan-50 dark:bg-cyan-900/30 flex items-center justify-center text-cyan-600 dark:text-cyan-400 group-hover:bg-cyan-100 dark:group-hover:bg-cyan-900/50 transition-colors">
                        <flux:icon.chart-bar class="size-6" />
                    </div>
                    <div>
                        <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Views</p>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white">{{ $totalViews }}</h3>
                    </div>
                </div>
            </a>
            
            <!-- Contacts Stat -->
            <a href="{{ route('contacts') }}" class="group relative overflow-hidden rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-6 shadow-sm hover:shadow-md hover:scale-[1.02] transition-all cursor-pointer block">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-blue-50 dark:bg-blue-900/30 flex items-center justify-center text-blue-600 dark:text-blue-400 group-hover:bg-blue-100 dark:group-hover:bg-blue-900/50 transition-colors">
                        <flux:icon.inbox class="size-6" />
                    </div>
                    <div>
                        <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Contacts</p>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white">{{ $totalContacts }}</h3>
                    </div>
                </div>
                @if($unreadContacts > 0)
                    <div class="mt-4 text-xs font-medium text-red-600 dark:text-red-400 bg-red-50 dark:bg-red-900/20 inline-block px-2 py-1 rounded-md">
                        {{ $unreadContacts }} unread
                    </div>
                @endif
            </a>

            <!-- Total Reviews Stat -->
            <a href="{{ route('reviews') }}" class="group relative overflow-hidden rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-6 shadow-sm hover:shadow-md hover:scale-[1.02] transition-all cursor-pointer block">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-indigo-50 dark:bg-indigo-900/30 flex items-center justify-center text-indigo-600 dark:text-indigo-400 group-hover:bg-indigo-100 dark:group-hover:bg-indigo-900/50 transition-colors">
                        <flux:icon.star class="size-6" />
                    </div>
                    <div>
                        <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Reviews</p>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white">{{ $totalReviews }}</h3>
                    </div>
                </div>
            </a>

            <!-- Pending Reviews Stat -->
            <a href="{{ route('reviews') }}" class="group relative overflow-hidden rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-6 shadow-sm hover:shadow-md hover:scale-[1.02] transition-all cursor-pointer block">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-yellow-50 dark:bg-yellow-900/30 flex items-center justify-center text-yellow-600 dark:text-yellow-400 group-hover:bg-yellow-100 dark:group-hover:bg-yellow-900/50 transition-colors">
                        <flux:icon.clock class="size-6" />
                    </div>
                    <div>
                        <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Pending Reviews</p>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white">{{ $pendingReviews }}</h3>
                    </div>
                </div>
            </a>

            <!-- Approved Reviews Stat -->
            <a href="{{ route('reviews') }}" class="group relative overflow-hidden rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-6 shadow-sm hover:shadow-md hover:scale-[1.02] transition-all cursor-pointer block">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 rounded-full bg-green-50 dark:bg-green-900/30 flex items-center justify-center text-green-600 dark:text-green-400 group-hover:bg-green-100 dark:group-hover:bg-green-900/50 transition-colors">
                        <flux:icon.check-circle class="size-6" />
                    </div>
                    <div>
                        <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Approved Reviews</p>
                        <h3 class="text-2xl font-bold text-slate-900 dark:text-white">{{ $approvedReviews }}</h3>
                    </div>
                </div>
            </a>

        </div>

        <div class="mt-4 grid gap-6 md:grid-cols-2 h-full">
            <!-- Quick Actions -->
            <div class="rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-6 shadow-sm">
                <flux:heading size="lg" class="mb-4">Quick Actions</flux:heading>
                <div class="flex flex-col gap-3">
                    <flux:button variant="outline" href="{{ route('contacts') }}" icon="inbox" class="justify-start">Manage Contacts</flux:button>
                    <flux:button variant="outline" href="{{ route('reviews') }}" icon="star" class="justify-start">Manage Reviews</flux:button>
                    <flux:button variant="outline" href="{{ route('homepage-settings') }}" icon="document-text" class="justify-start">Edit Homepage Content</flux:button>
                    <flux:button variant="outline" href="{{ url('/') }}" target="_blank" icon="arrow-top-right-on-square" class="justify-start">View Live Website</flux:button>
                </div>
            </div>

            <!-- Recent Activity Placeholder -->
            <div class="rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-6 shadow-sm flex items-center justify-center text-center">
                <div>
                    <div class="w-16 h-16 rounded-full bg-slate-50 dark:bg-slate-800 mx-auto flex items-center justify-center text-slate-300 dark:text-slate-600 text-3xl mb-4">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="text-lg font-medium text-slate-900 dark:text-white">Your Dashboard</h3>
                    <p class="text-sm text-slate-500 dark:text-slate-400 mt-2">Everything is running smoothly.</p>
                </div>
            </div>
        </div>
    </div>
</x-layouts::app>

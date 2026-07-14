<div class="flex h-full w-full flex-1 flex-col gap-6 rounded-xl">
    <div class="flex items-center justify-between mb-2">
        <flux:heading size="xl">Analytics Dashboard</flux:heading>
        <flux:button variant="outline" wire:click="$refresh" icon="arrow-path">Refresh</flux:button>
    </div>

    <!-- Top Summary Cards -->
    <div class="grid auto-rows-min gap-6 md:grid-cols-3">
        <!-- Unique Visitors Stat -->
        <div class="relative overflow-hidden rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-6 shadow-sm">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-blue-50 dark:bg-blue-900/30 flex items-center justify-center text-blue-600 dark:text-blue-400 text-xl">
                    <i class="fas fa-users"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Unique IPs</p>
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white">{{ $uniqueVisitors }}</h3>
                </div>
            </div>
        </div>

        <!-- Total Page Views Stat -->
        <div class="relative overflow-hidden rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-6 shadow-sm">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-indigo-50 dark:bg-indigo-900/30 flex items-center justify-center text-indigo-600 dark:text-indigo-400 text-xl">
                    <i class="fas fa-eye"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Total Page Views</p>
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white">{{ $totalViews }}</h3>
                </div>
            </div>
        </div>

        <!-- Top Country Stat -->
        <div class="relative overflow-hidden rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 p-6 shadow-sm">
            <div class="flex items-center gap-4">
                <div class="w-12 h-12 rounded-full bg-green-50 dark:bg-green-900/30 flex items-center justify-center text-green-600 dark:text-green-400 text-xl">
                    <i class="fas fa-globe-americas"></i>
                </div>
                <div>
                    <p class="text-sm font-medium text-slate-500 dark:text-slate-400">Top Country</p>
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white">{{ $topCountry }}</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Table -->
    <div class="rounded-2xl border border-slate-200 dark:border-slate-700 bg-white dark:bg-slate-800 shadow-sm overflow-hidden flex-1">
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left">
                <thead class="text-xs text-slate-500 dark:text-slate-400 uppercase bg-slate-50 dark:bg-slate-900/50 border-b border-slate-200 dark:border-slate-700">
                    <tr>
                        <th class="px-6 py-4 font-medium">IP Address</th>
                        <th class="px-6 py-4 font-medium">Location</th>
                        <th class="px-6 py-4 font-medium">Page Type</th>
                        <th class="px-6 py-4 font-medium text-center">Views</th>
                        <th class="px-6 py-4 font-medium text-right">Last Visit</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-700">
                    @forelse($views as $view)
                        <tr class="hover:bg-slate-50 dark:hover:bg-slate-700/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="font-medium text-slate-900 dark:text-white">{{ $view->ip_address ?? 'Unknown' }}</div>
                                @if($view->user_agent)
                                    <div class="text-slate-400 text-[10px] mt-1 max-w-[200px] truncate" title="{{ $view->user_agent }}">{{ $view->user_agent }}</div>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if($view->country || $view->city)
                                    <div class="flex items-center gap-2">
                                        <i class="fas fa-map-marker-alt text-slate-400"></i>
                                        <span class="text-slate-700 dark:text-slate-300">{{ $view->city ? $view->city . ', ' : '' }}{{ $view->country }}</span>
                                    </div>
                                @else
                                    <span class="text-slate-400 italic">Undetected</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-slate-100 dark:bg-slate-700 text-slate-600 dark:text-slate-300 px-2.5 py-1 rounded-full text-xs font-medium">
                                    {{ ucfirst($view->type ?? 'Direct') }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span class="inline-flex items-center justify-center w-8 h-8 rounded-full bg-indigo-50 dark:bg-indigo-900/30 text-indigo-600 dark:text-indigo-400 font-bold">
                                    {{ $view->views }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-right text-slate-500 dark:text-slate-400 whitespace-nowrap">
                                {{ $view->updated_at->diffForHumans() }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-slate-500 dark:text-slate-400">
                                <i class="fas fa-chart-bar text-4xl mb-3 text-slate-300 dark:text-slate-600 block"></i>
                                No analytics data found yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($views->hasPages())
            <div class="p-4 border-t border-slate-200 dark:border-slate-700">
                {{ $views->links(data: ['scrollTo' => false]) }}
            </div>
        @endif
    </div>
</div>

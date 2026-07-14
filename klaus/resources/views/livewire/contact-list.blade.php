<div>
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 overflow-x-auto">
            <h3 class="text-lg font-semibold mb-4 text-[#006341]">Contact Submissions</h3>
            
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Submitted</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($contacts as $contact)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $contact->name }}
                                @if(!$contact->is_read)
                                    <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">
                                        New
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $contact->email }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $contact->phone ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $contact->created_at->format('M d, Y g:i A') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                <button wire:click="viewContact({{ $contact->id }})" class="text-[#006341] hover:text-green-900 font-semibold">View</button>
                                <button wire:click="delete({{ $contact->id }})" wire:confirm="Are you sure you want to delete this contact?" class="text-red-600 hover:text-red-900 font-semibold">Delete</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">No contact submissions yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- View Modal -->
    @if($viewingContact)
        <div class="fixed inset-0 z-50 flex items-center justify-center">
            <!-- Backdrop -->
            <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" wire:click="closeView"></div>
            
            <!-- Modal Content -->
            <div class="bg-white rounded-2xl w-full max-w-2xl mx-4 relative z-10 shadow-2xl border border-slate-200 overflow-hidden">
                <div class="bg-[#006341] px-6 py-4 border-b flex items-center justify-between">
                    <h3 class="font-bold text-white text-lg flex items-center gap-2">
                        Contact Details
                    </h3>
                    <button wire:click="closeView" class="text-white/80 hover:text-white transition-colors focus:outline-none">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
                
                <div class="p-6 space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">Name</span>
                            <span class="block text-slate-900 font-medium">{{ $viewingContact->name }}</span>
                        </div>
                        <div>
                            <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">Email</span>
                            <span class="block text-slate-900 font-medium">{{ $viewingContact->email }}</span>
                        </div>
                        <div>
                            <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">Phone</span>
                            <span class="block text-slate-900 font-medium">{{ $viewingContact->phone ?? '-' }}</span>
                        </div>
                        <div>
                            <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">Timezone</span>
                            <span class="block text-slate-900 font-medium">{{ $viewingContact->timezone }}</span>
                        </div>
                    </div>
                    
                    <hr class="border-slate-100">
                    
                    <div>
                        <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Preferred Schedule</span>
                        @php
                            $schedule = is_string($viewingContact->preferred_schedule) ? json_decode($viewingContact->preferred_schedule, true) : $viewingContact->preferred_schedule;
                        @endphp
                        @if($schedule)
                            <ul class="list-disc list-inside text-sm text-slate-800 space-y-1">
                                @if($schedule['any_day'] ?? false) <li>Any Day of the Week</li> @endif
                                @if($schedule['mon_fri'] ?? false) <li>Monday through Friday</li> @endif
                                @if($schedule['weekend'] ?? false) <li>Weekend only</li> @endif
                                @if(!empty($schedule['specific_day'])) <li>Specific Day: {{ $schedule['specific_day'] }}</li> @endif
                                @if(!empty($schedule['ampm'])) <li>Time of Day: {{ $schedule['ampm'] }}</li> @endif
                                @if(!empty($schedule['specific_time'])) <li>Specific Time: {{ $schedule['specific_time'] }}</li> @endif
                            </ul>
                        @else
                            <span class="text-sm text-slate-500">None provided</span>
                        @endif
                    </div>
                    
                    <hr class="border-slate-100">
                    
                    <div>
                        <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider mb-2">Additional Information</span>
                        <div class="bg-slate-50 p-4 rounded-xl text-sm text-slate-800 border border-slate-100 whitespace-pre-wrap">{{ $viewingContact->additional_info ?: 'No additional info provided.' }}</div>
                    </div>
                    
                    <!-- Flash Messages -->
                    @if (session()->has('message'))
                        <div class="p-3 bg-green-50 text-green-700 text-sm rounded-lg flex items-center gap-2">
                            <i class="fas fa-check-circle"></i> {{ session('message') }}
                        </div>
                    @endif
                    @if (session()->has('error'))
                        <div class="p-3 bg-red-50 text-red-700 text-sm rounded-lg flex items-center gap-2">
                            <i class="fas fa-exclamation-triangle"></i> {{ session('error') }}
                        </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="pt-4 flex items-center gap-3 border-t border-slate-100">
                        <button wire:click="sendConfirmationEmail" wire:loading.attr="disabled" class="flex-1 bg-[#006341] hover:bg-[#004d32] text-white py-2.5 px-4 rounded-lg font-medium transition-colors flex items-center justify-center gap-2">
                            <i class="fas fa-envelope" wire:loading.remove wire:target="sendConfirmationEmail"></i>
                            <i class="fas fa-spinner fa-spin" wire:loading wire:target="sendConfirmationEmail"></i>
                            Send Confirmation Email
                        </button>
                        
                        @if($viewingContact->phone)
                            <a href="tel:{{ $viewingContact->phone }}" class="flex-1 bg-slate-900 hover:bg-slate-800 text-white py-2.5 px-4 rounded-lg font-medium transition-colors flex items-center justify-center gap-2 text-center">
                                <i class="fas fa-phone-alt"></i> Call Customer
                            </a>
                        @else
                            <button disabled class="flex-1 bg-slate-200 text-slate-500 py-2.5 px-4 rounded-lg font-medium cursor-not-allowed flex items-center justify-center gap-2">
                                <i class="fas fa-phone-slash"></i> No Phone Provided
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

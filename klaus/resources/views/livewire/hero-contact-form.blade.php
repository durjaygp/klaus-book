<form wire:submit.prevent="submit" class="space-y-4">
    @if($successMessage)
        <div class="p-4 bg-green-50 text-[#006341] rounded-xl font-medium text-sm">
            {{ $successMessage }}
        </div>
    @endif
    <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1" style="font-family: 'Inter', sans-serif;">Full Name</label>
                                <input type="text" wire:model="name" placeholder="e.g. John Doe" required class="input-name w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-[#006341] focus:border-[#006341] outline-none transition-all text-slate-900">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1" style="font-family: 'Inter', sans-serif;">Email Address</label>
                                <input type="email" wire:model="email" placeholder="john@example.com" required class="input-email w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-[#006341] focus:border-[#006341] outline-none transition-all text-slate-900">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1" style="font-family: 'Inter', sans-serif;">Phone Number</label>
                                <input type="tel" wire:model="phone" placeholder="+1 (555) 000-0000" class="input-phone w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-[#006341] focus:border-[#006341] outline-none transition-all text-slate-900">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1" style="font-family: 'Inter', sans-serif;">What Timezone are you in?</label>
                                <input type="text" wire:model="timezone" placeholder="e.g. EST, Pacific Time, or City/State" required class="input-timezone w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-[#006341] focus:border-[#006341] outline-none transition-all text-slate-900">
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-2" style="font-family: 'Inter', sans-serif;">Preferred consultation schedule</label>
                                <div class="flex flex-col gap-y-2 text-xs text-slate-700" style="font-family: 'Inter', sans-serif;">
                                    <label class="flex items-center gap-2 cursor-pointer hover:text-[#006341] transition"><input type="checkbox" wire:model="any_day" class="time-checkbox w-3.5 h-3.5 text-[#006341] border-slate-300 rounded focus:ring-[#006341]" value="Any Day of the Week"> Any Day of the Week</label>
                                    <label class="flex items-center gap-2 cursor-pointer hover:text-[#006341] transition"><input type="checkbox" wire:model="mon_fri" class="time-checkbox w-3.5 h-3.5 text-[#006341] border-slate-300 rounded focus:ring-[#006341]" value="Monday through Friday"> Monday through Friday</label>
                                    <label class="flex items-center gap-2 cursor-pointer hover:text-[#006341] transition"><input type="checkbox" wire:model="weekend" class="time-checkbox w-3.5 h-3.5 text-[#006341] border-slate-300 rounded focus:ring-[#006341]" value="Weekend only"> Weekend only</label>
                                    <div class="flex items-center gap-2">
                                        <label class="flex items-center gap-2 cursor-pointer hover:text-[#006341] transition whitespace-nowrap"><input type="checkbox" wire:model="specific_day" class="time-checkbox w-3.5 h-3.5 text-[#006341] border-slate-300 rounded focus:ring-[#006341]" value="Specific day"> A specific day</label>
                                        <input type="text" wire:model="specific_day_val" placeholder="e.g. Tuesday" class="input-specific-day w-full bg-slate-50 border border-slate-200 rounded-md px-2 py-1 focus:ring-2 focus:ring-[#006341] focus:border-[#006341] outline-none transition-all text-slate-900">
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <label class="flex items-center gap-2 cursor-pointer hover:text-[#006341] transition"><input type="radio" wire:model="ampm" name="ampm_top" class="time-checkbox w-3.5 h-3.5 text-[#006341] border-slate-300 focus:ring-[#006341]" value="AM"> AM</label>
                                        <label class="flex items-center gap-2 cursor-pointer hover:text-[#006341] transition"><input type="radio" wire:model="ampm" name="ampm_top" class="time-checkbox w-3.5 h-3.5 text-[#006341] border-slate-300 focus:ring-[#006341]" value="PM"> PM</label>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <label class="flex items-center gap-2 cursor-pointer hover:text-[#006341] transition whitespace-nowrap"><input type="checkbox" wire:model="specific_time" class="time-checkbox w-3.5 h-3.5 text-[#006341] border-slate-300 rounded focus:ring-[#006341]" value="Specific time"> A specific time</label>
                                        <input type="text" wire:model="specific_time_val" placeholder="e.g. 3:00 PM" class="input-specific-time w-full bg-slate-50 border border-slate-200 rounded-md px-2 py-1 focus:ring-2 focus:ring-[#006341] focus:border-[#006341] outline-none transition-all text-slate-900">
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1" style="font-family: 'Inter', sans-serif;">Additional Information</label>
                                <textarea wire:model="additional_info" rows="3" placeholder="Tell us about your plans..." required class="input-message w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-3 text-sm focus:ring-2 focus:ring-[#006341] focus:border-[#006341] outline-none transition-all text-slate-900 resize-none"></textarea>
                            </div>
                     
                     
    <button type="submit" class="w-full btn-mexican text-white font-bold py-3.5 px-6 rounded-xl text-base shadow-lg transition-all flex items-center justify-center gap-2 mt-2">
        <span wire:loading.remove wire:target="submit"><i class="fas fa-calendar-check"></i> Book Consultation</span>
        <span wire:loading wire:target="submit"><i class="fas fa-circle-notch fa-spin"></i> Sending...</span>
    </button>
    <p class="text-[11px] text-slate-500 mt-3 text-center leading-tight" style="font-family: 'Inter', sans-serif;">
        By submitting this form, you confirm that you have read the PVCMX <a href="{{ url('privacy-policy') }}" class="text-[#006341] font-medium hover:underline" target="_blank">Privacy Policy</a> and agree to the website <a href="{{ url('terms-of-use') }}" class="text-[#006341] font-medium hover:underline" target="_blank">Terms of Use</a>.
    </p>
</form>

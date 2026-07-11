<?php
$html = file_get_contents('resources/views/livewire/hero-contact-form.blade.php');

$replacements = [
    '<input type="checkbox" class="time-checkbox w-3.5 h-3.5 text-[#006341] border-slate-300 rounded focus:ring-[#006341]" value="Any Day of the Week">' => '<input type="checkbox" wire:model="any_day" class="time-checkbox w-3.5 h-3.5 text-[#006341] border-slate-300 rounded focus:ring-[#006341]" value="Any Day of the Week">',
    
    '<input type="checkbox" class="time-checkbox w-3.5 h-3.5 text-[#006341] border-slate-300 rounded focus:ring-[#006341]" value="Monday through Friday">' => '<input type="checkbox" wire:model="mon_fri" class="time-checkbox w-3.5 h-3.5 text-[#006341] border-slate-300 rounded focus:ring-[#006341]" value="Monday through Friday">',
    
    '<input type="checkbox" class="time-checkbox w-3.5 h-3.5 text-[#006341] border-slate-300 rounded focus:ring-[#006341]" value="Weekend only">' => '<input type="checkbox" wire:model="weekend" class="time-checkbox w-3.5 h-3.5 text-[#006341] border-slate-300 rounded focus:ring-[#006341]" value="Weekend only">',
    
    '<input type="checkbox" class="time-checkbox w-3.5 h-3.5 text-[#006341] border-slate-300 rounded focus:ring-[#006341]" value="Specific day">' => '<input type="checkbox" wire:model="specific_day" class="time-checkbox w-3.5 h-3.5 text-[#006341] border-slate-300 rounded focus:ring-[#006341]" value="Specific day">',
    
    '<input type="text" placeholder="e.g. Tuesday" class="input-specific-day' => '<input type="text" wire:model="specific_day_val" placeholder="e.g. Tuesday" class="input-specific-day',
    
    '<input type="radio" name="ampm_top" class="time-checkbox w-3.5 h-3.5 text-[#006341] border-slate-300 focus:ring-[#006341]" value="AM">' => '<input type="radio" wire:model="ampm" name="ampm_top" class="time-checkbox w-3.5 h-3.5 text-[#006341] border-slate-300 focus:ring-[#006341]" value="AM">',
    
    '<input type="radio" name="ampm_top" class="time-checkbox w-3.5 h-3.5 text-[#006341] border-slate-300 focus:ring-[#006341]" value="PM">' => '<input type="radio" wire:model="ampm" name="ampm_top" class="time-checkbox w-3.5 h-3.5 text-[#006341] border-slate-300 focus:ring-[#006341]" value="PM">',
    
    '<input type="checkbox" class="time-checkbox w-3.5 h-3.5 text-[#006341] border-slate-300 rounded focus:ring-[#006341]" value="Specific time">' => '<input type="checkbox" wire:model="specific_time" class="time-checkbox w-3.5 h-3.5 text-[#006341] border-slate-300 rounded focus:ring-[#006341]" value="Specific time">',
    
    '<input type="text" placeholder="e.g. 3:00 PM" class="input-specific-time' => '<input type="text" wire:model="specific_time_val" placeholder="e.g. 3:00 PM" class="input-specific-time'
];

$html = str_replace(array_keys($replacements), array_values($replacements), $html);
file_put_contents('resources/views/livewire/hero-contact-form.blade.php', $html);


$html = file_get_contents('resources/views/livewire/consultation-modal.blade.php');
$html = str_replace(array_keys($replacements), array_values($replacements), $html);
file_put_contents('resources/views/livewire/consultation-modal.blade.php', $html);

echo "Fixed wire:models\n";

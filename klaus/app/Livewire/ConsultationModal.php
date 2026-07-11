<?php

namespace App\Livewire;

use Livewire\Component;

class ConsultationModal extends Component
{
    public $show = false;

    public $name = '';
    public $email = '';
    public $phone = '';
    public $timezone = '';
    public $additional_info = '';

    // Schedule fields
    public $any_day = false;
    public $mon_fri = false;
    public $weekend = false;
    public $specific_day = false;
    public $specific_day_val = '';
    public $ampm = '';
    public $specific_time = false;
    public $specific_time_val = '';

    public $successMessage = '';

    protected $listeners = ['open-consultation-modal' => 'openModal'];

    public function openModal()
    {
        $this->show = true;
        $this->successMessage = '';
    }

    public function closeModal()
    {
        $this->show = false;
    }

    public function submit()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:50',
            'timezone' => 'required|string|max:100',
            'additional_info' => 'nullable|string',
        ]);
        
        $schedule = [
            'any_day' => $this->any_day,
            'mon_fri' => $this->mon_fri,
            'weekend' => $this->weekend,
            'specific_day' => $this->specific_day ? $this->specific_day_val : null,
            'ampm' => $this->ampm,
            'specific_time' => $this->specific_time ? $this->specific_time_val : null,
        ];

        \App\Models\Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'timezone' => $this->timezone,
            'preferred_schedule' => $schedule,
            'additional_info' => $this->additional_info,
        ]);
        
        $this->successMessage = '✅ Message sent! We\'ll get back to you shortly.';
        
        $this->reset(['name', 'email', 'phone', 'timezone', 'additional_info', 'any_day', 'mon_fri', 'weekend', 'specific_day', 'specific_day_val', 'ampm', 'specific_time', 'specific_time_val']);
    }

    public function render()
    {
        return view('livewire.consultation-modal');
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Review;

class ReviewForm extends Component
{
    public $name = '';
    public $email = '';
    public $phone = '';
    public $country = '';
    public $rating = 5;
    public $content = '';
    public $submitted = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'nullable|string|max:20',
        'country' => 'nullable|string|max:255',
        'rating' => 'required|integer|min:1|max:5',
        'content' => 'required|string|max:1000',
    ];

    public function submit()
    {
        $this->validate();

        Review::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'country' => $this->country,
            'rating' => $this->rating,
            'content' => $this->content,
            'status' => 'pending',
            'is_read' => false,
        ]);

        $this->submitted = true;
        $this->reset(['name', 'email', 'phone', 'country', 'rating', 'content']);
    }

    public function setRating($value)
    {
        $this->rating = $value;
    }

    public function render()
    {
        return view('livewire.review-form');
    }
}

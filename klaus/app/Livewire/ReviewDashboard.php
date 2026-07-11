<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Review;
use Flux\Flux;

class ReviewDashboard extends Component
{
    public function mount()
    {
        // Mark all as read when opening dashboard
        Review::where('is_read', false)->update(['is_read' => true]);
    }

    public function toggleStatus($id)
    {
        $review = Review::find($id);
        if ($review) {
            $review->status = $review->status === 'approved' ? 'pending' : 'approved';
            $review->save();
            Flux::toast(variant: 'success', text: 'Review status updated to ' . $review->status . '.');
        }
    }

    public function deleteReview($id)
    {
        $review = Review::find($id);
        if ($review) {
            $review->delete();
            Flux::toast(variant: 'success', text: 'Review deleted successfully.');
        }
    }

    public function render()
    {
        return view('livewire.review-dashboard', [
            'reviews' => Review::latest()->get()
        ]);
    }
}

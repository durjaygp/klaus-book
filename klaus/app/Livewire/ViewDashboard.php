<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\View;
use Illuminate\Support\Facades\DB;

class ViewDashboard extends Component
{
    use WithPagination;

    public function render()
    {
        $views = View::orderBy('updated_at', 'desc')->paginate(15);
        $totalViews = View::sum('views');
        $uniqueVisitors = View::distinct('ip_address')->count('ip_address');
        
        $topCountry = View::whereNotNull('country')
            ->select('country', DB::raw('count(*) as total'))
            ->groupBy('country')
            ->orderByDesc('total')
            ->first();

        return view('livewire.view-dashboard', [
            'views' => $views,
            'totalViews' => $totalViews,
            'uniqueVisitors' => $uniqueVisitors,
            'topCountry' => $topCountry ? $topCountry->country : 'Unknown'
        ]);
    }
}

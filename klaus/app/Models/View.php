<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $guarded = [];

    /**
     * Record a new view with IP-based location detection.
     */
    public static function recordView($type = null, $typeId = null, $request = null)
    {
        $request = $request ?? request();
        $ip = $request->ip();
        
        // Simple IP location detection using a free public API (ip-api.com)
        // Note: For high-traffic production, consider using a local MaxMind database package.
        $country = null;
        $city = null;
        
        // Check if this IP already viewed this type today
        $existingView = self::where('ip_address', $ip)
            ->where('type', $type)
            ->where('type_id', $typeId)
            ->whereDate('created_at', today())
            ->first();

        if ($existingView) {
            $existingView->increment('views');
            return $existingView;
        }

        if ($ip && $ip !== '127.0.0.1' && $ip !== '::1') {
            try {
                $response = \Illuminate\Support\Facades\Http::timeout(2)->get("http://ip-api.com/json/{$ip}");
                if ($response->successful() && $response->json('status') === 'success') {
                    $country = $response->json('country');
                    $city = $response->json('city');
                }
            } catch (\Exception $e) {
                // Ignore API failures to prevent blocking the request
            }
        }

        return self::create([
            'ip_address' => $ip,
            'user_agent' => $request->userAgent(),
            'type' => $type,
            'type_id' => $typeId,
            'user_id' => auth()->id(),
            'country' => $country,
            'city' => $city,
            'views' => 1,
        ]);
    }
}

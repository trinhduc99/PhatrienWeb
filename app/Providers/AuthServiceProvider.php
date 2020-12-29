<?php

namespace App\Providers;

use App\Http\Middleware\AdminMiddleware;
use App\MotelRoom;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('report', function ($id, $post) {
            $userId = Auth::user()->id;
            if($post ===$userId) {
                return true;
            }
            return false;
        });
        Gate::define('viewUser', function ($id,$slug) {
            $room = MotelRoom::where('ac_title_slug', $slug)->first();
            $user = Auth::user();
            if($room->approve ===1 || $room->user_id = $user->id || $user->right ===1) {
                return true;
            }
            return false;
        });
    }
}

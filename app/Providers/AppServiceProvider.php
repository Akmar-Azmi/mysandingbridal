<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use BladeUI\Heroicons\BladeHeroiconsServiceProvider;
use Illuminate\Support\Facades\Blade;
use BladeUI\Icons\Factory;

class Owner extends Model
{
    public function patients(): HasMany
    {
        return $this->hasMany(Patient::class);
    }
}

class Patient extends Model
{
    public function owner(): BelongsTo
    {
        return $this->belongsTo(Owner::class);
    }

    public function treatments(): HasMany
    {
        return $this->hasMany(Treatment::class);
    }
}

class Treatment extends Model
{
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class);
    }
}

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();

        // Register admin routes
        Route::middleware('web')
            ->prefix('admin')
            ->group(base_path('routes/admin.php'));

        // ✅ Register blade heroicons (using the published SVGs in public)
        app(Factory::class)->add('heroicon', [
            'path' => resource_path('svg'),
            'prefix' => 'heroicon-o',
        ]);
    }
}

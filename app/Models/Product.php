<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class Product extends Model
{
    use HasFactory;

    const STATS_CACHE_KEY = 'products_stats';

    protected $fillable = [
        'code',
        'name',
        'brand',
        'price',
        'stock_status',
        'stock_quantity',
        'image_path',
        'model',
        'type',
        'made_in',
        'handsets',
        'answer_system',
        'base_dial_pad',
        'has_perisan',
        'bluetooth',
        'lines',
        'box',
        'condition',
        'grade',
        'is_second_hand',
        'description',
    ];

    public static function boot()
    {
        parent::boot();

        // Clear products stats cache on product creation
        static::created(function () {
            Cache::forget(self::STATS_CACHE_KEY);
        });

        // Clear products stats cache on product update
        static::updated(function () {
            Cache::forget(self::STATS_CACHE_KEY);
        });

        // clear products stats cache on product deletion
        static::deleted(function () {
            Cache::forget(self::STATS_CACHE_KEY);
        });
    }

    public static function getStats()
    {

        // set a cache for products stats with 43200 seconds lifetime (12 hours).
        // this will return the cached value if its available and if its not available, store it in cache.
        return Cache::remember(self::STATS_CACHE_KEY, 43200, function () {
            $stats = [
                'all' => self::count(),
                'in-stock' => self::where('stock_status', 'in-stock')->count(),
                'out-of-stock' => self::where('stock_status', 'out-of-stock')->count(),
                'cordless' => self::where('type', 'cordless')->count(),
                'corded' => self::where('type', 'corded')->count(),
                'hybrid' => self::where('type', 'hybrid')->count(),
                'panasonic' =>  [
                    'all' => self::where('brand', 'پاناسونیک')->count(),
                    'in-stock' => self::where('brand', 'پاناسونیک')->where('stock_status', 'in-stock')->count(),
                    'out-of-stock' => self::where('brand', 'پاناسونیک')->where('stock_status', 'in-stock')->count(),
                ],
                'siemens' => [
                    'all' =>  self::where('brand', 'زیمنس')->count(),
                    'in-stock' => self::where('brand', 'زیمنس')->where('stock_status', 'in-stock')->count(),
                    'out-of-stock' => self::where('brand', 'زیمنس')->where('stock_status', 'in-stock')->count(),
                ],
            ];

            return $stats;
        });
    }
}

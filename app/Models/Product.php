<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

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

    public static function getStats()
    {
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
    }
}

<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Seeder;

class StockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stocks = [
            'Jackson PLC',
            'Yandex',
            'JD.com',
            'StoneCo',
            'HDFC Bank',
            'Zoom Holdings'
        ];

        foreach ($stocks as $stock) {
            Stock::factory()->create(['name' => $stock]);
        }
    }
}

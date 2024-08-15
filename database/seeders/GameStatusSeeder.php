<?php

namespace Database\Seeders;

use App\Models\GameStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aStatuses = [
          'In Backlog',
          'Playing',
          'Completed'
        ];

        foreach ($aStatuses as $status) {
            GameStatus::query()->updateOrCreate(['name' => $status], ['name' => $status]);
        }
    }
}

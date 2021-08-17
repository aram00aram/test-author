<?php

namespace Database\Seeders\Status;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("statuses")->insert([
            [
                "status" => 'Очень срочная'
            ],
            [
                "status" => 'Срочная'
            ],
            [
                "status" => 'Не срочная'
            ],
            [
                "status" => 'Обычная'
            ],
        ]);
    }
}

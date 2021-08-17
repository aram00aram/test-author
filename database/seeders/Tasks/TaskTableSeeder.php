<?php

namespace Database\Seeders\Tasks;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("tasks")->insert([
            [
                "name" => "Купить слона",
                "author" => "Вася",
                "status_id" => 1
            ],
            [
                "name" => "Купить муху",
                "author" => "Саня",
                "status_id" => 3
            ],
            [
                "name" => "Купить яйцо",
                "author" => "Кристина",
                "status_id" => 4
            ],
            [
                "name" => "Купить корм",
                "author" => "Артур",
                "status_id" => 2
            ],
            [
                "name" => "Купить подушку",
                "author" => "Таня",
                "status_id" => 3
            ],
            [
                "name" => "Купить собаку",
                "author" => "Саша",
                "status_id" => 4
            ],
            [
                "name" => "Купить что-то",
                "author" => "Антон",
                "status_id" => 1
            ],
            [
                "name" => "Купить ничто",
                "author" => "Игорь",
                "status_id" => 2
            ],
        ]);
    }
}

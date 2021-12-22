<?php

namespace Database\Seeders;

use App\Models\Status;
use App\Models\Todo;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ステータスの登録
        $doing = Status::create([
            'name' => 'doing',
        ]);

        $done = Status::create([
            'name' => 'done',
        ]);

        // TODOを2件作成
        Todo::factory()->state([
            'status_id' => $doing->id,
        ])->create();

        Todo::factory()->state([
            'status_id' => $done->id,
        ])->create();
    }
}

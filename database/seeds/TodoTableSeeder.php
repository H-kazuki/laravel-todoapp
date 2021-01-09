<?php

use Illuminate\Database\Seeder;
use App\Todos;

class TodoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
        	'title' => 'laravel',
        	'content' => 'ポートフォリオ作成',
        ];
        $todo = new  Todos;
        $todo->fill($param)->save;
    }
}

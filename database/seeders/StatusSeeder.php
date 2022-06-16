<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
USE App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Status::query()->forceDelete();

        Status::create(
            [
                'id' => '1',
                'name' => 'CANCELLED',
            ]
        );
        Status::create(

            [
                'id' => '2',
                'name' => 'INPROGRESS',
            ]
        );
        Status::create(
            [
                'id' => '3',
                'name' => 'COMPLETED',
            ]
        );
        Status::create(
            [
                'id' => '4',
                'name' => 'HOLED',
            ]
        );    
    }
}

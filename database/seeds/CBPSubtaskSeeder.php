<?php

use App\CbpSubtask;
use Illuminate\Database\Seeder;

class CBPSubtaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = now();
        $dateNow = $dt->toDateTimeString();
        $cbp_subtask_lists = [
            [
                'cbp_subtask'=>'CCTV တပ်ဆင်ရပါမည်',
                'cbp_id' => '15',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'cbp_subtask'=>'Internet Service ရအောင်လုပ်ရပါမည်',
                'cbp_id' => '15',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'cbp_subtask'=>'SAP Support/SAP access ပြုလုပ်ပေးရပါမည်',
                'cbp_id' => '15',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'cbp_subtask'=>' Infra Structure Service / Network Cable  ပြုလုပ်ရပါမည်။',
                'cbp_id' => '15',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ]
        ];
        DB::table('cbp_subtasks')->insert($cbp_subtask_lists);
    }
}

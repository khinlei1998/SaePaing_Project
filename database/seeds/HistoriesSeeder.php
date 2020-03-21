<?php

use Illuminate\Database\Seeder;

class HistoriesSeeder extends Seeder
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
        $histories = [
            [
                'sender_id'=>'65',
                'receiver_id' => '00000090',
                'description'=>'နိုင်ငံတော် စီမံကိန်း စာချုပ်ပါ ပေးရန် ၊ ရရန် ၊ အပ်နှံရမည့်ကာလနှင့် မြေပြင်အခြေအနေ',
                'link_name'=>'profile',
                'project_id'=>'1',
                'cbp_id'=>'7',
                'read_this'=>'1',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'sender_id'=>'17',
                'receiver_id' => '00000629',
                'description'=>'အနှစ်ချုပ် Check List ဇယား /တာဝန်ပေးအပ်ထားမှု ဆိုင်ရာ OGC / Matrix structure',
                'link_name'=>'profile',
                'project_id'=>'1',
                'cbp_id'=>'3',
                'read_this'=>'0',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ]
        ]; 
        DB::table('histories')->insert($histories);  
    }
}

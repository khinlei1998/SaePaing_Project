<?php

use App\CbpList;
use Illuminate\Database\Seeder;

class CBPSeeder extends Seeder
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
        $cbp_lists = [
            [
                'cbp_id' => '1',
                'cbp_name'=>'CM ဖြင့် ဆက်သွယ်ဆောင်ရွက်ခြင်းနှင့် CM ၏ မှတ်ချက်များ ၊ ညွှန်ကြားချက်များ',
                'dept_id' => '1',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'cbp_id' => '2',
                'cbp_name'=>'စီမံကိန်း၏ ရည်ရွယ်ချက် ရည်မှန်းချက် / CBP ဖြစ်မြောက်ရေး ဆောင်ရွက်ရန်',
                 'dept_id' => '2',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'cbp_id' => '3',
                'cbp_name'=>'အနှစ်ချုပ် Check List ဇယား /တာဝန်ပေးအပ်ထားမှု ဆိုင်ရာ OGC / Matrix structure',
                 'dept_id' => '2',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'cbp_id' => '4',
                'cbp_name'=>'အုပ်ချုပ်မှု၊ တာဝန်ပေးအပ်မှု၊ တာဝန်ထမ်းဆောင်မှု၊ ပုံမှန်အစည်းအဝေး များနှင့် Report & Review နည်းလမ်းများ',
                 'dept_id' => '2',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'cbp_id' => '5',
                'cbp_name'=>'ကြုံတွေ့နိုင်သည့် အခက်အခဲများ ဖြေရှင်းမည့် နည်းလမ်းများ/ အန္တရာယ် ကင်းရှင်းရေး',
                 'dept_id' => '2',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'cbp_id' => '6',
                'cbp_name'=>'စီမံကိန်း၏ သမိုင်းကျဉ်း စီမံကိန်း စာချုပ် ချုပ်ဆိုခဲ့ပုံ အဆင့်ဆင့်',
                 'dept_id' => '3',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'cbp_id' => '7',
                'cbp_name'=>'နိုင်ငံတော် စီမံကိန်း စာချုပ်ပါ ပေးရန် ၊ ရရန် ၊ အပ်နှံရမည့်ကာလနှင့် မြေပြင်အခြေအနေ',
                 'dept_id' => '3',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'cbp_id' => '8',
                'cbp_name'=>'နိုင်ငံတော် စီမံကိန်း စာချုပ်ပါ အရေးကြီး အချက်များနှင့် ဆက်သွယ်ဆောင်ရွက်ရမည့် ဌာနများ',
                 'dept_id' => '3',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'cbp_id' => '9',
                'cbp_name'=>'စီမံကိန်း CBP နှင့် မြေပြင်အခြေ အနေ နှိုင်းယှဉ် Report / စီမံကိန်း၏ Rating',
                 'dept_id' => '3',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'cbp_id' => '10',
                'cbp_name'=>'ကျွမ်းကျင်သူများ မှတ်ချက်များ',
                 'dept_id' => '3',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'cbp_id' => '11',
                'cbp_name'=>'အထွေထွေ မှတ်ချက်များ',
                 'dept_id' => '3',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'cbp_id' => '12',
                'cbp_name'=>'ဆောက်လုပ်ခွင့်ပြုမိန့်များ',
                 'dept_id' => '4',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'cbp_id' => '13',
                'cbp_name'=>'PR နှင့် Media ဆိုင်ရာများ',
                 'dept_id' => '5',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'cbp_id' => '14',
                'cbp_name'=>'Finance',
                 'dept_id' => '6',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'cbp_id' => '15',
                'cbp_name'=>'Account',
                 'dept_id' => '7',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'cbp_id' => '16',
                'cbp_name'=>'Cash & Assets ဆိုင်ရာများ',
                 'dept_id' => '8',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'cbp_id' => '17',
                'cbp_name'=>'Marketing Plan & Target',
                 'dept_id' => '9',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'cbp_id' => '18',
                'cbp_name'=>'Estate Management',
                 'dept_id' => '9',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'cbp_id' => '19',
                'cbp_name'=>'Budget & Schedule and Construction Plan',
                 'dept_id' => '10',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'cbp_id' => '20',
                'cbp_name'=>'Design & Technical Support',
                 'dept_id' => '10',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'cbp_id' => '21',
                'cbp_name'=>'Site Office Operation Plan PM PE AM',
                 'dept_id' => '10',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'cbp_id' => '22',
                'cbp_name'=>'Logistics Plan',
                 'dept_id' => '11',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'cbp_id' => '23',
                'cbp_name'=>'Admin ဆိုင်ရာများ',
                 'dept_id' => '13',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'cbp_id' => '24',
                'cbp_name'=>'HR ဆိုင်ရာများ',
                 'dept_id' => '14',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ],
            [
                'cbp_id' => '25',
                'cbp_name'=>'IT Support',
                 'dept_id' => '15',
                'created_at' => $dateNow,
                'updated_at' => $dateNow
            ]
        ];
        DB::table('cbp_lists')->insert($cbp_lists);
    }
}

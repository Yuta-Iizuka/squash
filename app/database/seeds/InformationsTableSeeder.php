<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class InformationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            [
                'event_id' =>0,
                'time_id' =>0,
                'name' => 'ヨコハマスカッシュスタジアム SQ-CUBE',
                'prif' => '神奈川県',
                'city' => '横浜市',
                'adress' => '港北区新羽町482',
                'station' => '星川駅',
                'access' => '相鉄線星川駅より徒歩7分',
                'tel' => '045-306-8700',
                'holiday' => '毎週月曜日',
                'start_time' => '9:00',
                'end_time' => '22:00',
                'price' => '1時間1000円',
                'lat' => '35.5188972396015',
                'lng' => '139.612044042257',
                'check_id' =>1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'event_id' =>0,
                'time_id' =>0,
                'name' => 'コナミスポーツクラブ青葉台',
                'prif' => '神奈川県',
                'city' => '横浜市',
                'adress' => '青葉区青葉台2-2-2',
                'station' => '青葉台駅',
                'access' => '東急田園都市線青葉台駅より徒歩3分',
                'tel' => '045-983-0251',
                'holiday' => '毎週火曜日',
                'start_time' => '10:00',
                'end_time' => '21:00',
                'price' => '1時間500円',
                'lat' => '35.5421238181322',
                'lng' => '139.514832830691',
                'check_id' =>1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'event_id' =>0,
                'time_id' =>0,
                'name' => 'スポーツクラブ ルネサンス港南台',
                'prif' => '神奈川県',
                'city' => '横浜市',
                'adress' => '港南区港南台5-9-1',
                'station' => '港南台駅',
                'access' => 'JR港南台駅より徒歩8分',
                'tel' => '045-835-2202',
                'holiday' => '毎週月曜日',
                'start_time' => '9:00',
                'end_time' => '21:00',
                'price' => '1時間1500円',
                'lat' => '35.3695319375416',
                'lng' => '139.579539626981',
                'check_id' =>1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        foreach($params as $param){
            DB::table('informations')->insert($param);
        }

    }
}

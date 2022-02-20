<?php

use Illuminate\Database\Seeder;

class ConfigurationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


//        \DB::table('configurations')->delete();

        \DB::table('configurations')->insert(array(
            0 =>
                array(
                    'id' => 1,
                    'level_id' => 1,
                    'key' => '1',
                    'value' => 'تومان',
                    'created_at' => '2022-02-04 15:23:08',
                    'updated_at' => '2022-02-04 15:23:08',
                ),
        ));

    }

}

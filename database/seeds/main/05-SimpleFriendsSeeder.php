<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SimpleFriendsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS = 0");

        $fileName = '2016-03-04-simple_friends';
        $table_name = 'simple_friends';
        $fullFile = 'database/seeds/main/csv/'.$fileName.'.csv';

        DB::connection()->getPdo()->exec("TRUNCATE TABLE $table_name");
        $query = sprintf("LOAD DATA local INFILE '%s' INTO TABLE $table_name FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' ESCAPED BY '\"' LINES TERMINATED BY '\\n'", addslashes($fullFile));

        DB::connection()->getPdo()->exec($query);

        DB::statement("SET FOREIGN_KEY_CHECKS = 1");
    }

}
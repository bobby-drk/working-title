<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use App\Models\Provider;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProvidersSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("SET FOREIGN_KEY_CHECKS = 0");

        Provider::truncate();
        $fileName = '2016-02-25-providers';
        $table_name = 'providers';
        $fullFile = 'database/seeds/main/csv/'.$fileName.'.csv';

        $query = sprintf("LOAD DATA local INFILE '%s' INTO TABLE $table_name FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' ESCAPED BY '\"' LINES TERMINATED BY '\\n'", addslashes($fullFile));

        DB::connection()->getPdo()->exec($query);
        DB::statement("SET FOREIGN_KEY_CHECKS = 1");
    }

}
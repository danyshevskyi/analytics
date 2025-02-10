<?php

namespace Analytics\App\Models;

use Illuminate\Database\Capsule\Manager as Capsule;
use \Illuminate\Database\Eloquent\Model;

class Migration extends Model {

public $data = [
                    [
                        'key_projects' => 1,
                        'name' => 'Miles',
                        'url' => 'https://dov.pp.ua/miles',
                        'key_name' => 'miles'
                    ],
                    [
                        'key_projects' => 2,
                        'name' => 'Analytics',
                        'url' => 'https://dov.pp.ua/analytics',
                        'key_name' => 'analytics'
                    ],
                    [
                        'key_projects' => 3,
                        'name' => 'Dov Software',
                        'url' => 'https://dov.pp.ua',
                        'key_name' => 'index'
                    ],
                    [
                        'key_projects' => 4,
                        'name' => 'English Cards',
                        'url' => 'https://dov.pp.ua/english-cards',
                        'key_name' => 'cards'
                    ]
];

public function migration() {

    if(Capsule::schema()->hasTable('analytics_projects'))
    {
        echo "The table <b>analytics_project</b> already exist ...<br>";
    }
    else
    {       
        Capsule::schema()->create('analytics_projects', function ($table) {
            $table->tinyInteger('key_projects')->primary();
            $table->string('name');
            $table->string('url');
            $table->string('key_name');
        });
                echo "Migration table <b>analytics_project </b> is successful!<br>";

        // Seeding table analytics_project
        $this->seeds('analytics_projects');
            echo "Seeding table <b>analytics_projects </b> is successful!<br>"; 
    }

    foreach($this->data as $array)
    {
        if(Capsule::schema()->hasTable("analytics_" .$array['key_name'].""))
        {
            echo "The table <b>analytics_" .$array['key_name']."</b> already exist ...<br>";
        }
        else
        {  
            Capsule::schema()->create("analytics_" .$array['key_name']."", function ($table) {
                $table->increments('id_analytics');
                $table->string('token');
                $table->string('ip');
                $table->string('device');
                $table->string('os');
                $table->string('browser');
                $table->timestamp('date_activity');
                $table->integer('activity_score');
                $table->string('country');
                $table->string('region');
                $table->string('city');
                $table->string('lang');
                $table->string('latitude');
                $table->string('longitude');
                $table->string('isp');
                $table->string('api');
                $table->string('referer');
            });
                echo "Migration table <b>analytics_" .$array['key_name']."</b> is successful!<br>";        
        }       
    }   
}

public function seeds($table_name) {
    
    $this->table = $table_name;

        foreach($this->data as $array)
        {
            $this->insert([
                'key_projects' => $array['key_projects'],
                'name' => $array['name'],
                'url' => $array['url'],
                'key_name' => $array['key_name']   
            ]);  
        }    
}

public function migration_update() {

}

}

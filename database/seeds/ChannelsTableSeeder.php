<?php
use ChartForum\Channel;
use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
          'name'=> 'Laravel',
          'slug' => str_slug('Laravel')
        ]);
        Channel::create([
          'name'=> 'Symfony',
          'slug' => str_slug('Symfony')
        ]);
        Channel::create([
          'name'=> 'Zend Framework',
          'slug' => str_slug('Zend Framework')
        ]);
        Channel::create([
          'name'=> 'FuelPHP',
          'slug' => str_slug('FuelPHP')
        ]);
    }
}

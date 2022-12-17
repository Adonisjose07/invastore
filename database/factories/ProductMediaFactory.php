<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\ProductMedia;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductMedia>
 */
class ProductMediaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'type' => 'gen',
            'size' => 'N/A',
            'duration' => 'N/A',
            'featured' => 0
        ];
    }

    public function configure(){
        return $this->afterCreating(function(ProductMedia $pm){
            $str = $pm->name;
            $mod = ((int) $pm->id) / 3;
            $mod = explode('.', $mod);
            if(count($mod) > 1){
                switch($mod[1][0]){
                    case 3:
                        $rplz = 1;
                        break;
                    case 6:
                        $rplz = 2;   
                        break;                     
                }
            }else{
                $rplz = 3;    
            }
            if($rplz == 1){
                $pm->featured = 1;
            }
            $str = str_replace('{b}', $rplz, $str);
            $pm->name = $str;
            $pm->uri = $str;
            $pm->url = $str;

            $pm->save();
        });
    }
}

<?php

namespace Database\Factories;

use App\Models\Pageview;
use Illuminate\Database\Eloquent\Factories\Factory;

class PageviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pageview::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'page' => "Beranda",
            // 'ip_add' => "127.0.0.1",
            'ip_add' => $this->faker->ipv4(),
        ];
    }
}

<?php

namespace App\Traits;

use Faker\Factory as Faker;
use Faker\Generator;
use Illuminate\Http\Request;

trait ForApiController
{
    private Request $request;
    private Generator $faker;

    public function __construct(Request $request)
    {
        $this->request  = $request;
        $this->faker    = Faker::create(); // Used as a tool to generate fake data
    }

    public function getSelfUrl(): string
    {
        return $this->request->url();
    }

    public function getType(): string
    {
        return self::TYPE;
    }
}
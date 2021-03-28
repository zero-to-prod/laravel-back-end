<?php

namespace App\Traits;

use Faker\Factory as Faker;
use Faker\Generator;
use Illuminate\Http\Request;

trait ForApiController
{
    private Request $request;
    private Generator $faker;
    private string $id;
    private array $attributes;
    private string $link_self;

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->faker = Faker::create(); // Used as a tool to generate fake data
    }
}
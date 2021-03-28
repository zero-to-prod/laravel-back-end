<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\ApiController;
use App\Http\Resources\V1\ParagraphsResource;
use Faker\Factory as Faker;
use Faker\Generator;
use Tests\Feature\Api\ParagraphsTest;

class ParagraphsController extends ApiController
{
    /*
     * Properties used to build the response.
     *
     * Note: all public properties are passed to the resource.
     */
    public array $paragraphs;
    protected Generator $faker;

    /**
     * Called from the route.
     *
     * @see ParagraphsTest
     */
    public function __invoke(): ParagraphsResource
    {
        return new ParagraphsResource($this);
    }

    /**
     * Runs on every request.
     */
    public function handle(): void
    {
        $this->faker      = Faker::create(); // A tool to generate fake data
        $this->paragraphs = $this->getParagraphs();
    }

    private function getParagraphs(): array
    {
        $paragraphs = [];
        for ($i = 0; $i < $this->getNumberOfParagraphsFromQueryString(); $i++) {
            $paragraphs[] = $this->faker->paragraph;
        }

        return $paragraphs;
    }

    private function getNumberOfParagraphsFromQueryString(): int
    {
        return (int)$this->request->query('number_of_paragraphs');
    }
}

<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ParagraphsResource;
use Faker\Factory as Faker;
use Faker\Generator;
use Illuminate\Http\Request;
use Tests\Feature\Api\ParagraphsTest;

class ParagraphsController extends Controller
{
    /*
     * Properties used to build the response.
     *
     * Note: all public properties are passed to the resource.
     */
    public string $id;
    public string $type = 'paragraphs';
    public array $paragraphs;
    protected Request $request;
    protected Generator $faker;

    public function __construct(Request $request)
    {
        $this->request    = $request;
        $this->faker      = Faker::create(); // A tool to generate fake data
        $this->paragraphs = $this->getParagraphs();
        $this->id         = $this->getId();
    }

    /**
     * Called from the route.
     *
     * @see ParagraphsTest
     */
    public function __invoke(): ParagraphsResource
    {
        return new ParagraphsResource($this);
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

    /**
     * @return string
     */
    private function getId(): string
    {
        return (string)count($this->paragraphs);
    }
}

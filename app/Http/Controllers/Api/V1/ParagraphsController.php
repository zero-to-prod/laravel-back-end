<?php

namespace App\Http\Controllers\Api\V1;

use App\Concerns\ApiController;
use App\Http\Controllers\Controller;
use App\Traits\ForApiController;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Tests\Feature\Api\ParagraphsTest;

class ParagraphsController extends Controller implements ApiController
{
    use ForApiController;

    private const TYPE = 'paragraphs';

    /**
     * @return Application|ResponseFactory|Response
     * @see ParagraphsTest::invoke()
     */
    public function __invoke()
    {
        return response($this->getResponse(), 200);
    }

    public function getResponse(): array
    {
        /*
         * The shape of the response is structured from the json:api spec
         * https://jsonapi.org/
         */
        return [
            "links" => [
                'self' => $this->getSelfUrl()
            ],
            "data"  => [
                'type'       => $this->getType(),
                'id'         => $this->getId(),
                'attributes' => $this->getAttributes()
            ]
        ];
    }

    public function getId(): string
    {
        return $this->getNumberOfParagraphsFromRequest();
    }

    private function getNumberOfParagraphsFromRequest(): int
    {
        return (int)$this->request->query('number_of_paragraphs');
    }

    public function getAttributes(): array
    {
        return [
            'paragraphs' => $this->getParagraphs()
        ];
    }

    private function getParagraphs(): array
    {
        $paragraphs = [];
        for ($i = 0; $i < $this->getNumberOfParagraphsFromRequest(); $i++) {
            $paragraphs[] = $this->faker->paragraph;
        }

        return $paragraphs;
    }
}

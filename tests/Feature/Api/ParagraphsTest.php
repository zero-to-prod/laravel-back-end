<?php

namespace Tests\Feature\Api;

use App\Http\Controllers\Api\V1\ParagraphsController;
use Tests\TestCase;

class ParagraphsTest extends TestCase
{
    /**
     * @test
     *
     * @see ParagraphsController::__invoke()
     */
    public function invoke(): void
    {
        $this->withoutExceptionHandling();
        $response       = $this->get(route('api.v1.paragraphs'))->assertStatus(200);
        $response_array = json_decode($response->getContent(), true);
        self::assertEquals(route('api.v1.paragraphs'), $response_array['links']['self']);
    }
}

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
    public function request_with_no_parameters(): void
    {
        $this->withoutExceptionHandling();
        $route = route('api.v1.paragraphs');
        $response = $this->json('GET', $route);

        $response->assertJsonPath('links.self', $route);
        $response->assertJsonPath('data.type', 'paragraphs');
        $response->assertJsonPath('data.id', '0');
        $response->assertJsonPath('data.attributes.paragraphs', []);
    }

    /**
     * @test
     *
     * @see ParagraphsController::__invoke()
     */
    public function request_1_paragraph(): void
    {
        $this->withoutExceptionHandling();
        $number_of_paragraphs = '1';
        $route = route('api.v1.paragraphs', ['number_of_paragraphs' => $number_of_paragraphs]);
        $response = $this->json('GET', $route);

        $response->assertJsonPath('links.self', $route);
        $response->assertJsonPath('data.type', 'paragraphs');
        $response->assertJsonPath('data.id', $number_of_paragraphs);
        self::assertCount($number_of_paragraphs, $response->json()['data']['attributes']['paragraphs']);
    }

    /**
     * @test
     *
     * @see ParagraphsController::__invoke()
     */
    public function request_3_paragraphs(): void
    {
        $number_of_paragraphs = '3';
        $route = route('api.v1.paragraphs', ['number_of_paragraphs' => $number_of_paragraphs]);
        $response = $this->json('GET', $route);
        self::assertCount($number_of_paragraphs, $response->json()['data']['attributes']['paragraphs']);
    }
}

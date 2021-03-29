<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed paragraphs
 * @property mixed id
 * @property mixed type
 */
class ParagraphsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * The shape of the response is structured from the json:api spec
     * https://jsonapi.org/
     *
     * @param  Request  $request
     *
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'links' => [
                'self' => $request->fullUrl()
            ],
            'data'  => [
                'id'         => $this->id,
                'type'       => $this->type,
                'attributes' => [
                    'paragraphs' => $this->paragraphs
                ]
            ]
        ];
    }
}

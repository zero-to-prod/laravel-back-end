<?php

namespace App\Concerns;

interface ApiController
{
    public function getSelfUrl(): string;

    public function getType(): string;

    public function getId(): string;

    public function getAttributes(): array;

    public function getResponse(): array;
}
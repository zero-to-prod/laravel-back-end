<?php

namespace App\Concerns;

interface ResourceController
{
    public function setLinkSelf(): void;

    public function setId(): void;

    public function response();
}
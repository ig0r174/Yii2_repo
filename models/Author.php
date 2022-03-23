<?php

namespace app\interfaces;

interface Author
{
    public function create(): bool;

    public function update($post): bool;

    public function getName();
}
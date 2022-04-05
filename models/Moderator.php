<?php

namespace app\interfaces;

interface Moderator
{
    public function publish($post): bool;

    public function unPublish($post): bool;
}
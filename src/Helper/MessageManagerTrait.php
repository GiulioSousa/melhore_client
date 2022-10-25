<?php

namespace Melhore\Client\Helper;

trait MessageManagerTrait
{
    public function setMessage(string $type, string $message):void
    {
        $_SESSION['typeMessage'] = $type;
        $_SESSION['message'] = $message;
    }

    public function setTitle(string $title):void
    {
        $_SESSION['title'] = $title;
    }

    public function setDescription(string $description):void
    {
        $_SESSION['description'] = $description;
    }
}
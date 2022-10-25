<?php

namespace Melhore\Client\Helper;

trait RenderHtmlTrait
{
    public function renderHtml(string $templatePath, array $data): string
    {
        extract($data);
        ob_start();
        require __DIR__ . '/../../view/' . $templatePath;
        
        return ob_get_clean();
    }
}
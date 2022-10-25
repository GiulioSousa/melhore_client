<?php

namespace Melhore\Client\Helper;

trait PhotoFilterTrait
{
    public function photoFilter(array $file)
    {
        $newFile = explode('.', $file['name']);
        $newFileSize = $newFile[sizeof($newFile) -1];

        if ($newFileSize !== 'png' || $newFileSize !== 'jpg') {
            die('Formato de arquivo inválido');
        }
        return $file;
    }
}
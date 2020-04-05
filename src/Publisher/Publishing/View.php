<?php

namespace Orchestra\Publisher\Publishing;

use InvalidArgumentException;

class View extends Publisher
{
    /**
     * Get the source views directory to publish.
     *
     * @throws \InvalidArgumentException
     */
    protected function getSource(string $package, string $packagePath): string
    {
        $sources = [
            "{$packagePath}/{$package}/resources/views",
            "{$packagePath}/{$package}/views",
        ];

        foreach ($sources as $source) {
            if ($this->files->isDirectory($source)) {
                return $source;
            }
        }

        throw new InvalidArgumentException('Views not found.');
    }
}

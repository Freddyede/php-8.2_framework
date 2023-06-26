<?php

namespace Core\Interfaces\Modules;

interface DirectoryModulesInterface
{
    /**
     * @param string|null $parentDirectories directory from root directory
     * @param string|null $childsDirectories directory from parent directory if exists
     * @return array|null
     * @author Patouillard Franck<patouillardfranck3@gmail.com>
     * @desc returns all files from parent Directories and childsDirectories if parentDirectory and childsDirectory exists in project
     */
    public static function directoryReaders(?string $parentDirectories = NULL, ?string $childsDirectories = NULL): array|null;
}
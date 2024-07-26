<?php

namespace Core\Interfaces\Modules;

interface DirectoryModulesInterface
{
    /**
     * returns all files from parent Directories and children directories
     * if parentDirectory and children directories exist in a project
     * @param string|null $parentDirectories directory from root directory
     * @param string|null $childsDirectories directory from parent directory if exists
     * @return array|null
     * @author Patouillard Franck<patouillardfranck3@gmail.com>
     */
    public static function directoryReaders(?string $parentDirectories = NULL, ?string $childsDirectories = NULL): array|null;
}
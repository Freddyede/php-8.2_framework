<?php

namespace Core\Modules;

use Core\Interfaces\Modules\DirectoryModulesInterface;
use Exception;


/**
 * @author Patouillard Franck<patouillardfranck3@gmail.com>
 * @class DirectoryReadersModules
 * @desc This class can read all directories inside project
 */
class DirectoryModules implements DirectoryModulesInterface
{
    private static string $rootDirectory;

    public static function __staticConstruct(): void
    {
        require __DIR__ . '/../../index.php';
        self::$rootDirectory = INIT_DIRECTORY;
    }

    /**
     * @param string|null $parentDirectories directory from root directory
     * @param string|null $childsDirectories directory from parent directory if exists
     * @throws Exception
     * @author Patouillard Franck<patouillardfranck3@gmail.com>
     * @desc returns all files from parent Directories and childsDirectories if parentDirectory and childsDirectory exists in project and if isn't present return exception
     */
    public static function directoryReaders(?string $parentDirectories = NULL, ?string $childsDirectories = NULL): ?array
    {
        self::__staticConstruct();
        return (
            is_dir(self::$rootDirectory . '/' . $parentDirectories) &&
            is_dir(self::$rootDirectory . '/' . $parentDirectories . '/' . $childsDirectories)
        )
            ?
            scandir(self::$rootDirectory . '/' . $parentDirectories . '/' . $childsDirectories)
            :
            throw new Exception('Parent or child directory does not exist');
    }
}
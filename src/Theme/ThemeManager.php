<?php
namespace Mage2\Framework\Theme;

use Illuminate\Support\Collection;
use Symfony\Component\Finder\Iterator\RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class ThemeManager
{

    public $themeList;
    public $themeLoaded = false;

    public function __construct()
    {
        $this->themeList = Collection::make([]);
    }

    public function all()
    {
        if($this->themeLoaded === false) {
            $this->loadThemes();
        }
        return $this->themeList;
    }

    protected function loadThemes() {

        $themePath = base_path('themes');


        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($themePath, RecursiveDirectoryIterator::FOLLOW_SYMLINKS)
        );

        $iterator->setMaxDepth(2);
        $iterator->rewind();

        while ($iterator->valid()) {

            if (($iterator->getDepth() > 1) && $iterator->isFile() && ($iterator->getFilename() == "ThemeInfo.php")) {

                $filePath = $iterator->getPathname() ;
                $themeInfo = include_once $filePath;
                $this->themeList->push($themeInfo);
            }
            $iterator->next();
        }

        $this->themeLoaded = true;

        return $this;
    }
}
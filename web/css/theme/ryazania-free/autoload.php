<?php

    if ( !defined('K_COUCH_DIR') ) die(); // cannot be loaded directly

    /**
    *
    *   Регистрирует скрипты PHP из определенных подпапок автоматически (тех что оканчиваются на -enabled).
    *
    *   This file automatically registers *.php files from given subfolders (end with -enabled) with CouchCMS.
    *
    *   @автор Антон С.
    *   @почта tony.smirnov@gmail.com
    *   @начало 01 Марта 2020
    *   @обнова 02 Ноября 2023
    */

    $dump_log = true;
    $dump_log = false;
    if ($dump_log) { file_put_contents( __DIR__.'/log.txt', "Autoload begin at " . date('H:i:s') . PHP_EOL . str_repeat('-', 44) . PHP_EOL ); $t1 = microtime(true); }

    $include = array_filter( array_map(function($path){ return str_replace( array('\\','/'), DIRECTORY_SEPARATOR, $path); }, array(
        __DIR__ . '/scripts-enabled/',
        __DIR__ . '/shortcodes-enabled/',
        __DIR__ . '/tags-enabled/',
        __DIR__ . '/tweaks-enabled/',
        __DIR__ . '/validators-enabled/',
        __DIR__ . '/vars-enabled/',
    )), function($path){return file_exists($path);});

    $includeAddons = array_filter( array_map(function($path){ return str_replace( array('\\','/'), DIRECTORY_SEPARATOR, $path); }, array(
        __DIR__ . '/addons-enabled/',
    )), function($path){return file_exists($path);});

    $exclude = array_filter( array_map(function($path){ return str_replace( array('\\','/'), DIRECTORY_SEPARATOR, $path); }, array(
        //__FILE__,
        // __DIR__.'/vendor/',
    )), function($path){return file_exists($path);});

    $iterator = new AppendIterator();
    foreach ($include as $dir) {
        $directoryIterator = new RecursiveDirectoryIterator( $dir, FilesystemIterator::SKIP_DOTS );
        if( true ){
            // either filtered
            $filteredIterator = new \AutoloadPHPFileFilter($directoryIterator);
            $iterator->append(new RecursiveIteratorIterator( $filteredIterator ));
        } else {
            // or not
            $iterator->append(new RecursiveIteratorIterator( $directoryIterator ));
        }
    }

    foreach ($iterator as $file) {
        $pathname = $file->getPathname();
        if ($dump_log) { file_put_contents( __DIR__.'/log.txt', "Testing path - $pathname" . PHP_EOL, FILE_APPEND ); }
        if( false === $file->isFile() ) continue;
        if( false === $file->isReadable() ) continue;
        if( strtolower( $file->getExtension() ) !== 'php' ) continue;
        foreach($exclude as $ignored){
            if( false !== strpos($pathname, $ignored) ) continue 2;
        }
        if ($dump_log) { file_put_contents( __DIR__.'/log.txt', "ok" . PHP_EOL, FILE_APPEND ); }
        require_once $pathname;
    }

    $iterator = new AppendIterator();
    foreach ($includeAddons as $dir) {
        $directoryIterator = new RecursiveDirectoryIterator( $dir, FilesystemIterator::SKIP_DOTS );
        if( true ){
            // either filtered
            $filteredIterator = new \AutoloadPHPFileFilter($directoryIterator);
            $iterator->append(new RecursiveIteratorIterator( $filteredIterator ));
        } else {
            // or not
            $iterator->append(new RecursiveIteratorIterator( $directoryIterator ));
        }
    }

    foreach ($iterator as $file) {
        $pathname = $file->getPathname();
        if ($dump_log) { file_put_contents( __DIR__.'/log.txt', "Testing path - $pathname" . PHP_EOL, FILE_APPEND ); }
        if( '__autoload.php' !== $file->getFilename() ) continue;
        if ($dump_log) { file_put_contents( __DIR__.'/log.txt', "ok" . PHP_EOL, FILE_APPEND ); }
        require_once $pathname;
    }

    if ($dump_log) { file_put_contents( __DIR__.'/log.txt', str_repeat('-', 44) . PHP_EOL . "Autoload complete after " . round( (microtime(true)-$t1)*1000 ) . " ms" . PHP_EOL, FILE_APPEND ); }
    if (!$dump_log) { unlink(__DIR__.'/log.txt'); }
    unset( $dump_log, $iterator, $include, $includeAddons, $exclude, $directoryIterator, $pathname, $t1 );


    //-
    // Make sure only PHP files are found
    //-
    class AutoloadPHPFileFilter extends \RecursiveFilterIterator {
        public function accept() {
            $name = $this->current()->getFilename();
            if( $name[0] === '.' ){ return false; }
            if( $this->current()->isDir() ){ return true; }
            $_ext = strrchr( strtolower($name), '.' );
            if( (false === $_ext) || ($_ext !== '.php') ){ return false; }
            return true;
        }
    } // end Class

<?php

    // Include the DirectoryLister class
    require_once('resources/DirectoryLister.php');
    
    // Include config json
    $site_config_json = file_get_contents('config.json');
    $site_config = json_decode($site_config_json);

    // Initialize the DirectoryLister object
    $lister = new DirectoryLister();

    // Restrict access to current directory
    ini_set('open_basedir', getcwd());

    // Return file hash
    if (isset($_GET['hash'])) {

        // Get file hash array and JSON encode it
        $hashes = $lister->getFileHash($_GET['hash']);
        $data   = json_encode($hashes);

        // Return the data
        die($data);

    }

    if (isset($_GET['zip'])) {

        $dirArray = $lister->zipDirectory($_GET['zip']);

    } else {

        // Initialize the directory array
        if (isset($_GET['dir'])) {
            if(isset($_GET['by'])){
                if(isset($_GET['order'])){
                    $dirArray = $lister->listDirectory($_GET['dir'],'lastModified','desc');
                } else {
                    $dirArray = $lister->listDirectory($_GET['dir'],'lastModified','desc');
                }
            } else {
                $dirArray = $lister->listDirectory($_GET['dir'],'lastModified','desc');
            }
        } else {
            if(isset($_GET['by'])){
                if(isset($_GET['order'])){
                    $dirArray = $lister->listDirectory('Files/','lastModified','desc');
                } else {
                    $dirArray = $lister->listDirectory('Files/','lastModified','desc');
                }
            } else {
                $dirArray = $lister->listDirectory('Files/','lastModified','desc');
            }
        }

        // Define theme path
        if (!defined('THEMEPATH')) {
            define('THEMEPATH', $lister->getThemePath());
        }

        // Set path to theme index
        $themeIndex = $lister->getThemePath(true) . '/index.php';

        // Initialize the theme
        if (file_exists($themeIndex)) {
            include($themeIndex);
        } else {
            die('ERROR: Failed to initialize theme');
        }

    }

    function home_base_url(){
        
        $base_url = (isset($_SERVER['HTTPS']) &&
        
        $_SERVER['HTTPS']!='off') ? 'https://' : 'http://';

        
        $tmpURL = dirname(__FILE__);

        $tmpURL = str_replace(chr(92),'/',$tmpURL);

        $tmpURL = str_replace($_SERVER['DOCUMENT_ROOT'],'',$tmpURL);
        
        $tmpURL = ltrim($tmpURL,'/');
        
        $tmpURL = rtrim($tmpURL, '/');
        
        
        if (strpos($tmpURL,'/')){
    
            $tmpURL = explode('/',$tmpURL);
    
            $tmpURL = $tmpURL[0];
    
            }

        
        if ($tmpURL !== $_SERVER['HTTP_HOST'])
    
            $base_url .= $_SERVER['HTTP_HOST'].'/'.$tmpURL.'/';
    
        else
    
            $base_url .= $tmpURL.'/';
        
        return $base_url; 
        
    }

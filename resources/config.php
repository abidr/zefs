<?php

return array(

    // Basic settings
    'home_label'                => 'Home',
    'hide_dot_files'            => true,
    'list_folders_first'        => true,
    'list_sort_order'           => 'natcasesort',
    'theme_name'                => 'default',
    'date_format'               => 'd-m-Y h:i A', // See: http://php.net/manual/en/function.date.php

    // Hidden files
    'hidden_files' => array(
        '.ht*',
        '*/.ht*',
        'resources',
        'resources/*',
        'analytics.inc',
        'header.php',
        'footer.php',
        'upload.php',
        'index.php',
        'externaldisk/Files/remote.php',
        'externaldisk/Files/*.html',
        'index2.php',
        'speedtest-cli',
        'speedtest.py',
    ),

    // If set to 'true' an directory with an index file (as defined below) will
    // become a direct link to the index page instead of a browsable directory
    'links_dirs_with_index' => false,

    // Make linked directories open in a new (_blank) tab
    'external_links_new_window' => true,

    // Files that, if present in a directory, make the directory
    // a direct link rather than a browse link.
    'index_files' => array(
        'index.htm',
        'index.html',
        'index.php'
    ),

    // File hashing threshold
    'hash_size_limit' => 268435456, // 256 MB

    // Custom sort order
    'reverse_sort' => array(
        // 'path/to/folder'
    ),

    // Allow to download directories as zip files
    'zip_dirs' => true,

    // Stream zip file content directly to the client,
    // without any temporary file
    'zip_stream' => true,

    'zip_compression_level' => 3,

    // Disable zip downloads for particular directories
    'zip_disable' => array(
        // 'path/to/folder'
    ),

);

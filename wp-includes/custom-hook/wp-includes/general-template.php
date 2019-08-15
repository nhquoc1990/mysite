<?php
/**
 * Echo full context URL of a uri resource
 *
 **/
function apply_url($uri = '')
{
    $uri = trim($uri);
    if (strcmp(mb_substr($uri, 0, 1), "/")) {
        $uri = "/".$uri;
    }
    echo get_bloginfo('url', 'display') . $uri;
}

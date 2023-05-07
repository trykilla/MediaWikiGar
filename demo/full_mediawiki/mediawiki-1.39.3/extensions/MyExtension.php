<?php

class MyExtension {
    public static function onPageSaveComplete($wikiPage, $user, $content, $summary, $isMinor, $isWatch, $section, $flags, $revision, $status, $baseRevId) {
        exec('tbnotify_send Página creada.');
        return true;
    }
}

$wgExtensionFunctions[] = function() {
    $handler = new MyExtension();
    Hooks::register('PageSaveComplete', [$handler, 'onPageSaveComplete']);
};

?>

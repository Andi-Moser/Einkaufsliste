<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerBqul2fx\appDevDebugProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerBqul2fx/appDevDebugProjectContainer.php') {
    touch(__DIR__.'/ContainerBqul2fx.legacy');

    return;
}

if (!\class_exists(appDevDebugProjectContainer::class, false)) {
    \class_alias(\ContainerBqul2fx\appDevDebugProjectContainer::class, appDevDebugProjectContainer::class, false);
}

return new \ContainerBqul2fx\appDevDebugProjectContainer([
    'container.build_hash' => 'Bqul2fx',
    'container.build_id' => 'c96b8237',
    'container.build_time' => 1586413910,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerBqul2fx');
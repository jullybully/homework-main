<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerSQSmBUC\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerSQSmBUC/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerSQSmBUC.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerSQSmBUC\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerSQSmBUC\App_KernelDevDebugContainer([
    'container.build_hash' => 'SQSmBUC',
    'container.build_id' => '7b3a6713',
    'container.build_time' => 1681669267,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerSQSmBUC');

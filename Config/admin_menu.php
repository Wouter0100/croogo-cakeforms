<?php

CroogoNav::add('sidebar', 'cforms', array(
    'icon' => 'envelope',
    'title' => __d('cforms', 'Forms'),
    'url' => '#',
    'access' => array('admin'),
    'weight' => 55,
    'children' => array(
        'cforms1' => array(
            'title' => __d('cforms', 'List Forms'),
            'url' => array('controller' => 'cforms', 'action' => 'index', 'plugin' => 'cforms','admin' => true),
            'access' => array('admin'),
        ),
        'cforms2' => array(
            'title' => __d('cforms', 'Create Form'),
            'url' => array('controller' => 'cforms', 'action' => 'add', 'plugin' => 'cforms','admin' => true),
            'access' => array('admin'),
        ),
        'cforms3' => array(
            'title' => __d('cforms', 'Validation Rules'),
            'url' => array('controller' => 'validation_rules', 'action' => 'index', 'plugin' => 'cforms','admin' => true),
            'access' => array('admin'),
        ),
    ),
));

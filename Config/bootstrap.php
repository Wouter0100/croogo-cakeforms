<?php

Croogo::hookComponent('Nodes', 'Cforms.Cforms');
Croogo::hookHelper('Nodes', 'Cforms.CformCss');

// Configure Wysiwyg
Croogo::mergeConfig('Wysiwyg.actions', array(
    'Cforms/admin_edit' => array(
        array(
            'elements' => 'CformSuccessMessage',
        ),
        array(
            'elements' => 'CformAutoConfirmation',
        ),
    ),
));

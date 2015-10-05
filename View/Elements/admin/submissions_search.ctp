<?php

$url = isset($url) ? $url : array('action' => 'index');

?>
<div class="clearfix filter">
    <?php
    echo $this->Form->create('Submission', array(
        'class' => 'form-inline',
        'url' => $url,
        'inputDefaults' => array(
            'label' => false,
        ),
    ));

    echo $this->Form->input('cform_id', array(
        'options' => $cforms,
        'empty' => __d('cforms', 'Forms'),
    ));

    echo $this->Form->input(__d('cforms', 'Filter'), array(
        'type' => 'submit',
    ));
    echo $this->Form->end();
    ?>
</div>
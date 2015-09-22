<h2>New "<?php echo $response['Cform']['name'];?>" Submission</h2>
<strong>Submitted On</strong> <?php echo date('m/d/y \a\t h:i A');?><br />
<strong>Page:</strong> <?php echo $response['Submission']['page'];?><br />
<strong>IP:</strong> <?php echo $response['Submission']['ip'];?><br />

=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-
<table>
<?php foreach($response['SubmissionField'] as $data):?>
    <tr><td style="width:120px; padding-right: 10px; text-align: right"><strong><?php echo Inflector::humanize($data['form_field']);?></strong></td><td style="width:450px"><?php echo $data['response'];?></td></tr>
<?php endforeach;?>
</table>
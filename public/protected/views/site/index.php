<?php
$this->pageTitle=Yii::app()->name;
?>
<a href="/projects/add">New project</a><br>
<? if (!empty($projects)) : ?>
    <? foreach ($projects as $project) :?>
        <?=$project->project_url; ?>
    <? endforeach; ?>
<? endif; ?>

<form method="POST" action="/projects/add/">
    <input type="text" name="url">
    <input type="submit">
</form>



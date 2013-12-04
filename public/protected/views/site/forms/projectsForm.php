<?php
    echo CHtml::beginForm();
?>
<fieldset>
    <legend>Edit Project</legend>
    <div class="row-fluid">
        <div class="span6 ">
            <div class="control-group <?=!empty($form->model->errors['project_url']) ? 'error' : '';?>">
                <label class="control-label" for="<?=$form->elements['project_url']->id;?>"><?=$form->elements['project_url']->label;?></label>
                <div class="controls">
                    <input type="text" id="<?=$form->elements['project_url']->id;?>" name="projects[<?=$form->elements['project_url']->name;?>]" value="<?=$form->model->attributes['project_url'];?>" class="m-wrap span12">
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6 ">
            <div class="control-group <?=!empty($form->model->errors['prefix']) ? 'error' : '';?>">
                <label class="control-label" for="<?=$form->elements['prefix']->id;?>"><?=$form->elements['prefix']->label;?></label>
                <div class="controls">
                    <input type="text" id="<?=$form->elements['prefix']->id;?>" name="projects[<?=$form->elements['prefix']->name;?>]" value="<?=$form->model->attributes['prefix'];?>" class="m-wrap span12">
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6 ">
            <div class="control-group <?=!empty($form->model->errors['app_club']) ? 'error' : '';?>">
                <label class="control-label"><?=$form->elements['app_club']->label;?></label>
                <div class="controls">
                    <select class="m-wrap span12" name="projects[<?=$form->elements['app_club']->name;?>]">
                        <option value="">Choose Home Club</option>
                        <? foreach ($form->elements['app_club']->items as $k=>$item) : ?>
                            <option <?=$form->model->attributes['app_club'] == $k ? 'selected' : '';?> value="<?=$k;?>"><?=$item;?></option>
                        <? endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6 ">
            <div class="control-group <?=!empty($form->model->errors['facebook_app_id']) ? 'error' : '';?>">
                <label class="control-label" for="<?=$form->elements['facebook_app_id']->id;?>"><?=$form->elements['facebook_app_id']->label;?></label>
                <div class="controls">
                    <input type="text" id="<?=$form->elements['facebook_app_id']->id;?>" name="projects[<?=$form->elements['facebook_app_id']->name;?>]" value="<?=$form->model->attributes['facebook_app_id'];?>" class="m-wrap span12">
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6 ">
            <div class="control-group <?=!empty($form->model->errors['facebook_app_secret']) ? 'error' : '';?>">
                <label class="control-label" for="<?=$form->elements['facebook_app_secret']->id;?>"><?=$form->elements['facebook_app_secret']->label;?></label>
                <div class="controls">
                    <input type="text" id="<?=$form->elements['facebook_app_secret']->id;?>" name="projects[<?=$form->elements['facebook_app_secret']->name;?>]" value="<?=$form->model->attributes['facebook_app_secret'];?>" class="m-wrap span12">
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6 ">
            <div class="control-group <?=!empty($form->model->errors['facebook_canvas_app_url']) ? 'error' : '';?>">
                <label class="control-label" for="<?=$form->elements['facebook_canvas_app_url']->id;?>"><?=$form->elements['facebook_canvas_app_url']->label;?></label>
                <div class="controls">
                    <input type="text" id="<?=$form->elements['facebook_canvas_app_url']->id;?>" name="projects[<?=$form->elements['facebook_canvas_app_url']->name;?>]" value="<?=$form->model->attributes['facebook_canvas_app_url'];?>" class="m-wrap span12">
                </div>
            </div>
        </div>
    </div>
    <div class="control-group <?=!empty($form->model->errors['custom_styles']) ? 'error' : '';?>">
        <label class="control-label "><?=$form->elements['custom_styles']->label;?></label>
        <div class="controls">
            <textarea class="large m-wrap" rows="10" name="projects[<?=$form->elements['custom_styles']->name;?>]"><?=$form->model->attributes['custom_styles'];?></textarea>
        </div>
    </div>
</fieldset>
    <div class="form-actions">
        <button type="submit" name="<?=$form->buttons['save']->name;?>" class="btn blue"><i class="icon-ok"></i> Save</button>
        <button type="button" class="btn">Cancel</button>
    </div>
<?php
    echo CHtml::endForm();
?>
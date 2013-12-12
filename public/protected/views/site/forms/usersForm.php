<?php
    echo CHtml::beginForm();
?>
<fieldset>
    <legend>Edit User</legend>
    <div class="row-fluid">
        <div class="span6 ">
            <div class="control-group <?=!empty($form->model->errors['display_name']) ? 'error' : '';?>">
                <label class="control-label" for="<?=$form->elements['display_name']->id;?>"><?=$form->elements['display_name']->label;?></label>
                <div class="controls">
                    <input <?=$do=='view' ? 'readonly' : ''; ?> type="text" id="<?=$form->elements['display_name']->id;?>" name="user[<?=$form->elements['display_name']->name;?>]" value="<?=$form->model->attributes['display_name'];?>" class="m-wrap span12">
                </div>
            </div>
        </div>
    </div>
    <div class="row-fluid">
        <div class="span6 ">
            <div class="control-group <?=!empty($form->model->errors['email']) ? 'error' : '';?>">
                <label class="control-label" for="<?=$form->elements['email']->id;?>"><?=$form->elements['email']->label;?></label>
                <div class="controls">
                    <input <?=$do=='view' ? 'readonly' : ''; ?> type="text" id="<?=$form->elements['email']->id;?>" name="user[<?=$form->elements['email']->name;?>]" value="<?=$form->model->attributes['email'];?>" class="m-wrap span12">
                </div>
            </div>
        </div>
    </div>
        <div class="row-fluid" style="display: <?=!empty($edit) ? 'none' : 'block'; ?>">
            <div class="span6 ">
                <div class="control-group <?=!empty($form->model->errors['password']) ? 'error' : '';?>">
                    <label class="control-label" for="<?=$form->elements['password']->id;?>"><?=$form->elements['password']->label;?></label>
                    <div class="controls">
                        <input <?=$do=='view' ? 'readonly' : ''; ?> type="text" id="<?=$form->elements['password']->id;?>" name="user[<?=$form->elements['password']->name;?>]" value="<?=$form->model->attributes['password'];?>" class="m-wrap span12">
                    </div>
                </div>
            </div>
        </div>
    <div class="row-fluid">
        <div class="span6 ">
            <div class="control-group <?=!empty($form->model->errors['role_id']) ? 'error' : '';?>">
                <label class="control-label"><?=$form->elements['role_id']->label;?></label>
                <div class="controls">
                    <select class="m-wrap span12" name="user[<?=$form->elements['role_id']->name;?>]">
                        <option <?=$do=='view' ? 'disabled' : ''; ?> value="">Choose User Role</option>
                        <? foreach ($form->elements['role_id']->items as $k=>$item) : ?>
                            <option <?=$do=='view' ? 'disabled' : ''; ?> <?=$form->model->attributes['role_id'] == $k ? 'selected' : '';?> value="<?=$k;?>"><?=$item;?></option>
                        <? endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
</fieldset>
    <div class="form-actions">
        <? if ($do != 'view') : ?><button type="submit" name="<?=$form->buttons['save']->name;?>" class="btn blue"><i class="icon-ok"></i> Save</button><? endif; ?>
        <a href="/users"><button type="button" class="btn">Cancel</button></a>
    </div>
<?php
    echo CHtml::endForm();
?>
<?php
echo CHtml::beginForm('', 'post', array('enctype'=>'multipart/form-data'));
?>
    <fieldset>
        <legend>View Project</legend>
        <div class="row-fluid">
            <div class="span6 ">
                <div class="control-group <?=!empty($form->model->errors['project_url']) ? 'error' : '';?>">
                    <label class="control-label" for="<?=$form->elements['project_url']->id;?>"><?=$form->elements['project_url']->label;?></label>
                    <div class="controls">
                        <input <?=$do=='view' ? 'readonly' : ''; ?> type="text" id="<?=$form->elements['project_url']->id;?>" name="projects[<?=$form->elements['project_url']->name;?>]" value="<?=$form->model->attributes['project_url'];?>" class="m-wrap span12">
                    </div>
                    <?php if (!empty($form->model->errors['project_url'])) : ?>
                        <ul class="error">
                            <?php foreach($form->model->errors['project_url'] as $error) : ?>
                                <li style="color: red"><?=$error?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6 ">
                <div class="control-group <?=!empty($form->model->errors['app_name']) ? 'error' : '';?>">
                    <label class="control-label" for="<?=$form->elements['app_name']->id;?>"><?=$form->elements['app_name']->label;?></label>
                    <div class="controls">
                        <input <?=$do=='view' ? 'readonly' : ''; ?> type="text" id="<?=$form->elements['app_name']->id;?>" name="projects[<?=$form->elements['app_name']->name;?>]" value="<?=$form->model->attributes['app_name'];?>" class="m-wrap span12">
                    </div>
                    <?php if (!empty($form->model->errors['app_name'])) : ?>
                        <ul class="error">
                            <?php foreach($form->model->errors['app_name'] as $error) : ?>
                                <li style="color: red"><?=$error?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6 ">
                <div class="control-group <?=!empty($form->model->errors['prefix']) ? 'error' : '';?>">
                    <label class="control-label" for="<?=$form->elements['prefix']->id;?>"><?=$form->elements['prefix']->label;?></label>
                    <div class="controls">
                        <input <?=$do=='view' ? 'readonly' : ''; ?> type="text" id="<?=$form->elements['prefix']->id;?>" name="projects[<?=$form->elements['prefix']->name;?>]" value="<?=$form->model->attributes['prefix'];?>" class="m-wrap span12">
                    </div>
                </div>
                <?php if (!empty($form->model->errors['prefix'])) : ?>
                    <ul class="error">
                        <?php foreach($form->model->errors['prefix'] as $error) : ?>
                            <li style="color: red"><?=$error?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6 ">
                <div class="control-group <?=!empty($form->model->errors['favicon']) ? 'error' : '';?>">
                    <label class="control-label" for="<?=$form->elements['favicon']->id;?>"><?=$form->elements['favicon']->label;?></label>
                    <div class="controls">
                        <? if ($do != 'view') : ?>
                            <input type="file" id="<?=$form->elements['favicon']->id;?>" name="projects[<?=$form->elements['favicon']->name;?>]" class="m-wrap span12">
                        <? else : ?>
                            <? if (!empty($form->model->attributes['favicon'])) : ?>
				<img src="<?=$form->model->attributes['favicon'];?>" />
			    <? else : ?>
				None
			    <? endif; ?>				
                        <? endif; ?>
                    </div>
                </div>
                <?php if (!empty($form->model->errors['favicon'])) : ?>
                    <ul class="error">
                        <?php foreach($form->model->errors['favicon'] as $error) : ?>
                            <li style="color: red"><?=$error?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6 ">
                <div class="control-group <?=!empty($form->model->errors['app_club']) ? 'error' : '';?>">
                    <label class="control-label"><?=$form->elements['app_club']->label;?></label>
                    <div class="controls">
                        <select class="m-wrap span12" name="projects[<?=$form->elements['app_club']->name;?>]">
                            <option <?=$do=='view' ? 'disabled' : ''; ?> value="">Choose Home Club</option>
                            <? foreach ($form->elements['app_club']->items as $k=>$item) : ?>
                                <option <?=$do=='view' ? 'disabled' : ''; ?> <?=$form->model->attributes['app_club'] == $k ? 'selected' : '';?> value="<?=$k;?>"><?=$item;?></option>
                            <? endforeach; ?>
                        </select>
                    </div>
                </div>
                <?php if (!empty($form->model->errors['app_club'])) : ?>
                    <ul class="error">
                        <?php foreach($form->model->errors['app_club'] as $error) : ?>
                            <li style="color: red"><?=$error?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6 ">
                <div class="control-group <?=!empty($form->model->errors['facebook_app_id']) ? 'error' : '';?>">
                    <label class="control-label" for="<?=$form->elements['facebook_app_id']->id;?>"><?=$form->elements['facebook_app_id']->label;?></label>
                    <div class="controls">
                        <input <?=$do=='view' ? 'readonly' : ''; ?> type="text" id="<?=$form->elements['facebook_app_id']->id;?>" name="projects[<?=$form->elements['facebook_app_id']->name;?>]" value="<?=$form->model->attributes['facebook_app_id'];?>" class="m-wrap span12">
                    </div>
                </div>
                <?php if (!empty($form->model->errors['facebook_app_id'])) : ?>
                    <ul class="error">
                        <?php foreach($form->model->errors['facebook_app_id'] as $error) : ?>
                            <li style="color: red"><?=$error?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6 ">
                <div class="control-group <?=!empty($form->model->errors['facebook_app_secret']) ? 'error' : '';?>">
                    <label class="control-label" for="<?=$form->elements['facebook_app_secret']->id;?>"><?=$form->elements['facebook_app_secret']->label;?></label>
                    <div class="controls">
                        <input <?=$do=='view' ? 'readonly' : ''; ?> type="text" id="<?=$form->elements['facebook_app_secret']->id;?>" name="projects[<?=$form->elements['facebook_app_secret']->name;?>]" value="<?=$form->model->attributes['facebook_app_secret'];?>" class="m-wrap span12">
                    </div>
                </div>
                <?php if (!empty($form->model->errors['facebook_app_secret'])) : ?>
                    <ul class="error">
                        <?php foreach($form->model->errors['facebook_app_secret'] as $error) : ?>
                            <li style="color: red"><?=$error?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6 ">
                <div class="control-group <?=!empty($form->model->errors['facebook_canvas_app_url']) ? 'error' : '';?>">
                    <label class="control-label" for="<?=$form->elements['facebook_canvas_app_url']->id;?>"><?=$form->elements['facebook_canvas_app_url']->label;?></label>
                    <div class="controls">
                        <input <?=$do=='view' ? 'readonly' : ''; ?> type="text" id="<?=$form->elements['facebook_canvas_app_url']->id;?>" name="projects[<?=$form->elements['facebook_canvas_app_url']->name;?>]" value="<?=$form->model->attributes['facebook_canvas_app_url'];?>" class="m-wrap span12">
                    </div>
                </div>
                <?php if (!empty($form->model->errors['facebook_canvas_app_url'])) : ?>
                    <ul class="error">
                        <?php foreach($form->model->errors['facebook_canvas_app_url'] as $error) : ?>
                            <li style="color: red"><?=$error?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
        <div class="control-group <?=!empty($form->model->errors['custom_styles']) ? 'error' : '';?>">
            <label class="control-label "><?=$form->elements['custom_styles']->label;?></label>
            <div class="controls">
                <textarea <?=$do=='view' ? 'readonly' : ''; ?> class="large m-wrap" rows="10" name="projects[<?=$form->elements['custom_styles']->name;?>]"><?=$form->model->attributes['custom_styles'];?></textarea>
            </div>
        </div>
        <?php if (!empty($form->model->errors['custom_styles'])) : ?>
            <ul class="error">
                <?php foreach($form->model->errors['custom_styles'] as $error) : ?>
                    <li style="color: red"><?=$error?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </fieldset>
    <div class="form-actions">
        <? if ($do != 'view') : ?><button type="submit" name="<?=$form->buttons['save']->name;?>" class="btn blue"><i class="icon-ok"></i> Save</button><? endif; ?>
        <a href="/projects"><button type="button" class="btn">Cancel</button></a>
    </div>
<?php
echo CHtml::endForm();
?>

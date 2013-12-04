<?php


class ProjectsForm extends CFormModel
{
	public $project_url;
	public $custom_styles;
	public $prefix;
	public $app_club;
	public $created;
    public $facebook_app_id;
    public $facebook_app_secret;
    public $facebook_canvas_app_url;

	/**
	 * Declares the validation rules.
	 */
	public function rules()
	{
		return array(
			array('project_url, prefix, app_club, facebook_app_id, facebook_app_secret', 'required'),
            array('prefix, project_url', 'length', 'min'=>3),
		);
	}

	/**
	 * Declares customized attribute labels.
	 * If not declared here, an attribute would have a label that is
	 * the same as its name with the first letter in upper case.
	 */
	public function attributeLabels()
	{
		return array(
			'project_url'               => 'URL of a new site',
            'app_club'                  => 'Site home club',
            'prefix'                    => 'Database prefix',
            'facebook_app_id'           => 'Facebook application ID',
            'facebook_app_secret'       => 'Facebook application secret key',
            'facebook_canvas_app_url'   => 'Facebook canvas application URL',
            'custom_styles'             => 'Custom Styles',
		);
	}

    public function getElements()
    {
        return array(
            'elements'=>array(
                'project_url'=>array(
                    'type'=>'text',
                    'id'=>'project_url',
                    'maxlength'=>32,
                    'minlength'=>10,
                ),
                'prefix'=>array(
                    'type'=>'text',
                    'id'=>'prefix',
                    'maxlength'=>32,
                    'minlength'=>3,
                ),
                'app_club'=>array(
                    'type'=>'dropdownlist',
                    'id'=>'app_club',
                    'items'=>Team::model()->getAllTeams(),
                    'prompt'=>'Choose Home Team'
                ),
                'facebook_app_id'=>array(
                    'type'=>'text',
                    'id'=>'facebook_app_id',
                    'maxlength'=>32,
                    'minlength'=>3,
                ),
                'facebook_app_secret'=>array(
                    'type'=>'text',
                    'id'=>'facebook_app_secret',
                    'maxlength'=>32,
                    'minlength'=>3,
                ),
                'facebook_canvas_app_url'=>array(
                    'type'=>'text',
                    'id'=>'facebook_canvas_app_url',
                    'maxlength'=>32,
                    'minlength'=>3,
                ),
                'custom_styles'=>array(
                    'type'=>'textarea',
                    'id'=>'custom_styles',
                ),
            ),

            'buttons'=>array(
                'save'=>array(
                    'type'=>'submit',
                    'label'=>'Save',
                ),
                'cancel'=>array(
                    'type'=>'button',
                    'label'=>'Cancel',
                ),
            ),
        );
    }

}
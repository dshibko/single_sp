<?php

/**
 * This is the model class for table "projects".
 *
 * The followings are the available columns in table 'projects':
 * @property integer $id
 * @property string $project_url
 * @property string $custom_styles
 * @property string $prefix
 * @property integer $app_club
 * @property integer $created
 * @property integer $facebook_app_id
 * @property string $facebook_app_secret
 * @property string $facebook_canvas_app_url
 *
 * The followings are the available model relations:
 * @property Team $appClub
 */
class Projects extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'projects';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('project_url, prefix, app_club, app_name, facebook_app_id, facebook_app_secret, favicon', 'required'),
			array('app_club, created, facebook_app_id', 'numerical', 'integerOnly'=>true),
			array('project_url, facebook_app_secret, facebook_canvas_app_url', 'length', 'max'=>255),
			array('prefix', 'length', 'max'=>16),
            array('project_url','unique', 'message'=>'URL of a new site must be unique.'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, project_url, app_name, custom_styles, prefix, app_club, created, facebook_app_id, facebook_app_secret, facebook_canvas_app_url, favicon', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'appClub' => array(self::BELONGS_TO, 'Team', 'app_club'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'project_url' => 'Project Url',
            'app_name' => 'Application Name',
			'custom_styles' => 'Custom Styles',
			'prefix' => 'Prefix',
			'app_club' => 'App Club',
			'created' => 'Created',
			'facebook_app_id' => 'Facebook App',
			'facebook_app_secret' => 'Facebook App Secret',
			'facebook_canvas_app_url' => 'Facebook Canvas App Url',
            'favicon' => 'Favicon',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('project_url',$this->project_url,true);
        $criteria->compare('app_name',$this->app_name,true);
		$criteria->compare('custom_styles',$this->custom_styles,true);
		$criteria->compare('prefix',$this->prefix,true);
		$criteria->compare('app_club',$this->app_club);
		$criteria->compare('created',$this->created);
		$criteria->compare('facebook_app_id',$this->facebook_app_id);
		$criteria->compare('facebook_app_secret',$this->facebook_app_secret,true);
		$criteria->compare('facebook_canvas_app_url',$this->facebook_canvas_app_url,true);
        $criteria->compare('favicon',$this->favicon,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Projects the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}

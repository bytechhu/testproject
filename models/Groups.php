<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "groups".
 *
 * @property int $id
 * @property string $name
 * @property int $parent_id
 * @property int $is_deleted
 */
class Groups extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'parent_id', 'is_deleted'], 'required'],
            [['parent_id', 'is_deleted'], 'integer'],
            [['name'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'parent_id' => 'Parent ID',
            'is_deleted' => 'Is Deleted',
        ];
    }
	
	public function getGroups($onlyParents = 0) {
		
		if($onlyParents == 0) {
			$groups = Groups::find()->where(['is_deleted' => 0])->asArray()->all();
		}
		else if($onlyParents == 1) {
			$groups = Groups::find()->where(['and', 'is_deleted=0', 'parent_id>0'])->asArray()->all();
		}
		
		return $groups;
		
	}
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_statuses".
 *
 * @property int $id
 * @property string $name
 * @property string $slug
 *
 * @property Orders[] $orders
 */
class OrdersStatuses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_statuses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'slug'], 'required'],
            [['name', 'slug'], 'string', 'max' => 255],
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
            'slug' => 'Slug',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery|OrdersQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::class, ['order_status_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return OrdersStatuesesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new OrdersStatuesesQuery(get_called_class());
    }
}

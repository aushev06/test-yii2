<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[OrdersStatuses]].
 *
 * @see OrdersStatuses
 */
class OrdersStatuesesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return OrdersStatuses[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return OrdersStatuses|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}

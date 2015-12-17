<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Auto]].
 *
 * @see Auto
 */
class AutoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Auto[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Auto|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
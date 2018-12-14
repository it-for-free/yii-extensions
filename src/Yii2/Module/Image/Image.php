<?php

namespace ItForFree\YiiExtensions\Yii2\Module\Image;

/**
 * image module definition class
 */
class Image extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'frontend\modules\image\controllers';


    public $baseUploadPath = '@uploadPathAlias';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}

<?php

namespace ItForFree\YiiExtensions\Yii2\Widget\AmCharts;

use Yii;
use yii\web\AssetBundle;

/**
 * @author Sérgio Peixoto <matematico2002@hotmail.com>
 *
 * @link https://github.com/speixoto/yii2-amcharts
 * @link http://www.amcharts.com/
 */
class AmChartAsset extends AssetBundle
{
    public $language;
    public $sourcePath = '@bower/amcharts/dist/amcharts3';
    public $css = [];
    public $js = [
        'amcharts.js',

    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public function registerAssetFiles($view)
    {
        parent::registerAssetFiles($view);
    }

    /**
     * @param string $type serial, xy, radar, pie, gauge, funnel
     */
    public function addTypeJs($type)
    {
        if ($type == 'stock') {
            $path = Yii::$app->view->assetManager->publish('@bower/amcharts-stock/dist/amcharts/amstock.js');
            $this->js[] = 'serial.js';
            Yii::$app->view->registerJsFile($path[1], ['depends' => self::className()]);
        } else {
            $this->js[] = $type . '.js';
        }
    }

    public function addThemeJs($theme)
    {
        $this->js[] = 'themes/' . $theme . '.js';
    }

    public function addLanguageJs($language = null)
    {
        $language = $language ? substr($language, 0, 2) : substr(Yii::$app->language, 0, 2);
        if ($language != 'en') {
            $this->js[] = 'lang/' . $language . '.js';
        }
    }

    public function addExportJs()
    {
        $exportJsPaths = [
            'exporting/amexport.js',
            'exporting/canvg.js',
            'exporting/filesaver.js',
            'exporting/jspdf.js',
            'exporting/jspdf.plugin.addimage.js',
            'exporting/rgbcolor.js',
        ];
        foreach ($exportJsPaths as $path) {
            $this->js[] = $path;
        }
    }
}

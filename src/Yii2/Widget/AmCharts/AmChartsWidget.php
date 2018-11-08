<?php

namespace ItForFree\YiiExtensions\Yii2\Widget\AmChart;

namespace speixoto\amcharts;

use Yii;
use yii\web\View;
use yii\base\InvalidConfigException;
use yii\helpers\Html;

/**
 * AmChart Widget For Yii2
 *
 * @author Sérgio Peixoto <matematico2002@hotmail.com>
 *
 * @link https://github.com/speixoto/yii2-amcharts
 * @link http://www.amcharts.com/
 */
class AmChartsWidget extends \yii\base\Widget
{
    /**
     * @var array The HTML attributes for the div wrapper tag.
     */
    public $options = [];
    /**
     * @var string The width of the chart
     */
    public $width = '640px';
    /**
     * @var string The height of the chart
     */
    public $height = '400px';
    /**
     * @var string The language of the chart
     */
    public $language;
    /**
     * @var array the AmChart configuration array
     * @see http://docs.amcharts.com/3/javascriptcharts
     */
    public $chartConfiguration = [];

    protected $_chartId;

    public function init()
    {
        if (!isset($this->options['id'])) {
            $this->options['id'] = 'chart_' . $this->getId();
        }
        $this->chartId = $this->options['id'];
        parent::init();
    }

    public function run()
    {
        $this->makeChart();
        $this->options['style'] = "width: {$this->width}; height: {$this->height};";
        echo Html::tag('div', '', $this->options);
    }

    protected function makeChart()
    {
        if (!isset($this->chartConfiguration['language'])) {
            $this->chartConfiguration['language'] = $this->language ? $this->language : Yii::$app->language;
        }
        $assetBundle = AmChartAsset::register($this->getView());
        if (isset($this->chartConfiguration['type'])) {
            $assetBundle->addTypeJs($this->chartConfiguration['type']);
        }
        if (isset($this->chartConfiguration['theme'])) {
            $assetBundle->addThemeJs($this->chartConfiguration['theme']);
        }
        if (isset($this->chartConfiguration['amExport'])) {
            $assetBundle->addExportJs();
        }
        $assetBundle->addLanguageJs($this->chartConfiguration['language']);
        if (!isset($this->chartConfiguration['pathToImages'])) {
            $this->chartConfiguration['pathToImages'] = $assetBundle->baseUrl . '/images/';
        }
        $chartConfiguration = json_encode($this->chartConfiguration);
        $js = $this->chartId . " = AmCharts.makeChart('{$this->chartId}', {$chartConfiguration});";
        $this->getView()->registerJs($js, View::POS_READY);
    }

    protected function setChartId($value)
    {
        $this->_chartId = $value;
    }

    protected function getChartId()
    {
        return $this->_chartId;
    }
}

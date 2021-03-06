<?php

namespace app\widgets;

/*
 * Bootstrap Date Picker as a widget
 */

use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;
use app\assets\DatePickerAsset;

class DatePicker extends InputWidget {
    //use DatePickerTrait;

    /**
     * @var string the addon markup if you wish to display the input as a component. If you don't wish to render as a
     * component then set it to null or false.
     */
    public $addon = '<i class="glyphicon glyphicon-calendar"></i>';

    /**
     * @var string the template to render the input.
     */
    public $template = '{input}{addon}';

    /**
     * @var bool whether to render the input as an inline calendar
     */
    public $inline = false;

    /**
     * @var string the size of the input ('lg', 'md', 'sm', 'xs')
     */
    public $size;

    /**
     * @var array the options for the Bootstrap DatePicker plugin.
     * Please refer to the Bootstrap DatePicker plugin Web page for possible options.
     * @see http://bootstrap-datepicker.readthedocs.org/en/release/options.html
     */
    public $clientOptions = [];

    /**
     * @var array the event handlers for the underlying Bootstrap DatePicker plugin.
     * Please refer to the [DatePicker](http://bootstrap-datepicker.readthedocs.org/en/release/events.html) plugin
     * Web page for possible events.
     */
    public $clientEvents = [];

    /**
     * @var array HTML attributes to render on the container
     */
    public $containerOptions = [];

    /**
     * @inheritdoc
     */
    public function init() {
        parent::init();
        if ($this->inline) {
            $this->options['readonly'] = 'readonly';
            Html::addCssClass($this->options, 'text-center');
        }
        if ($this->size) {
            Html::addCssClass($this->options, 'input-' . $this->size);
            Html::addCssClass($this->containerOptions, 'input-group-' . $this->size);
        }
        Html::addCssClass($this->options, 'form-control');
        Html::addCssClass($this->containerOptions, 'input-group date');
        $this->registerClientScript();
    }

    /**
     * @inheritdoc
     */
    public function run() {
        $input = $this->hasModel() ?
                Html::activeTextInput($this->model, $this->attribute, $this->options) :
                Html::textInput($this->name, $this->value, $this->options);
        if ($this->inline) {
            $input .= '<div></div>';
        }
        if ($this->addon && !$this->inline) {
            $addon = Html::tag('span', $this->addon, ['class' => 'input-group-addon']);
            $input = strtr($this->template, ['{input}' => $input, '{addon}' => $addon]);
            $input = Html::tag('div', $input, $this->containerOptions);
        }
        if ($this->inline) {
            $input = strtr($this->template, ['{input}' => $input, '{addon}' => '']);
        }
        echo $input;
    }

    /**
     * Registers required script for the plugin to work as DatePicker
     */
    public function registerClientScript() {
        $js = [];
        $view = $this->getView();
        //register asset
        DatePickerAsset::register($view);

        $id = $this->options['id'];
        $selector = ";jQuery('#$id')";
        if ($this->addon || $this->inline) {
            $selector .= ".parent()";
        }
        $options = !empty($this->clientOptions) ? Json::encode($this->clientOptions) : '';
        if ($this->inline) {
            $this->clientEvents['changeDate'] = "function (e){ jQuery('#$id').val(e.format());}";
        }
        $js[] = "$selector.datepicker($options);";
        if (!empty($this->clientEvents)) {
            foreach ($this->clientEvents as $event => $handler) {
                $js[] = "$selector.on('$event', $handler);";
            }
        }
        $view->registerJs(implode("\n", $js));
    }

}

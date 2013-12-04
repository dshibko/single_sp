<?php

Yii::import('zii.widgets.CMenu');

class Menu extends CMenu {

    public $items = array();

    public function run() {
        $this->render('menu',array('items' => $this->items));
    }

    public function init()
    {
        $route = $this->getController()->getAction()->id;
        foreach ($this->items as &$item) {
            $item['active'] = $this->isItemActive($item, $route);
        }
    }

    protected function isItemActive($item,$route)
    {
        if(isset($item['url']) && is_array($item['url']) && !strcasecmp(trim($item['url'][0],'/'),$route))
        {
            unset($item['url']['#']);
            if(count($item['url'])>1)
            {
                foreach(array_splice($item['url'],1) as $name=>$value)
                {
                    if(!isset($_GET[$name]) || $_GET[$name]!=$value)
                        return false;
                }
            }
            return true;
        }
        return false;
    }
} 
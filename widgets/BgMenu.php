<?php
/**
 * Created by PhpStorm.
 * User: suarez
 * Date: 2017/8/1
 * Time: 11:49
 */

namespace backend\widgets;

use Yii;
use yii\bootstrap\Widget;
use yii\bootstrap\Nav;
use yii\helpers\Html;

class BgMenu extends Widget
{
    public $isSubMenu = false;
    public $mainMenu;
    public $subMenu;

    public function init()
    {
        parent::init();

        if ($this->isSubMenu) {
            echo Nav::widget([
                'options' => ['class' => 'nav nav-pills nav-stacked sidebar'],
                'items' => $this->subMenuList()
            ]);
        } else {
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $this->menuList(),
            ]);
        }
    }

    /**
     * 主菜单
     *
     * @return array
     */
    private function menuList()
    {
        $menu = Yii::$app->params['menu'];
        $pathInfo = Yii::$app->request->pathInfo;
        $menuItems = [];
        $menuItems[] = ['label' => 'Home', 'url' => ['/site/index']];

        foreach ($menu as $item) {
            $menuItem = [
                'label' => $item['label'],
                'url' => [$item['url']]
            ];
            foreach ($item['subMenu'] as $subMenu) {
                if (in_array($pathInfo, $subMenu['active'])) {
                    $menuItem['active'] = true;
                }
            }
            $menuItems[] = $menuItem;
        }

        $menuItems[] =  '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                '退出 (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';

        return $menuItems;
    }


    /**
     * 子菜单
     *
     * @return array
     */
    public function subMenuList()
    {
        $menu = Yii::$app->params['menu'];
        $pathInfo = Yii::$app->request->pathInfo;
        $returnMenu = [];
        $isBreak = false;

        foreach ($menu as $data) {
            if ($data['url'] == '/' . $pathInfo) {
                $isBreak = true;
            }
            $returnMenu = [];
            foreach ($data['subMenu'] as $item) {
                $r = [
                    'label' => $item['label'],
                    'url' => $item['url'],
                    'active' => in_array($pathInfo, $item['active'])
                ];
                $returnMenu[] = $r;
                if ($r['active']) {
                    $isBreak = true;
                }
            }
            if ($isBreak) {
                break;
            } else {
                $returnMenu = [];
            }
        }

        return $returnMenu;
    }
}
<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\NavBar;
use yii\bootstrap\Nav;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;

$UserMenu = array(
    'assignment' => 'Assignments',
    'role' => 'Roles',
    'permission' => 'Permissions',
    'route' => 'Routes',
    'rule' => 'Rules',
    'menu' => 'Menus',
);
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?=Yii::$app->user->identity->firstname.' '.Yii::$app->user->identity->lastname?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        
        <div class="user-panel"></div>

        <!-- search form -->
        <!--form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form-->
        <!-- /.search form -->

        <?php
            $menuItems = [
                ['label' => 'Home', 'url' => ['/site/index']],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                    foreach ($UserMenu as $key => $value) {
                        $submenu[] = [
                            'label' => $value, 
                            'url' => Yii::$app->request->BaseUrl.'/admin/'.$key,
                            'template' => '<a href="{url}"><i class="fa fa-circle-o"></i>{label}</a>'
                        ];
                    }                
                    
                    $menuItems[] = [
                        'label' => 'Users',
                        'url' => '#',
                        'template' => '<a href="{url}"><i class="fa fa-user"></i><span>{label}</span><i class="fa fa-angle-left pull-right"></i></a>',
                        'items' => $submenu,
                    ];
            }
            
            echo Menu::widget([
                'options' => ['class' => 'sidebar-menu'],
                'submenuTemplate' => "\n<ul class='treeview-menu'>\n{items}\n</ul>\n",
                'encodeLabels' => true, //allows you to use html in labels
                'activateParents' => true,
                'items' => $menuItems]);
        ?>
    </section>

</aside>

<?php
$controller = $this->uri->segment(1);
$action = $this->uri->segment(2);
$menus = $this->category->getCategoryList();
$category_id = $this->uri->segment(3);

?>


<div class="aw-side ps-container" id="aw-side">
    <div class="mod">
        <ul class="mod-bar">
            <li>
                <span <?php if ($controller == 'homepage') echo 'class="current"'; else echo 'class=""'; ?>>
                    <i class="fa fa-2x <?php if ($controller == 'homepage') echo 'fa-angle-down'; else echo 'fa-angle-right'; ?>"></i>
                    <a href="<?= anchorurl('homepage/index') ?>">栏目管理</a>
                </span>
                <ul <?php if ($controller == 'homepage') echo 'class="secondmenu submenu"'; else echo 'class="secondmenu"'; ?>>
                    <li>
                        <span <?php if ($controller == 'homepage' && $action == 'index') echo 'class="current"'; else echo 'class=""'; ?>>
                            <a href="<?= anchorurl('homepage/index') ?>">栏目列表</a>
                        </span>
                    </li>
                    <li>
                        <span <?php if ($controller == 'homepage' && $action == 'add') echo 'class="current"'; else echo 'class=""'; ?>>
                            <a href="<?= anchorurl('homepage/add') ?>">添加栏目</a>
                        </span>
                    </li>
                </ul>
            </li>


            <?php foreach ($menus as $fistcategory): ?>
                <?php
                     $is_pull = false;
                     if($category_id == $fistcategory->id){
                         $is_pull = true;
                     }
                     foreach ($fistcategory->children as $second){
                            if($second->id ==$category_id )  $is_pull = true;;
                     }

                 ?>
            <li>
                <span <?php if ($controller == 'articles' && $is_pull) echo 'class="current"'; else echo 'class=""'; ?>>
                    <?php if (count($fistcategory->children)): ?>
                    <i class="fa fa-2x <?php if ($controller == 'homepage') echo 'fa-angle-down'; else echo 'fa-angle-right'; ?>"></i>
                    <?php endif; ?>
                    <?php if ($fistcategory->template == 3): ?>
                        <a href="<?= anchorurl('articles/contentadd/' . $fistcategory->id) ?>"><?= $fistcategory->name ?></a>
                    <?php else: ?>
                        <a href="<?= anchorurl('articles/index/' . $fistcategory->id) ?>"><?= $fistcategory->name ?></a>
                    <?php endif; ?>
                </span>
                <?php if (count($fistcategory->children)): ?>
                <ul <?php if ($controller == 'articles'  && $is_pull) echo 'class="secondmenu submenu"'; else echo 'class="secondmenu"'; ?>>
                    <?php foreach ($fistcategory->children as $secondCategory): ?>
                    <li>
                         <span <?php if ($controller == 'articles' && $secondCategory->id ==$category_id ) echo 'class="current"'; else echo 'class=""'; ?>>
                              <?php if ($secondCategory->template == 3): ?>
                                <a href="<?= anchorurl('articles/contentadd/' . $secondCategory->id) ?>"><?= $secondCategory->name ?></a>
                              <?php else: ?>
                                <a href="<?= anchorurl('articles/index/' . $secondCategory->id) ?>"><?= $secondCategory->name ?></a>
                              <?php endif; ?>
                         </span>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <?php endif; ?>
            </li>
            <?php endforeach; ?>

            <li>
                <span <?php if ($controller == 'tickets') echo 'class="current"'; else echo 'class=""'; ?>>
                    <i class="fa fa-2x <?php if ($controller == 'tickets') echo 'fa-angle-down'; else echo 'fa-angle-right'; ?>"></i>
                    <a href="<?= anchorurl('tickets/index') ?>">购票管理</a>
                </span>
                <ul <?php if ($controller == 'tickets') echo 'class="secondmenu submenu"'; else echo 'class="secondmenu"'; ?>>
                    <li>
                        <span <?php if ($controller == 'tickets' && $action == 'index') echo 'class="current"'; else echo 'class=""'; ?>>
                            <a href="<?= anchorurl('tickets/index') ?>">在线购票</a>
                        </span>
                    </li>
                    <li>
                        <span <?php if ($controller == 'tickets' && $action == 'add') echo 'class="current"'; else echo 'class=""'; ?>>
                            <a href="<?= anchorurl('tickets/add') ?>">添加购票信息</a>
                        </span>
                    </li>
                </ul>
            </li>



            <li>
                <span <?php if ($controller == 'userbasicsetting' || $controller == 'adminlink') echo 'class="current"'; else echo 'class=""'; ?>>
                    <i class="fa fa-2x <?php if ($controller == 'userbasicsetting' || $controller == 'adminlink') echo 'fa-angle-down'; else echo 'fa-angle-right'; ?>"></i>
                    <a href="<?= anchorurl('userbasicsetting/dbmanage') ?>">系统维护</a>
                </span>
                <ul <?php if ($controller == 'userbasicsetting' || $controller == 'adminlink') echo 'class="secondmenu submenu"'; else echo 'class="secondmenu"'; ?>>
                    <li>
                        <span  <?php if ($controller == 'userbasicsetting' && $action == 'dbmanage') echo 'class="current"'; else echo 'class=""'; ?>>
                            <a href="<?= anchorurl('userbasicsetting/dbmanage') ?>">数据备份</a>
                        </span>
                    </li>
<!--                    <li>-->
<!--                        <span --><?php //if ($controller == 'adminlink' && $action == '') echo 'class="current"'; else echo 'class=""'; ?><!-->
<!--                            <a href="--><?//= anchorurl('adminlink') ?><!--">后台登陆地址</a>-->
<!--                        </span>-->
<!--                    </li>-->
                </ul>
            </li>
        </ul>
    </div>
</div>

<?php 
    $controller = $data['activeController'];
    $method     = $data['activemethod'];
    ?>
<aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <a href=""><img style="max-width: 100px;" src=""></a>
                        </div>
                        <div class="pull-left info">


                        </div>
                    </div>
                    
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                      
                         
                        <li class="treeview <?php echo ($controller == 'article') ? "active" : ""; ?>">
                            <a href="">

                                <i class="fa fa-align-justify"></i>
                                <span>Article</span> 
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li class="<?php echo ($controller == 'article' && $method == 'addArticle') ? "active" : ""; ?>"><a href="<?php echo BASE_URL;?>article/addArticle"><i class="fa fa-circle-o"></i>Add Article</a></li>
                                <li class="<?php echo ($controller == 'article' && $method == 'manageArticles') ? "active" : ""; ?>"><a href="<?php echo BASE_URL;?>article/manageArticles"><i class="fa fa-circle-o"></i>Manage Article</a></li>
                                
                               
                            </ul>

                        </li>                                           
                       
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
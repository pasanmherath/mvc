<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <form action="" method="get">
                        <div class="row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category">
                                        <option value="">All</option>
                                        <option value="1" <?php echo ($data['category']=='1'?"selected":"")?> >Category 1</option>
                                        <option value="2" <?php echo ($data['category']=='2'?"selected":"")?> >Category 2</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>User</label>
                                    <select class="form-control" name="user">
                                        <option value="">All</option>
                                        <?php if ($data['users']) {
                                            foreach ($data['users'] as $user) {
                                                ?>
                                                <option value="<?php echo $user->id; ?>" <?php echo ($data['user']==$user->id?"selected":"")?> ><?php echo $user->full_name; ?></option>
                                            <?php }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option value="">All</option>
                                        <option value="1" <?php echo ($data['status']==1?"selected":"")?> >UnPublished</option>
                                        <option value="2" <?php echo ($data['status']==2?"selected":"")?> >Published</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-1">
                                <button type="submit" class="btn btn-primary" name="submit_btn">Search</button>
                            </div>

                            <div class="col-md-1">
                                <a href="../article/manageArticles" class="btn btn-warning">Reset</a>
                            </div>

                        </div>
                    </form>
                </div>
                <!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>Title</th>
                                <th>User</th>
                                <th>Category</th>
                                <th>Date</th>
                                <th>Status</th>                                
                                <th>Action</th>
                            </tr>
<?php if ($data['articles']) {
    foreach ($data['articles'] as $val) {
        ?>
                                    <tr>
                                        <td><?php echo $val->title; ?></td>
                                        <td><?php echo $val->full_name; ?></td>
                                        <td><?php
                                            if ($val->category == 1) {
                                                echo 'Category 1';
                                            } else {
                                                echo 'Category 2';
                                            }
                                            ?></td>
                                        <td><?php echo $val->created_date; ?></td>
                                        <td>
        <?php if ($val->status == 1) { ?>
                                                <span class="label label-warning">UnPublish</span>
        <?php } else { ?>
                                                <span class="label label-success">Published</span>
        <?php } ?>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info">Action</button>
                                                <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                                    <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="#">Action</a></li>
                                                    <li><a href="../article/editArticle/<?php echo $val->id;?>">Edit</a></li>
                                                    <li><a href="../article/deleteArticle/<?php echo $val->id;?>">Delete</a></li>
                                                    <li><a href="#">Publish</a></li>
                                                    <li><a href="#">UnPublish</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
    <?php }
}
?>


                        </tbody></table>
                </div>

<?php echo $data["pageLinks"]; ?>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
    </div>
</section>
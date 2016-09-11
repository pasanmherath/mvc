<section class="content">
    <div class="row">
        <div class="col-md-8">
            <!-- general form elements -->
            <div class="box box-primary">
               
                <!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="" enctype="multipart/form-data">
                    <?php if($this->message){ ?>
                     <div class="alert alert-danger alert-block fade in alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php 
                        $messages = json_decode($this->message);
                        if(count($messages) > 0)
                        {
                            foreach($messages as $message)
                            {
                                echo $message.'.<br/>';
                            }
                        }
                        ?>
                    </div>   
                    <?php }?>
                    <div class="box-body">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="<?php echo (isset($data['article'])?$data['article']->title:"");?>">
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category">
                                <option value="1" <?php echo (isset($data['article']) && $data['article']->category=="1" ? "selected" : "");?> >Category 1</option>
                                <option value="2" <?php echo (isset($data['article']) && $data['article']->category=="2" ? "selected" : "");?> >Category 2</option>
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea id="editor1" name="description" rows="10" cols="80"><?php echo (isset($data['article'])?$data['article']->description:"");?></textarea>
                        </div>
                        <?php if(isset($data['article'])){?>
                            <div class="form-group">
                                <label>Current Image</label>
                                <img class="thumbnail" src="<?php echo ASSET_URL . $data['article']->image_path;?>">
                            </div>
                        <?php }?>
                        
                        <div class="form-group">
                            <label for="exampleInputFile">Image</label>
                            <input type="file" id="image" name="image">
                            
                            <p class="help-block">Upload your article image.</p>
                        </div>
                        
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit_btn" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.box -->
            
        </div>
    </div>
</section>

<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>

<script>
    $(function () {
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('editor1');
    });
</script>
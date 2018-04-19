<?php  $url="http://127.0.0.1/back_office/uploads/" ?>
<html>
<head>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>



<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-fw fa-table"></i> Categories Management
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addArt"> <i class="fa fa-plus"></i> Add New Categories </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Categories List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url()."article/categories" ?>" method="POST" id="searchList">
                            <div class="input-group">
                              <input type="text" name="searchText" value="" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                              <div class="input-group-btn">
                                <button class="btn btn-sm btn-default searchList"><i class="fa fa-search"></i></button>
                              </div>
                            </div>
                        </form>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      
                  
                  <th><i class="material-icons" style="font-size:36px"></i></th>
                  <th>Category</th>
                  <th>Description</th>
                  <th>Img</th>
                  
                 

                  <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($category))
                    {
                        foreach($category as $cat)
                        {
                    ?>
                    <tr>
                    
                       <td><button style="font-size:24px"><i class="material-icons">folder_open</i></button> </td>
                      

                      </td>

                      <td><SMALL><?php echo  $cat->nom ; ?></SMALL></td>
                      <td><SMALL><?php echo  word_limiter($cat->description,2).'..'; ?></SMALL></td>
                      <td>        
                        <img
                          class=""
                          src= "<?php echo $url.$cat->img;?> "
                          alt="<?php echo  $cat->img;?> "
                          title=" "
                          height="60px" 
                          width="60px" 
                      /></td>
                     

                      <td class="text-center">
                          <a class="btn btn-sm btn-info" href="<?php echo base_url(). 'editArt/'; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-sm btn-danger deleteUser" href="#" data-userid="<?php echo base_url().'delArt/'.$cat->id; ?>"   title="Delete"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <!--<?php echo $this->pagination->create_links(); ?>-->
                </div>
              </div><!-- /.box -->
            </div>
        </div>
    </section>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/common.js" charset="utf-8"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;            
            var value = link.substring(link.lastIndexOf('/') + 1);
            jQuery("#searchList").attr("action", baseURL + "userListing/" + value);
            jQuery("#searchList").submit();
        });
    });
</script>
</body>
</html>
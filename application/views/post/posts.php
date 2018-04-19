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
        <i class="fa fa-fw fa-table"></i> Artiles Management
        <small>Add, Edit, Delete</small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>addArt"> <i class="fa fa-plus"></i> Add New Article</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Articles List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>liste" method="POST" id="searchList">
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
                      
                  <th>Activer</th>
                  <th><i class="material-icons" style="font-size:36px"></i></th>
                  <th>Title</th>
                  <th>Post</th>
                  <th>Imgage</th>
                  <th>Media</th>
                  <!--<th>Id</th> 
                  <th>Category</th>
                   <th>User</th>
                   <th>Views</th>
                   <th>Date_updat</th>
                  <th>Metadesc</th>
                  <th>Metakey</th>
                   <th>Source</th>
                  <th>Slug</th>-->

                  <th class="text-center">Actions</th>
                    </tr>
                    <?php
                    if(!empty($articles))
                    {
                        foreach($articles as $art)
                        {
                    ?>
                    <tr>

                      <td> <a class="btn btn-primary" href="<?php echo base_url().'activer/'.$art->post_id; ?>"><?php  if($art->active == 1) { ?>
                           <i class="fa fa-eye" style="font-size:24px"></i>
                       <?php 
                    } else {?>
                    <i class="fa fa-eye" style="font-size:24px;color:red"></i> <?php  }?> 

                     
                
                       </a>
                       <td><a class="btn btn-primary" href="<?php echo base_url()."article/view_single_Article/".$art->post_id;?>"><i class="material-icons" >folder_open</i></a></td>
                      

                      </td>

                      <td><SMALL><?php echo  $art->post_title ; ?></SMALL></td>
                      <td><SMALL><?php echo  word_limiter($art->post,2).'..'; ?></SMALL></td>
                      <td>        
                        <img
                          class=""
                          src= "<?php echo $url.$art->img;?> "
                          alt="<?php echo  $art->img;?> "
                          title=" "
                          height="60px" 
                          width="60px" 
                      /></td>
                      <td><?php echo $art->media ;?></img></td>
                      <!--<td><SMALL><?php echo  $art->date_added ; ?></SMALL></td>-->
                      <!--<td><?php echo  $art->post_id; ?></td>-->
                      <!--<td><?php echo  $art->category_id; ?></td>
                      <td><?php echo  $art->user_id ; ?></td>
                      <td><?php echo  $art->post_id; ?></td>
                      <td><?php echo  $art->views; ?></td>
                      <td><?php echo  $art->source;; ?></td>
                      <td><?php echo  $art->metakeywords ;?></td>
                      <td><?php echo  $art->date_updat; ?></td>
                      <td><?php echo  $art->metadescription; ?></td>-->

                      <td class="text-center">
                          <a class="btn btn-sm btn-info" href="<?php echo base_url(). 'editArt/'; ?>" title="Edit"><i class="fa fa-pencil"></i></a>
                          <a class="btn btn-sm btn-danger deleteUser" href="#" data-userid="<?php echo base_url().'delArt/'.$art->post_id; ?>"   title="Delete"><i class="fa fa-trash"></i></a>
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
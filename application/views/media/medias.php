



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
        <i class="fa fa-fw fa-table"></i> Bibliothéque
        <small> Add Delete </small>
      </h1>
    </section>
    <section class="content">
        <div class="row">
          <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>"> <i class="fa fa-plus"></i>All Media  </a>
                </div>
            </div>
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>"> <i class="fa fa-plus"></i>Audio  </a>
                </div>
            </div>
            <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>"> <i class="fa fa-plus"></i> Védios  </a>
                </div>
            </div>
             <div class="col-xs-12 text-right">
                <div class="form-group">
                    <a class="btn btn-primary" href="<?php echo base_url(); ?>"> <i class="fa fa-plus"></i>Pictures</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Comments List</h3>
                    <div class="box-tools">
                        <form action="<?php echo base_url() ?>" method="POST" id="searchList">
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
                      
                  <th class="text-center">Actions</th>
        
                   <th >user name</th>
                   <th class="text-center">user Image</th>
                  <th >Article</th>
                  <th >comments</th>
                    </tr>
                    <?php
                    if(!empty($comments))
                    {
                        foreach($comments as $com)
                        {
                    ?>
                    <tr>

                      <td >

                        <a class="btn btn-primary" href="<?php echo base_url()."Comment/commentaires_Activeted/".$com['comment_id'];?>"><?php  if($com['etat']==0) { ?>
                           <i class="fa fa-eye" style="font-size:24px"></i>
                       <?php 
                    } else {?>
                    <i class="fa fa-eye" style="font-size:24px;color:red"></i> <?php  }?> 
                       </a>
                    
                       <a class="btn btn-primary" href="<?php echo base_url();?>""><i class="material-icons" >folder_open</i></a>
                     
                          
                          <a class="btn btn-sm btn-danger  btn btn-primary" href="#" data-userid="<?php echo base_url()."Comment/delete_comment/".$com['comment_id']; ?>" title="Delete"><i class="fa fa-trash"></i></a>
                      
                      </td>
                      


                      <td ><?php echo $com['name'] ;?></td>  
                      <td class="text-center"> 
                        <img
                          class=""
                          src= "<?php echo $url.$com['image'];?> "
                          alt="<?php ;?> "
                          title=" "
                          height="60px" 
                          width="60px" 
                      /></td>

                      <td ><SMALL><?php echo  $com['post_title'] ; ?></SMALL></td>
                      <td><SMALL><?php echo  word_limiter($com['comment'],2).'..'; ?></SMALL></td>
                     

                      
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                    <?php echo $this->pagination->create_links(); ?>
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
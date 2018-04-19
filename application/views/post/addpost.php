
<html>
<head>   
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script src="//cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
<script type="text/javascript">
 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>   
function myFunction() {
    var onclick = document.getElementById("myCheck");
    var text = document.getElementById("text");
    if (checkBox.checked == true){
        text.style.display = "block";
    } else {
       text.style.display = "none";
    }
}

function showDiv(id) {
   document.getElementById(id).style.display = "block";
}
</script>
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script> 
<script type="text/javascript" > 

function afficherMasquer(id)
{
  if(document.getElementById(id).style.display == "none")
    document.getElementById(id).style.display = "block";
  else
    document.getElementById(id).style.display = "none";
}
</script>

</head>


<body>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Articles Management
        <small>Add / Edit Article</small>
        <a href="<?php echo base_url()."article/addCategorie" ;?>" >go</a>
      </h1>
    </section>
    
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-8">
              <!-- general form elements -->
                
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Article Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->


<!--<div id="welcomeDiv"  style="display:none;" class="answer_list" > WELCOME</div>-->

                   
                    <form role="form" id="addUser" action="<?php echo base_url()."article/createart/" ;?>" method="post" role="form" enctype="multipart/form-data">
                        <div class="box-body">
                             <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role">Category</label>
                                        <select class="form-control " id="" name="category">
                                            <?php var_dump('Category');?>
                                            <option value="0">Select Categories </option>
                                            <?php
                                            if(!empty($Category))
                                            {
                                                foreach ($Category as $cat)
                                                {
                                                    ?>
                                                    <!--<input type="checkbox"    value="<?php echo $cat->id ?>" /><H6> <?php echo $cat->nom; ?></H6>-->
                                                    <option value="<?php echo $cat->id ?>" > <?php echo $cat->nom; ?></option>
        
   
                                                    <?php 
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    </div>
                                        
                                </div> 
 
                            <div class="row">

                                     <div class="col-md-6">
                                    <div class="form-group">
            <input type="button" name="answer" value="New category" onclick="showDiv(2) " class="btn btn-primary"  href="<?php echo base_url() ?>"/>

                                   
                                    </div>
                                </div>
                            </div>

 

<!--  **************************************************ADD NEW CATEGORY **************************************************** --> 
  

                            <div class="row"  id="2"  style="display:none"  >
                                 <div class="col-md-6">
                                    <div class="form-group">
                                    <label for="role"> New Category</label>
                                                                    
                                     </div>
                                     </div> 

                                
                                    <div class="row"  >
                                        <!-- left column -->
                                        <div class="col-md-8">
                                          <!-- general form elements -->
                                            
                                             <div class="box box-primary" >
                                                <div class="box-header" >
                                                    <h3 class="box-title">Enter Category Details</h3>
                                                </div>
                                                <!-- /.box-header -->
                                                <!-- form start -->
                                               <!--<?php echo form_open('article/addCategorie'); ?> -->
                                             <!--<?php $this->load->helper("form"); ?>-->

                                                
                                                <form role="form" id="" action="" method="post"  enctype="multipart/form-data">
                                                    <div id="Modal_Add">
                                                    <div class="box-body">
                                                        <div class="row">
                                                           
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for='nom'>Nom</label>
                                                                    <input type="text"   id="nom" value="" name="nom" maxlength="">
                                                                </div>
                                                            </div>
                                                             <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for='img'>Image</label>
                                                                    <input type="file" class="form-control " id="img" name="userfile" maxlength="200">
                                                                </div>
                                                            </div>
                                                </div>
                                                <div class="row">
                                                      
                                                        <div class="">
                                                            <label for='Description' >Description</label>
                                       

                                                            <textarea type="text" class="" placeholder="Enter Article description"  name="description"  id="desc" style="border: 1px solid gray; "></textarea></p>
                                                        <script type='text/javascript'> 
            
                                                            CKEDITOR.replace('desc');</script>
                                                            <script src="//cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>


                                                        </div>
                                                        
                                              
                                                </div>
                                            </div>
                                            <!-- /.box-body -->
                        
                                            <div class="box-footer">
                                                <input id="btn_save" type="submit" class="btn btn-primary" value="Submit" />
                                                <input type="reset" class="btn btn-default" value="Reset" />
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <?php
                                        $this->load->helper('form');
                                        $error = $this->session->flashdata('error');
                                        if($error)
                                        {
                                    ?>
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <?php echo $this->session->flashdata('error'); ?>                    
                                    </div>
                                    <?php } ?>
                                    <?php  
                                        $success = $this->session->flashdata('success');
                                        if($success)
                                        {
                                    ?>
                                    <div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <?php echo $this->session->flashdata('success'); ?>
                                    </div>
                                    <?php } ?>
                    
                                     <div class="row">
                                            <div class="col-md-12">
                                                <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>    
                            </div>

                            <div class="row">
                              <div class="col-md-6">
                                    <div class="form-group">

                                        <label for="role">Redecteur</label>
                                        <select class="form-control " id="role" name="redecteur">
                                            <option value="0">Select Redecteur</option>
                                            <?php
                                            if(!empty($redecteurs))
                                            {
                                                foreach ($redecteurs as $redec)
                                                {
                                                    ?>
                                                    <option value="<?php echo $redec->name ?>" ><?php echo $redec->name ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div> 
                           

                                </div> 
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">

                                        <label for="box-title">Title</label>
                                        <input type="text" class="form-control " id="" value="" name="title" maxlength="128">
                                </div>
                            </div>
                        </div>

                         <div  class="row"> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                   
                                        <label for="">Text</label>
                                       
                                            <textarea class="" placeholder="Enter Article text"  name="text"  id="description" 
                                            style="border: 1px solid gray; "></textarea></p>
                                                        <script type='text/javascript'> 
            
                                                            CKEDITOR.replace('description');</script>
                                                            <script src="//cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
                                    </div>
                                                             
                            </div>
                        </div> 
                               
                              


                                
                           
    


<!-- *******************************************************************add SEO DETAILS  *************************************-->


                            <div class="row" >
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="button"  name="answer" value="SEO Details"  class="btn btn-primary"onclick="showDiv(1)" />

                                   
                                    </div>
                                        
                                </div>   

                            </div>


<!-- *******************************************************************add SEO DETAILS  *************************************-->

                                    

                            <div class="content"  id="1"  style="display:none" >
                                 <div class="col-md-8">
                                          <!-- general form elements -->
                                            
                                             <div class="box box-primary" >
                                                <div class="box-header" >
                                                    <h3 class="box-title">Enter SEO Details</h3>
                                                </div>
                                            </div>
                                        </div>
                        <div class="box-body">

                           <div  class="row"> 
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="slug">SLUG</label>
                                        <input type="text" class="form-control required " id="slug" value="" name="slug" maxlength="128">
                                    </div>
                                </div>
                             <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="metaDescription">MetaDescription</label>
                                        <input type="text" class="form-control required " id="email" value="" name="meta" maxlength="128">
                                    </div>
                                </div>    
                            </div>
						    <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">MetaKeyWords</label>
                                        <input type="text" class="form-control" id="MetaKeyWords" value="MetaKey" name="MetaKeyWords" maxlength="128">
                                    </div>
                                </div> 
                              


                                </div>
                      	
           
                          
                        </div>
                   
                    </div>

<!-- *******************************************************************add Media DETAILS  *************************************-->
                        <div class="row" >

                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="button"  name="answer" value="ADD Media" class="btn btn-primary" onclick="showDiv(3)" />

                                   
                                    </div>
                                        
                                </div>   

                                </div>



<div class="content" id="3" style="display:none;" >
                                <div  class="row">
                                      <div class="col-md-8">
                                          <!-- general form elements -->
                                            
                                             <div class="box box-primary" >
                                                <div class="box-header" >
                                                    <h3 class="box-title">Enter Media Details</h3>
                                                </div>
                                            </div>
                                        </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <label for="slug">MEDIA type : </label>

                                    <select class="form-control required" id="role" name="role">
                                            <option value="0">Select type media</option>
                                            <?php
                                            //var_dump($type);
                                            if(!empty($type))
                                            {
                                                foreach ($type as $ty)
                                                {
                                                    ?>
                                                    <option value="<?php echo $ty->id_type ?>" ><?php echo $ty->type ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>    
                                    </div>
                                </div> 
                                 </div>
                                <div  class="row" id="">

                                      <div class="col-md-6" id="1">
                                    <div class="form-group">
                                        <input type="radio"  onClick="afficherMasquer(2)" >
                                        
                                        <label for="slug">upload</label>
                                        
                                        <input type="file" class="form-control required " id="" value="" name="userfile" maxlength="128">
                                    
                                    </div>
                                </div> 
                                   <div class="col-md-6" id="2">
                                    <div class="form-group">
                                        <input type="radio" onclick="afficherMasquer(1)" checked="checked">
                                        <label for="slug">ADD url</label>
                                        
                                        <input type="text" class="form-control required " id="media" value="" name="media" maxlength="128">
                                    </div>
                                </div>
                               </div> 
                        

                        </div>
                        <!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>


                    <!--  fin form -->
                </div>
            </div>
            <div class="col-md-4">
                <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>    
    </section>
    


</div>


</div>
<script type="application/javascript">
$(document).ready(function() {
$('#btn_save').click(function() {

var nom = $('#nom').val();
var img = $('#img').val();
var description       = $('#desc').val();
 $.ajax({
   type : "POST",
   url  : "<?php echo site_url('Category/save')?>",
   dataType : "JSON",
   data : {img:img , nom:nom,img:img,description:description},
   success: function(data){
         $('[name="nom"]').val("");
         $('[name="img"]').val("");
         $('[name="description"]').val("");
         $('#Modal_Add').modal('hide');
                    //show_product();
                }
            });
            return false;
        });
 
 
 
    });
 

</script>


</body>
</html>







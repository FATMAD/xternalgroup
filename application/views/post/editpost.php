<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Articles Management
        <small>Add / Edit Article</small>
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
                   
                    <form role="form" id="addUser" action="<?php echo base_url() ?>addNewUser" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                              <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role">Redecteur</label>
                                        <select class="form-control required" id="role" name="role">
                                            <option value="0">Select Role</option>
                                            <?php
                                            if(!empty($roles))
                                            {
                                                foreach ($roles as $rl)
                                                {
                                                    ?>
                                                    <option value="<?php echo $rl->roleId ?>" <?php if($rl->roleId == set_value('role')) {echo "selected=selected";} ?>><?php echo $rl->role ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                         <input onclick="afficherMasquer(2)" type="button" class="btn btn-primary" value="New category" onclick="masquer_div('a_masquer');" />

                                   
                                    </div>
										
                                </div>  

                                </div> 
                                <div class="row">
                            	 <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role">Category</label>
                                        <select class="form-control required" id="role" name="role">
                                        	<?php var_dump('Category');?>
                                            <option value="0">Select Categories </option>
                                            <?php
                                            if(!empty($Category))
                                            {
                                                foreach ($Category as $cat)
                                                {
                                                    ?>
                                                    <option value="<?php echo $cat->id ?>" > <?php echo $cat->nom; ?></option>
        
   
                                                    <?php 
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
										
                                </div> 

                                	 <div class="col-md-6">
                                    <div class="form-group">
                                         <input onclick="afficherMasquer(2)" type="button" class="btn btn-primary" value="New category" onclick="masquer_div('a_masquer');" />

                                   
                                    </div>
										
                                </div> 

                            	</div>
                               
                            	



<!--  **************************************************ADD NEW CATEGORY ****************************************************  -->

							<section class="content" id="2">
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
							                    </div><!-- /.box-header -->
							                    <!-- form start -->
							                    <?php $this->load->helper("form"); ?>
							                    <form role="form" id="addUser" action="<?php echo base_url() ?>addNewUser" method="post" role="form">
							                        <div class="box-body">
							                            <div class="row">
							                               
							                                <div class="col-md-6">
							                                    <div class="form-group">
							                                        <label for="email">Nom</label>
							                                        <input type="text" class="form-control required email" id="email" value="<?php echo set_value('email'); ?>" name="email" maxlength="128">
							                                    </div>
							                                </div>
							                                 <div class="col-md-6">
							                                    <div class="form-group">
							                                        <label for="password">Image</label>
							                                        <input type="password" class="form-control required" id="password" name="password" maxlength="20">
							                                    </div>
							                                </div>
					                            </div>
					                            <div class="row">
					                                  
                                    					<div class="">
                                        					<label >Description</label>
                                       

                                          					<textarea class="" placeholder="Enter Article description"  name="description"  id="description" style="border: 1px solid gray; "></textarea></p>
          									 			<script type='text/javascript'> 
            
            												CKEDITOR.replace('description');</script>
              												<script src="//cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>


                                    					</div>
                                						
					                          
					                            </div>
					                        </div><!-- /.box-body -->
					    
					                        <div class="box-footer">
					                            <input type="submit" class="btn btn-primary" value="Submit" />
					                            <input type="reset" class="btn btn-default" value="Reset" />
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
						    </section>
						    <div class="row">

                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="fname">Title</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('fname'); ?>" id="fname" name="fname" maxlength="128">
                                    </div>

                                      </div>  
                                
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">MetaKeyWords</label>
                                        <input type="text" class="form-control required email" id="email" value="" name="email" maxlength="128">
                                    </div>
                                </div> 
                              


                                </div>
                      	
           
                             
                           <div  class="row"> 
                                   <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">SLUG</label>
                                        <input type="text" class="form-control required email" id="email" value="<?php echo set_value('email'); ?>" name="email" maxlength="128">
                                    </div>
                                </div>
                             <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">MetaDescription</label>
                                        <input type="text" class="form-control required email" id="email" value="<?php echo set_value('email'); ?>" name="email" maxlength="128">
                                    </div>
                                </div>    
                            </div>


                           <div  class="row"> 
                                   
                                    <div class="">
                                        <label for="">Text</label>
                                       
                                        	<textarea class="" placeholder="Enter Article description"  name="description"  id="description" 
                                        	style="border: 1px solid gray; "></textarea></p>
          									 			<script type='text/javascript'> 
            
            												CKEDITOR.replace('description');</script>
              												<script src="//cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>

                                    </div>
                                                             
                            </div>
                           
                        </div><!-- /.box-body -->
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
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
    </section>
    
</div>




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
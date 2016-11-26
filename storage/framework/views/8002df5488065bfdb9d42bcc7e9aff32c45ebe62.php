

<?php $__env->startSection('content'); ?>
<div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Edit Settings </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->

  <section id="cart_items">
    <div class="container">

      <div class="row">
        <div class="col-xs-10">
          <hr> 
        </div>
      </div>

      <div class="table-responsive cart_info">
        <form action="<?php echo e(route('settings.update', ['id' => $setting['id']])); ?>" method="post" id="edit-form" enctype="multipart/form-data">

          <div class="row">
            <div class="form-group col-md-6">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Site Name</label>
                <input type="text" id="name_site" class="form-control" name="name_site" value="<?php echo e($setting['name_site']); ?>" required>
              </div>              
            </div>            

            <div class="form-group col-md-6">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Site Title</label>
                <input type="text" id="title_site" class="form-control" name="title_site" value="<?php echo e($setting['title_site']); ?>" required>
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Site keywords</label>
                <input type="text" id="keywords_site" class="form-control" name="keywords_site" value="<?php echo e($setting['keywords_site']); ?>" required>
              </div>              
            </div>            
            <div class="form-group col-md-6">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Site Description</label>
                <input type="text" id="description_site" class="form-control" name="description_site" value="<?php echo e($setting['description_site']); ?>" required>
              </div>              
            </div>            
          </div> 
          <div class="row">
            <div class="form-group col-md-6">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Site Email</label>
                <input type="text" id="email_site" class="form-control" name="email_site" value="<?php echo e($setting['email_site']); ?>" required>
              </div>              
            </div>            
            <div class="form-group col-md-6">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Site Phone</label>
                <input type="text" id="phone_site" class="form-control" name="phone_site" value="<?php echo e($setting['phone_site']); ?>" required>
              </div>              
            </div>            
          </div>  
          <div class="row">
            <div class="form-group col-md-6">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Site Address</label>
                <input type="text" id="address_site" class="form-control" name="address_site" value="<?php echo e($setting['address_site']); ?>" required>
              </div>              
            </div>
            <div class="form-group col-md-6">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Site Css Style</label>
                <input type="text" id="css_site" class="form-control" name="css_site" value="<?php echo e($setting['css_site']); ?>" required>
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Site Website Link</label>
                <input type="text" id="web_site" class="form-control" name="web_site" value="<?php echo e($setting['web_site']); ?>" required>
              </div>              
            </div>
          </div>          
          <div class="row">
            <div class="col-xs-12">
              <hr> 
            </div>
          </div>                            
          <div class="row">
            <div class="form-group col-md-6">
              <div class="form-group">
                <label for="card-name" id="msgtxtimg" name="msgtxtimg">Image Logo Home Current 
                </label>
                <br>                 
                <img width="150px" src="<?php echo e(URL::to('/')); ?>/images/<?php echo e($setting['logo_home']); ?>" alt="No Images" name="imagepath">
                <br><br> 
                <label><input type="checkbox" id="cbox1" name="cbox1" value="1"></label>
                <label for="card-name">Check If Want To Change Current Image Logo Home</label>
                <input type="file" id="logo_home" name="logo_home" accept="image/*">
              </div>              
            </div>            
            <div class="form-group col-md-6">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">#suggest (width=150px ; Height=120px)</label>
                <br>
                <label for="name" id="text_redl" name="text_red">Logo Home Height - pixels</label>
                <input type="number" id="logo_home_height" class="form-control" name="logo_home_height" value="<?php echo e($setting['logo_home_height']); ?>" required>
              </div>              

              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Logo Home Width - pixels</label>
                <input type="number" id="logo_home_width" class="form-control" name="logo_home_width" value="<?php echo e($setting['logo_home_width']); ?>" required>
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-12">
              <hr> 
            </div>
          </div>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-group">
                <label for="card-number">Select if Site Has Lema</label>
                <select id="has_lema" name="has_lema">                  
                      <?php if($setting['has_lema'] == '0'): ?>
                        <option selected="selected" value="0">No</option>
                        <option value="1">Yes</option>
                      <?php else: ?>
                        <option value="0">No</option>
                        <option selected="selected" value="1">Yes</option>      
                      <?php endif; ?>
                </select>                
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="form-group col-md-6">
              <div class="form-group">
                <label for="card-name" id="msgtxtimg" name="msgtxtimg">Image Lema Current
                </label>
                <br>                 
                <img width="380px" src="<?php echo e(URL::to('/')); ?>/images/<?php echo e($setting['lema_home']); ?>" alt="No Images" name="imagepath">
                <br><br> 
                <label><input type="checkbox" id="cbox2" name="cbox2" value="1"></label>
                <label for="card-name">Check If Want To Change Current Image Lema Home</label>
                <input type="file" id="logo_home" name="lema_home" accept="image/*">
              </div>              
            </div>            
            <div class="form-group col-md-6">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">#suggest (width=380px ; Height=100px)</label>
                <br>
                <label for="name" id="text_redl" name="text_red">Lema Home Height - pixels</label>
                <input type="number" id="lema_home_height" class="form-control" name="lema_home_height" value="<?php echo e($setting['lema_home_height']); ?>" required>
              </div>              

              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Lema Home Width - pixels</label>
                <input type="number" id="lema_home_width" class="form-control" name="lema_home_width" value="<?php echo e($setting['lema_home_width']); ?>" required>
              </div>              
            </div>            
          </div>
         <div class="row">
            <div class="col-xs-12">
              <hr> 
            </div>
          </div>                            
          <div class="row">
            <div class="form-group col-md-6">
              <div class="form-group">
                <label for="card-name" id="msgtxtimg" name="msgtxtimg">Image Logo Admin Current
                </label>
                <br>                 
                <img width="60px" src="<?php echo e(URL::to('/')); ?>/images/<?php echo e($setting['logo_admin']); ?>" alt="No Images" name="imagepath">
                <br><br> 
                <label><input type="checkbox" id="cbox3" name="cbox3" value="1"></label>
                <label for="card-name">Check If Want To Change Current Image Logo Admin</label>
                <input type="file" id="logo_admin" name="logo_admin" accept="image/*">
              </div>              
            </div>            
            <div class="form-group col-md-6">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">#suggest (width=60px ; Height=50px)</label>
                <br>
                <label for="name" id="text_redl" name="text_red">Lema Home Height - pixels</label>
                <input type="number" id="logo_admin_height" class="form-control" name="logo_admin_height" value="<?php echo e($setting['logo_admin_height']); ?>" required>
              </div>              

              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Lema Home Width - pixels</label>
                <input type="number" id="logo_admin_width" class="form-control" name="logo_admin_width" value="<?php echo e($setting['logo_admin_width']); ?>" required>
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-12">
              <hr> 
            </div>
          </div>


                        



          <div class="row">
            <div class="form-group col-md-4">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Image Footer Map </label>
                <input type="text" id="img_map" class="form-control" name="img_map" value="<?php echo e($setting['img_map']); ?>" required>
              </div>              
            </div>            

            <div class="form-group col-md-4">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Qty items on Pagination Home </label>
                <input type="number" id="pagination_home" class="form-control" name="pagination_home" value="<?php echo e($setting['pagination_home']); ?>" required>
              </div>              
            </div>            

            <div class="form-group col-md-4">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Qty items on Pagination Shop </label>
                <input type="number" id="pagination_shop" class="form-control" name="pagination_shop" value="<?php echo e($setting['pagination_shop']); ?>" required>
              </div>              
            </div>            
          </div>
          <div class="row">
            <div class="col-xs-12">
              <hr> 
            </div>
          </div>

          <div class="row">
            <div class="form-group col-md-4">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Link Facebook </label>
                <input type="text" id="link_facebook" class="form-control" name="link_facebook" value="<?php echo e($setting['link_facebook']); ?>" >
              </div>              
            </div>            

            <div class="form-group col-md-4">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Link Twitter </label>
                <input type="text" id="link_twitter" class="form-control" name="link_twitter" value="<?php echo e($setting['link_twitter']); ?>" >
              </div>              
            </div>            

            <div class="form-group col-md-4">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Link Instagram </label>
                <input type="text" id="link_instagram" class="form-control" name="link_instagram" value="<?php echo e($setting['link_instagram']); ?>" >
              </div>              
            </div>            
          </div>  



          <div class="row">
            <div class="form-group col-md-4">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Link Dribbble </label>
                <input type="text" id="link_dribbble" class="form-control" name="link_dribbble" value="<?php echo e($setting['link_dribbble']); ?>" >
              </div>              
            </div>            
            <div class="form-group col-md-4">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Link Google-plus </label>
                <input type="text" id="link_google_plus" class="form-control" name="link_google_plus" value="<?php echo e($setting['link_google_plus']); ?>" >
              </div>              
            </div>  
            <div class="form-group col-md-4">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Link Linkedin </label>
                <input type="text" id="link_linkedin" class="form-control" name="link_linkedin" value="<?php echo e($setting['link_linkedin']); ?>" >
              </div>              
            </div> 

          </div>

          <div class="row">
            <div class="col-xs-12">
              <hr> 
            </div>
          </div>
 

          <div class="row">
            <div class="form-group col-md-4">
              <div class="form-group">
                <label for="card-number">Check Payment to Finish Order</label>
                <select id="payment_toorder" name="payment_toorder">                  
                      <?php if($setting['payment_toorder'] == '0'): ?>
                        <option selected="selected" value="0">No</option>
                        <option value="1">Yes</option>
                      <?php else: ?>
                        <option value="0">No</option>
                        <option selected="selected" value="1">Yes</option>      
                      <?php endif; ?>
                </select>                
              </div>              
            </div>            
            <div class="form-group col-md-4">
              <div class="form-group">
                <label for="card-number">Need Aprroval after Registration User</label>
                <select id="approve_user" name="approve_user">                  
                      <?php if($setting['approve_user'] == '0'): ?>
                        <option selected="selected" value="0">No</option>
                        <option value="1">Yes</option>
                      <?php else: ?>
                        <option value="0">No</option>
                        <option selected="selected" value="1">Yes</option>      
                      <?php endif; ?>
                </select>                
              </div>              
            </div>            

            <div class="form-group col-md-4">
              <div class="form-group">
                <label for="card-number">Need Login to Show Prices</label>
                <select id="loginshowprices" name="loginshowprices">                  
                      <?php if($setting['loginshowprices'] == '0'): ?>
                        <option selected="selected" value="0">No</option>
                        <option value="1">Yes</option>
                      <?php else: ?>
                        <option value="0">No</option>
                        <option selected="selected" value="1">Yes</option>      
                      <?php endif; ?>
                </select>                
              </div>              
            </div>

          </div> 



          <div class="row">
            <div class="form-group col-md-4">
              <div class="form-group">
                <label for="card-number">Allow Buy Like Guest</label>
                <select id="buylikeguess" name="buylikeguess">                  
                      <?php if($setting['buylikeguess'] == '0'): ?>
                        <option selected="selected" value="0">No</option>
                        <option value="1">Yes</option>
                      <?php else: ?>
                        <option value="0">No</option>
                        <option selected="selected" value="1">Yes</option>      
                      <?php endif; ?>
                </select>                
              </div>              
            </div>                       
            <div class="form-group col-md-4">
              <div class="form-group">
                <label for="card-number">Mode Select Home</label>
                <select id="select_home_prod" name="select_home_prod">                  

                      <?php if($setting['select_home_prod'] == '1'): ?>
                        <option selected="selected" value="1">New Arrivals</option>
                        <option value="2">Random Products</option>
                        <option value="3">Select Especial Products</option>
                      <?php elseif($setting['select_home_prod'] == '2'): ?>
                        <option value="1">New Arrivals</option>
                        <option selected="selected" value="2">Random Products</option>
                        <option value="3">Select Especial Products</option>
                      <?php else: ?>
                        <option value="1">New Arrivals</option>
                        <option value="2">Random Products</option>
                        <option selected="selected" value="3">Select Especial Products</option>                            
                      <?php endif; ?>
                </select>                
              </div>             
            </div>
             <div class="form-group col-md-4">
              <div class="form-group">
                <label for="card-number">Select Dark Menu Top</label>
                <select id="dark_menu" name="dark_menu">                  
                      <?php if($setting['dark_menu'] == '0'): ?>
                        <option selected="selected" value="0">No</option>
                        <option value="1">Yes</option>
                      <?php else: ?>
                        <option value="0">No</option>
                        <option selected="selected" value="1">Yes</option>      
                      <?php endif; ?>
                </select>                 
              </div>             
            </div>        
         </div>
          <div class="row">
            <div class="form-group col-md-4">
              <div class="form-group">
                <label for="card-number"> Mode Register required Sales_tax <br> Auth to Register on Wholesale </label>
                <select id="kind_web" name="kind_web">                  
                      <?php if($setting['kind_web'] == '1'): ?>
                        <option selected="selected" value="1">Shopcart</option>
                        <option value="2">Wholesale</option>
                      <?php else: ?>
                        <option value="1">Shopcart</option>
                        <option selected="selected" value="2">Wholesale</option>      
                      <?php endif; ?>
                </select>                
              </div>              
            </div>            
            <div class="form-group col-md-4">
              <div class="form-group">
                <label for="card-number"> Confirm Window Over +18  </label>
                <select id="modal_ask" name="modal_ask">                  
                      <?php if($setting['modal_ask'] == '1'): ?>
                        <option selected="selected" value="1">Yes</option>
                        <option value="0">No</option>
                      <?php else: ?>
                        <option value="1">Yes</option>
                        <option selected="selected" value="0">No</option>      
                      <?php endif; ?>
                </select>                
              </div>              
            </div>  
            <div class="form-group col-md-4">
              <div class="form-group">
                <label for="card-number"> Select Payment Method </label>
                <select id="modal_pay" name="modal_pay">                  
                      <?php if($setting['modal_pay'] == '1'): ?>
                        <option selected="selected" value="1">Paypal</option>
                        <option value="0">Stripe</option>
                      <?php else: ?>
                        <option value="1">Paypal</option>
                        <option selected="selected" value="0">Stripe</option>      
                      <?php endif; ?>
                </select>                
              </div>              
            </div> 

          </div>             
          <div class="row">
            <div class="col-xs-12">
              <hr> 
            </div>
          </div>
          <div class="row">
            <fieldset class="fsStyle" style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;">
              <legend class="legendStyle">
                <a data-toggle="collapse" data-target="#demo" href="#">&nbsp;Paypal Account </a>
              </legend>
              <div class="form-group col-md-4">
                <div class="form-group">
                  <label for="name" id="text_redl" name="text_red">Paypal Client_Id </label>
                  <input type="text" id="paypalclient_id" class="form-control" name="paypalclient_id" value="<?php echo e($setting['paypalclient_id']); ?>" >
                </div>              
              </div>
              <div class="form-group col-md-4">
                <div class="form-group">
                  <label for="name" id="text_redl" name="text_red">Paypal Secret Key </label>
                  <input type="text" id="paypalsecretkey" class="form-control" name="paypalsecretkey" value="<?php echo e($setting['paypalsecretkey']); ?>" >
                </div>              
              </div>                
            </fieldset>            
          </div>
          <div class="row">
            <div class="col-xs-12">
              <hr> 
            </div>
          </div>
          <div class="row">
            <fieldset class="fsStyle" style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;">
              <legend class="legendStyle">
                <a data-toggle="collapse" data-target="#demo" href="#">&nbsp;Stripe Account </a>
              </legend>
              <div class="form-group col-md-4">
                <div class="form-group">
                  <label for="name" id="text_redl" name="text_red">Stripe Api Secret Key </label>
                  <input type="text" id="apisecretkey" class="form-control" name="apisecretkey" value="<?php echo e($setting['apisecretkey']); ?>" >
                </div>              
              </div>
              <div class="form-group col-md-4">
                <div class="form-group">
                  <label for="name" id="text_redl" name="text_red">Stripe Api Public Key </label>
                  <input type="text" id="apipublickey" class="form-control" name="apipublickey" value="<?php echo e($setting['apipublickey']); ?>" >
                </div>              
              </div>                
            </fieldset>            
          </div>

          <div class="row">
            <fieldset class="fsStyle" style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;">
              <legend class="legendStyle">
                <a data-toggle="collapse" data-target="#demo" href="#">&nbsp;Sku for Especial Products at Home</a>
              </legend>
            <div class="form-group col-md-4">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Sku Especial Product #1 </label>
                <input type="text" id="especial_prod_sku1" class="form-control" name="especial_prod_sku1" value="<?php echo e($setting['especial_prod_sku1']); ?>" >
              </div>                
            </div>            

            <div class="form-group col-md-4">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Sku Especial Product #2 </label>
                <input type="text" id="especial_prod_sku2" class="form-control" name="especial_prod_sku2" value="<?php echo e($setting['especial_prod_sku2']); ?>" >
              </div>              
            </div>            

            <div class="form-group col-md-4">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Sku Especial Product #3 </label>
                <input type="text" id="especial_prod_sku3" class="form-control" name="especial_prod_sku3" value="<?php echo e($setting['especial_prod_sku3']); ?>" >
              </div>               
            </div> 

              <div class="form-group col-md-4">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Sku Especial Product #4 </label>
                <input type="text" id="especial_prod_sku4" class="form-control" name="especial_prod_sku4" value="<?php echo e($setting['especial_prod_sku4']); ?>" >
              </div>              
              </div>            
              <div class="form-group col-md-4">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Sku Especial Product #5 </label>
                <input type="text" id="especial_prod_sku5" class="form-control" name="especial_prod_sku5" value="<?php echo e($setting['especial_prod_sku5']); ?>" >
              </div>               
              </div>  
              <div class="form-group col-md-4">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Sku Especial Product #6 </label>
                <input type="text" id="especial_prod_sku6" class="form-control" name="especial_prod_sku6" value="<?php echo e($setting['especial_prod_sku6']); ?>" >
              </div>               
              </div>                
            </fieldset>            
          </div>

          <div class="row">
            <fieldset class="fsStyle" style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;">
              <legend class="legendStyle">
                <a data-toggle="collapse" data-target="#demo" href="#">&nbsp;Ids Categories for Quick Shop</a>
              </legend>
            <div class="form-group col-md-4">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Quick Shop - Id Category #1 </label>
                <input type="number" id="quick_cat_id1" class="form-control" name="quick_cat_id1" value="<?php echo e($setting['quick_cat_id1']); ?>" >
              </div>              
            </div>            

            <div class="form-group col-md-4">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Quick Shop - Id Category #2 </label>
                <input type="number" id="quick_cat_id2" class="form-control" name="quick_cat_id2" value="<?php echo e($setting['quick_cat_id2']); ?>" >
              </div>              
            </div>            

            <div class="form-group col-md-4">
              <div class="form-group">
                <label for="name" id="text_redl" name="text_red">Quick Shop - Id Category #3 </label>
                <input type="number" id="quick_cat_id3" class="form-control" name="quick_cat_id3" value="<?php echo e($setting['quick_cat_id3']); ?>" >
              </div>              
            </div> 

              <div class="form-group col-md-4">
                <div class="form-group">
                  <label for="name" id="text_redl" name="text_red">Quick Shop - Id Category #4 </label>
                  <input type="number" id="quick_cat_id4" class="form-control" name="quick_cat_id4" value="<?php echo e($setting['quick_cat_id4']); ?>" >
                </div>              
              </div>            
              <div class="form-group col-md-4">
                <div class="form-group">
                  <label for="name" id="text_redl" name="text_red">Quick Shop - Id Category #5 </label>
                  <input type="number" id="quick_cat_id5" class="form-control" name="quick_cat_id5" value="<?php echo e($setting['quick_cat_id5']); ?>" >
                </div>              
              </div>   
            </fieldset>            
          </div>


          <?php echo e(csrf_field()); ?>

          <br>          
          <button type="submit" class="btn btn-success">Update Settings</button>
        </form>

      </div>
    </div>
  </section> <!--/#cart_items-->                 <!-- /. ROW  -->           
</div>
<!-- /. PAGE INNER  -->
</div>
         <!-- /. PAGE WRAPPER  -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
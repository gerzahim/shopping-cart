

<?php $__env->startSection('content'); ?>

<div id="page-wrapper" >
            <div id="page-inner">
                  <?php if(Session::has('message')): ?>
                      <div class="alert alert-success">
                          <?php echo e(Session::get('message')); ?>

                      </div>
                  <?php endif; ?>             
                <div class="row">
                    <div class="col-md-12">
                     <h2>List Categories </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  

  <section id="cart_items">
  


    <div class="col-md-12">
<hr>
      <div class="table-responsive cart_info">








        <table class="table table-condensed">
          <thead>
            <tr class="cart_menu">
              <td class="image">Imagen</td>
              <td class="image">Category ID</td>
              <td class="description">Name</td>
              <td class="price">Description</td>
              <td class="price">Parent Category</td>
              <td class="quantity">Edit</td>
              <td class="total">Delete</td>
            </tr>
          </thead>
          <tbody>
            <?php foreach($categories as $parent): ?>
                <?php echo $__env->make('admin.tablecategories', ['category' => $parent, 'level' => '1'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php if($parent->children->count()): ?>
                  <?php foreach($parent->children as $child): ?>
                    <?php echo $__env->make('admin.tablecategories', ['category' => $child, 'level' => '2'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php if($child->children->count()): ?>
                      <?php foreach($child->children as $grandson): ?>
                        <?php echo $__env->make('admin.tablecategories', ['category' => $grandson, 'level' => '3'], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                      <?php endforeach; ?>        
                    <?php endif; ?> 
                  <?php endforeach; ?> 
                <?php endif; ?>
            <?php endforeach; ?> 
          </tbody>
          <tfoot>
            <tr class="cart_menu">
              <td class="image"></td>
              <td class="description"></td>
              <td class="price"></td>
              <td class="price"></td>
              <td class="quantity"><a class="btn btn-success" href="<?php echo e(route('categories.create')); ?>">Create Category</a></td>
              <td class="total"></td>
              <td class="total"></td>
            </tr>            
          </tfoot>
        </table>

      </div>





    </div>
  </section> <!--/#cart_items-->                 <!-- /. ROW  -->           
                </div>
             <!-- /. PAGE INNER  -->
        </div>
         <!-- /. PAGE WRAPPER  -->

<?php $__env->stopSection(); ?>


   <?php /*   
<!--


            <?php foreach($categories as $category): ?>
            <tr>
              <td class="cart_product">
              
                <?php if($category['imagepath'] != null): ?>
                  <img height="50px" width="50px" src="media/<?php echo e($category['imagepath']); ?>" alt="No Images">
                <?php else: ?>
                  <img height="50px" width="50px" src="images/no-image.jpg" alt="No Images">
                <?php endif; ?>
              </td>
              <td class="cart_description">
                <h4><a href=""><?php echo e($category['id']); ?></a></h4>
              </td>
              <td class="cart_description">
                <h4><a href="#"><?php echo e($category['name']); ?></a></h4>
              </td>
              <td class="cart_price">
                <p><?php echo e($category['description']); ?></p>
              </td>

              <td class="cart_price">
                <p><?php echo e($findnamecat[$category['parent_id']]); ?></p>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="<?php echo e(route('product.removeItem', ['id' => $category['id']])); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="<?php echo e(route('product.removeItem', ['id' => $category['id']])); ?>"><i class="fa fa-times"></i></a>
              </td>
            </tr>
            <?php endforeach; ?>  

<ul>
  <?php foreach($categories as $parent): ?>
    <li><?php echo e($parent->name); ?>

      <?php if($parent->children->count()): ?>
        <ul>
          <?php foreach($parent->children as $child): ?>
            <li><?php echo e($child->name); ?></li>
              <?php if($child->children->count()): ?>
                <ul>
                  <?php foreach($child->children as $grandson): ?>
                    <li><?php echo e($grandson->name); ?></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>            
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </li>
  <?php endforeach; ?>
</ul>


 <div id="MainMenu">
  <div class="list-group panel">

    <a href="#demo3" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Parent</a>
    <div class="collapse" id="demo3">
      <a href="#SubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu1">Child Subitem 1 <i class="fa fa-caret-down"></i></a>
      <div class="collapse list-group-submenu" id="SubMenu1">
        <a href="#" class="list-group-item" data-parent="#SubMenu1">Grandson Subitem 1 a</a>
        <a href="#" class="list-group-item" data-parent="#SubMenu1">Grandson Subitem 2 b</a>
        <a href="#SubSubMenu1" class="list-group-item" data-toggle="collapse" data-parent="#SubSubMenu1">Subitem 3 c <i class="fa fa-caret-down"></i></a>
        <div class="collapse list-group-submenu list-group-submenu-1" id="SubSubMenu1">
          <a href="#" class="list-group-item" data-parent="#SubSubMenu1">Sub sub item 1</a>
          <a href="#" class="list-group-item" data-parent="#SubSubMenu1">Sub sub item 2</a>
        </div>
        <a href="#" class="list-group-item" data-parent="#SubMenu1">Subitem 4 d</a>
      </div>
      <a href="javascript:;" class="list-group-item">Subitem 2</a>
      <a href="javascript:;" class="list-group-item">Subitem 3</a>
    </div>

    <a href="#demo4" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">Item 4</a>
    <div class="collapse" id="demo4">
      <a href="" class="list-group-item">Subitem 1</a>
      <a href="" class="list-group-item">Subitem 2</a>
      <a href="" class="list-group-item">Subitem 3</a>
    </div>

  </div>
</div> 




<div id="MainMenu">
  <div class="list-group panel">
    <?php foreach($categories as $parent): ?>
      
      <?php if($parent->children->count()): ?>
        <!-- Parent Item 1 -+->
        <a href="#menu<?php echo e($parent->id); ?>" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">
          <?php echo e($parent->name); ?>

        </a>
          <div class="collapse" id="menu<?php echo e($parent->id); ?>">      
            <?php foreach($parent->children as $child): ?>
                <?php if($child->children->count()): ?>
                  <a href="#submenu<?php echo e($parent->id); ?>" class="list-group-item" data-toggle="collapse" data-parent="#SubMenu1">
                    <!-- Child Subitem 1 -+->
                    <?php echo e($child->name); ?>

                    <i class="fa fa-caret-down"></i>
                  </a>
                  <div class="collapse" id="submenu<?php echo e($parent->id); ?>">
                    <?php foreach($child->children as $grandson): ?>
                        <!-- Grandson SubSubitem 1 / No childs -+->
                        <a href="#" class="list-group-item"><?php echo e($grandson->name); ?></a>
                    <?php endforeach; ?>
                  </div>


                <?php else: ?>
                  <!-- Child Subitem 1 / No childs-+->
                  <a href="#" class="list-group-item"><?php echo e($child->name); ?></a>
                <?php endif; ?>

                      
            <?php endforeach; ?>
          </div>
      <?php else: ?>
        <!-- Parent Item 1 / No childs -+->
        <a href="#" class="list-group-item list-group-item-success" data-toggle="collapse" data-parent="#MainMenu">
          <?php echo e($parent->name); ?>

        </a>      
      <?php endif; ?>       
    <?php endforeach; ?>
  </div>
</div> 




          <?php echo $tree; ?>

            <?php foreach($categories as $category): ?>
            <tr>
              <td class="cart_product">
                <img height="50px" width="50px" src="media/<?php echo e($category['imagepath']); ?>" alt="No Images">
              </td>
              <td class="cart_description">
                <h4><a href=""><?php echo e($category['id']); ?></a></h4>
              </td>
              <td class="cart_description">
                <h4><a href=""><?php echo e($category['name']); ?></a></h4>
              </td>
              <td class="cart_price">
                <p><?php echo e($category['description']); ?></p>
              </td>

              <td class="cart_price">
                <p><?php echo e($category['parentcategory']); ?></p>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="<?php echo e(route('product.removeItem', ['id' => $category['id']])); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              </td>
              <td class="cart_delete">
                <a class="cart_quantity_delete" href="<?php echo e(route('product.removeItem', ['id' => $category['id']])); ?>"><i class="fa fa-times"></i></a>
              </td>
            </tr>
            <?php endforeach; ?>  

            -->
            */ ?>  
<?php echo $__env->make('admin.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
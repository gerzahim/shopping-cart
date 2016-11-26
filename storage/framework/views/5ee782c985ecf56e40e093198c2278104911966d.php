

<tr class="cart_menu">
  <td class="image">
    <?php if($category['imagepath'] != null): ?>
      <img height="50px" width="50px" src="media/<?php echo e($category['imagepath']); ?>" alt="No Images">
    <?php else: ?>
      <img height="50px" width="50px" src="images/no-image.jpg" alt="No Images">
    <?php endif; ?>
  </td>
  <td class="image"><?php echo e($category['id']); ?></td>
  <td class="description">
  <?php if($level == '1'): ?>
    <i class="fa fa-circle" aria-hidden="true"></i>
    <?php echo e($category['name']); ?>

  <?php elseif($level == '2'): ?>
    &nbsp;
    <i class="fa fa-circle-o" aria-hidden="true"></i>
    <?php echo e($category['name']); ?>

  <?php else: ?>
    &nbsp;&nbsp;&nbsp;
    <i class="fa fa-minus" aria-hidden="true"></i>
    <?php echo e($category['name']); ?>

  <?php endif; ?>
  </td>
  <td class="price"><?php echo e($category['description']); ?></td>
  <td class="price"><?php echo e($findnamecat[$category['parent_id']]); ?></td>
  <td class="quantity">
    <a class="cart_quantity_delete" href="<?php echo e(route('categories.edit', ['id' => $category['id']])); ?>">
      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
    </a>
  </td>
  <td class="total">
    <a class="cart_quantity_delete" href="<?php echo e(route('category.removeCategory', ['id' => $category['id']])); ?>">
      <i class="fa fa-times"></i>
    </a>    
  </td>
</tr>




<tr class="cart_menu">
  <td class="image">
    @if($category['imagepath'] != null)
      <img height="50px" width="50px" src="media/{{ $category['imagepath'] }}" alt="No Images">
    @else
      <img height="50px" width="50px" src="images/no-image.jpg" alt="No Images">
    @endif
  </td>
  <td class="image">{{ $category['id'] }}</td>
  <td class="description">
  @if($level == '1')
    <i class="fa fa-circle" aria-hidden="true"></i>
    {{ $category['name'] }}
  @elseif($level == '2')
    &nbsp;
    <i class="fa fa-circle-o" aria-hidden="true"></i>
    {{ $category['name'] }}
  @else
    &nbsp;&nbsp;&nbsp;
    <i class="fa fa-minus" aria-hidden="true"></i>
    {{ $category['name'] }}
  @endif
  </td>
  <td class="price">{{ $category['description'] }}</td>
  <td class="price">{{ $findnamecat[$category['parent_id']] }}</td>
  <td class="quantity">
    <a class="cart_quantity_delete" href="{{ route('categories.edit', ['id' => $category['id']]) }}">
      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
    </a>
  </td>
  <td class="total">
    <a class="cart_quantity_delete" href="{{ route('category.removeCategory', ['id' => $category['id']]) }}">
      <i class="fa fa-times"></i>
    </a>    
  </td>
</tr>


@foreach($subcategories as $subcategory)
 <ul>
    <li>{{$subcategory->name}}</li>
  @if(count($subcategory->subcategories))
    @include('category.sub_cat',['subcategories' => $subcategory->subcategories])
  @endif
 </ul>
@endforeach
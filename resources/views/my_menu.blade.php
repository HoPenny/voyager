<ul>
@foreach($items as $menu_item)
  <li><a href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a></li>
   @foreach($menu_item->children as $sub_menu_item)
      <ul>
        <li>
          <a href="{{ $sub_menu_item->link() }}">{{ $sub_menu_item->title }}</a>
        </li>
      </ul>
   @endforeach
@endforeach
</ul>

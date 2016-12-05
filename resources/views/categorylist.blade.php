  
<section class="mega-menu-list">
<div class="container">
<div class="row">
  <nav class="zetta-menu1 zm-css">
    <input type="checkbox" id="zm-switchzetta-menu1" />
    <ul onclick="">
@foreach ($categories as $k => $category)
      <li><a href="#">{{ $category->name }}<span class="zm-caret"><i class="fa fa-angle-down"></i></span></a>
        <div style="width:300px;" class=" zm-right-align">
          <ul>
          @foreach($category->courses as $key => $course)
            <li><a href="#">{{ $course->name }}</a>
            </li>

            @if ($key == 4)       
          </ul>
          <ul>
           @endif
            @endforeach
          </ul>
          </div>
      </li>
 @endforeach


      
    </ul>
  </nav>

</div>
</div>
</section>
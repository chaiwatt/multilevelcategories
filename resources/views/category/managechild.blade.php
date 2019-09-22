<ul>

    @foreach($childs as $child)

        <li class="tree-view closed">
         <a href="" class="tree-name">{{ $child->title }}</a>
            @if(count($child->childs))

                @include('category.managechild',['childs' => $child->childs])

            @endif

        </li>

    @endforeach

</ul>
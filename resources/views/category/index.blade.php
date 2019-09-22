<!DOCTYPE html>
<html>
    <head>
    <title>Laravel Unlimited Hierarchical Category Tree View Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" />
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/jquery.treeview.css')}}" />
    <script src="{{asset('js/jquery-3.3.1.js')}}"></script>   
    <script src="{{asset('js/jquery-treeview.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/demo.js')}}"></script>
    </head>
    <body>
        <div class="container">          
            <div class="row">
                <div class="col-md-6">
                    <div class="card ">
                        <div  class="card-header bg-info">หมวดหมู่</div>
                        <div class="card-body">
                            <div  class="card-title">หมวดหมู่</div>
                            <ul id="browser" class="filetree">
                                @foreach($categories as $category)
                                    <li class="tree-view closed"><a href="" class="tree-name">{{ $category->title  }}</a></span>
                                        @if(count($category->childs))
                                            @include('category.managechild',['childs' => $category->childs])
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-info">
                            เพิ่มหมวดหมู่
                        </div>
                        <div class="card-body">
                            <form role="form" id="category" method="POST" action="{{ route('create') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <label>Title:</label>
                                    <input type="text" id="title" name="title" value="" class="form-control" placeholder="Enter Title" required>
                                    @if ($errors->has('title'))
                                        <span class="text-red" role="alert">
                                            <strong>{{ $errors->first('title') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
                                    <label>หมวดหมู่:</label>
                                    <select id="parent_id" name="parent_id" class="form-control" required>
                                        <option value="0">เลือก</option>
                                        @foreach($allcategories as $allcategorie)
                                            <option value="{{ $allcategorie->id }}">{{ $allcategorie->title }}[{{ $allcategorie->id }}]</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('parent_id'))
                                        <span class="text-red" role="alert">
                                            <strong>{{ $errors->first('parent_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success">เพิ่ม</button>
                                </div>
                            </form>
                        </div>
                    </div>         
                </div>
            </div>
        </div>
    </body>
</html>
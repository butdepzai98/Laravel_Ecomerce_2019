<div class="navbar-inner">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="agileits-navi_search">
                <form action="#" method="post">
                    <select id="agileinfo-nav_search" name="agileinfo_search" class="border" required="">
                        <option value="">All Categories</option>
                        @foreach($category as $key => $value)
                            <option value="{!! $value->id !!}">{!! $value->name !!}</option>
                        @endforeach
                    </select>
                </form>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto text-center mr-xl-5">
                    <li class="nav-item mr-lg-2 mb-lg-0 mb-2">
                        <a class="nav-link" href="{{ url('/') }}">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    
                    @foreach($category as $key => $cate)
                        <li class="nav-item dropdown mr-lg-2 mb-lg-0 mb-2">
                            <a class="nav-link @if(count($cate->productType)>1)dropdown-toggle @endif">
                                {!! $cate->name !!}
                            </a>
                            @if(count($cate->productType)>0)
                                <div class='dropdown-menu'>
                                    @foreach($cate->productType as $key => $value)
                                        <a class='dropdown-item' href="producttype/{{ $value->id }}">{!! $value->name !!}</a>
                                    @endforeach
                                    {{-- <div class="dropdown-divider"></div> --}}
                                </div>
                            @endif
                            
                        </li>
                    @endforeach

                    <li class="nav-item mr-lg-2 mb-lg-0 mb-2">
                        <a class="nav-link" href="{{ url('about') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('contact') }}">Contact Us</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
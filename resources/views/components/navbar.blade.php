<nav class="navbar-area navbar navbar-expand-lg navbar-light dayak-bg">
    <div class="container">
        <a class="navbar-brand mx-0 px-0" href="{{ url('') }}">
            <img style="width: 36vh;" src="{{url('asset/img/logo_iaknpky-min.png')}}" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            {{-- navbar section --}}
            <ul class="navbar-nav navbar-right ms-auto mb-2 mb-lg-0">
                @foreach ($menu as $c)
                @if ($c->menusub->isEmpty())
                    <li class="nav-item">
                    <a class="nav-link" href="{{url('')}}">{{$c->judul}}</a>
                    </li>
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{$c->judul}}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach ($c->menusub as $d)
                        <li><a class="dropdown-item" href="{{url('info/'.$d->menusublink)}}">{{$d->judul}}</a></li>
                        @endforeach
                    </ul>
                </li>
                @endif
                @endforeach
            </ul>
            {{-- end navbar section --}}
        <div class="row">
            <div class="col ms-auto">
                <form method="POST" action="{{url('search')}}" class="d-flex">
                    @method('POST')
                    @csrf
                    <input name="search" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
            </div>
        </div>
        </div>
    </div>
</nav>
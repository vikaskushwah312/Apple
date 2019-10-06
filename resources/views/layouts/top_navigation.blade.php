<header class="main-header header-transparent sticky-header">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="{{url('')}}">
                {!! logoImage()!!}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" href="{{url('about-us')}}">
                            About Us
                        </a>
                    </li>
                    <li class="nav-item sp">
                        <a href="{{url('submit-property')}}" class="nav-link link-color"><i class="fa fa-plus"></i> Submit Property</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle" href="{{url('pg/rent')}}">
                            Rent
                        </a>
                    </li>
                    <li class="nav-item">
                       @if (auth('user')->id())
                        <a class="nav-link dropdown-toggle" href="{{url('login')}}" >
                            {!! authName(auth('user')->id())!!}
                        </a>
                        @else
                        <a class="nav-link dropdown-toggle" href="{{url('login')}}" >
                            login 
                        </a>
                        @endif
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
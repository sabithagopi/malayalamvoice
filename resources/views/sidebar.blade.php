
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">{{ __('Menus') }}</div>

                <div class="card-body">
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a class="nav-link active" href="{{(Auth::user()->role==1) ? route('adminhome') : route('userhome') }}">Home</a>
                      </li>
                      
                      <li class="nav-item">
                        <a class="nav-link" href="#">Article</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Banner</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Breaking News</a>
                      </li>
                       <li class="nav-item">
                        <a class="nav-link" href="#">Audience question</a>
                      </li>
                       <li class="nav-item">
                        <a class="nav-link" href="#">Users</a>
                      </li>
                       <li class="nav-item">
                        <a class="nav-link" href="#">Videostories</a>
                      </li>
                     
                    </ul>
                </div>
            </div>
        </div>

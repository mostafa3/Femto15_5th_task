
<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav mr-auto">

            <li class="nav-item ">
              <a class="nav-link" href="{{action('InventoryController@index')}}">Inventories <span class="sr-only"></span></a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{action('InventoryManagerController@index')}}">Inventory Managers <span class="sr-only"></span></a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{action('SupplierController@index')}}">Suppliers <span class="sr-only"></span></a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{action('ItemController@index')}}">Items <span class="sr-only"></span></a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="{{action('TransactionController@index')}}">Transactions <span class="sr-only"></span></a>
            </li>

        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
            <!-- <li>
                <a class="nav-link " href="#" data-toggle="tooltip" data-placement="bottom" title="Notifications"><i class="fas fa-bell"></i></a>
            </li> -->
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                      @if(Auth::check())
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                            <i class="fas fa-power-off"></i>{{ __('Logout') }}
                        </a>

                      @endif


                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>

        </ul>
    </div>
</div>
</nav>

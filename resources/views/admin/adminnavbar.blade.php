<!--
 * This is a Northumbria University Coursework.
 *
 *  @author mitsigkas
-->


<nav
       id="main-navbar"
       class="navbar navbar-expand-lg navbar-light bg-white fixed-top"
       >
    <!-- Container wrapper -->
    <div class="container-fluid">
      <!-- Toggle button -->

      <!-- Brand -->
      <a class="navbar-brand" href="dashboard">
      <h1>Admin Dashboard</h1>
      </a>
      <!-- Search form -->


      <!-- Right links -->
      <ul class="navbar-nav ms-auto d-flex flex-row">
        <!-- Notification dropdown -->


        <!-- Icon -->


        <!-- Icon dropdown -->


        <!-- Avatar -->
        <li class"nav-item">
            <div class="list-group-item ripple"> {{ Auth::user()->name}}</div> </li>
              <li>  <div class="btn-group">
                  <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  OPTIONS
                  </button>
                  <div class="dropdown-menu dropdown-menu-right">

                    <a class="dropdown-item" href="home">Main Website</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                  </div>
                </div></li>
      </ul>
    </div>






  </nav>

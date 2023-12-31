<div class="collapse navbar-collapse  w-auto h-auto" id="sidenav-collapse-main">
  <ul class="navbar-nav">
    <li class="nav-item mb-2 mt-0">
      <a href="{{ route('admin.profiles.index') }}" class="nav-link text-white">
        @if (Auth::user()->profile == NULL)
          <i class="fas fa-user-circle"></i>
        @else
        <img src="{{ Auth::user()->profile }}" class="avatar">
        @endif
        <span class="nav-link-text ms-2 ps-1">{{ Auth::user()->name }}</span>
      </a>
    </li>
    <hr class="horizontal light mt-0">
    <li class="nav-item">
      <a data-bs-toggle="collapse" href="#dashboardsExamples" class="nav-link text-white " aria-controls="dashboardsExamples" role="button" aria-expanded="false">

        <span class="sidenav-mini-icon">
          <i class="fa-solid fa-chart-line"></i>
        </span>
        <span class="nav-link-text ms-2 ps-1">Dashboards</span>
      </a>
      <div class="collapse " id="dashboardsExamples">
        <ul class="nav ">
          <li class="nav-item ">
            <a class="nav-link text-white " href="{{ route('home') }}">
              <span class="sidenav-mini-icon"><i class="fa-solid fa-gauge"></i></span>
              <span class="sidenav-normal  ms-2  ps-1"> Dashboard </span>
            </a>
          </li>
          @can('admin_access')
          <li class="nav-item ">
            <a class="nav-link text-white " href="{{ route('admin.banners.index') }}">
              <span class="sidenav-mini-icon"><i class="fa-solid fa-panorama"></i></span>
              <span class="sidenav-normal  ms-2  ps-1"> Banner </span>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-white " href="{{ route('admin.promotions.index') }}">
              <span class="sidenav-mini-icon"><i class="fa-solid fa-gift"></i></span>
              <span class="sidenav-normal  ms-2  ps-1"> Promotions </span>
            </a>
          </li>
          @endcan
        </ul>
      </div>
    </li>
    @foreach (Auth::user()->roles as $role)
    @if($role->title == "Admin")
    <li class="nav-item">
        <a data-bs-toggle="collapse" href="#masterControl" class="nav-link text-white" aria-controls="pagesExamples" role="button" aria-expanded="false">
          <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">manage_accounts</i>
          <span class="nav-link-text ms-2 ps-1">Admin Control</span>
        </a>
        <div class="collapse show" id="pagesExamples">
          <ul class="nav">
            <li class="nav-item ">
              <div class="collapse " id="masterControl">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/admin/real-live-master-list')}}">
                      <span class="sidenav-mini-icon"> <i class="fas fa-users"></i> </span>
                      <span class="sidenav-normal  ms-2  ps-1"> Master Lists </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/admin/agent-user-play-early-morning') }}">
                      <span class="sidenav-mini-icon"> 2D </span>
                      <span class="sidenav-normal  ms-2  ps-1"> 09:30AM </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/admin/agent-user-play-morning') }}">
                      <span class="sidenav-mini-icon"> 2D </span>
                      <span class="sidenav-normal  ms-2  ps-1"> 12:01PM </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/admin/agent-user-play-early-evening-digit') }}">
                      <span class="sidenav-mini-icon"> 2D </span>
                      <span class="sidenav-normal  ms-2  ps-1"> 02:01PM </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/admin/agent-user-play-evening-digit') }}">
                      <span class="sidenav-mini-icon"> 2D </span>
                      <span class="sidenav-normal  ms-2  ps-1"> 04:30PM </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/admin/agent-three-d-list') }}">
                      <span class="sidenav-mini-icon"> 3D </span>
                      <span class="sidenav-normal  ms-2  ps-1"> 3D </span>
                    </a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/admin/get-all-admin-to-master-transfer-log') }}">
                      <span class="sidenav-mini-icon"> T L </span>
                      <span class="sidenav-normal  ms-2  ps-1"> TransferLog </span>
                    </a>
                  </li>
                   <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/admin/get-all-admin-to-master-daily-status-transfer-log') }}">
                      <span class="sidenav-mini-icon"> D S </span>
                      <span class="sidenav-normal  ms-2  ps-1">Daily Status </span>
                    </a>
                  </li>

                   <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/admin/get-all-admin-to-master-monthly-status-transfer-log') }}">
                      <span class="sidenav-mini-icon"> M S </span>
                      <span class="sidenav-normal  ms-2  ps-1">Monthly Status </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
    </li>
    @elseif($role->title == "Master")
    <li class="nav-item">
        <a data-bs-toggle="collapse" href="#masterControl" class="nav-link text-white" aria-controls="pagesExamples" role="button" aria-expanded="false">
          <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">manage_accounts</i>
          <span class="nav-link-text ms-2 ps-1">Master Control</span>
        </a>
        <div class="collapse show" id="pagesExamples">
          <ul class="nav">
            <li class="nav-item ">
              <div class="collapse " id="masterControl">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{ route('admin.agent-list')}}">
                      <span class="sidenav-mini-icon"> <i class="fas fa-users"></i> </span>
                      <span class="sidenav-normal  ms-2  ps-1"> Agent Lists </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/admin/agent-user-play-early-morning') }}">
                      <span class="sidenav-mini-icon"> 2D </span>
                      <span class="sidenav-normal  ms-2  ps-1"> 09:30AM </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/admin/agent-user-play-morning') }}">
                      <span class="sidenav-mini-icon"> 2D </span>
                      <span class="sidenav-normal  ms-2  ps-1"> 12:01PM </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/admin/agent-user-play-early-evening-digit') }}">
                      <span class="sidenav-mini-icon"> 2D </span>
                      <span class="sidenav-normal  ms-2  ps-1"> 02:01PM </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/admin/agent-user-play-evening-digit') }}">
                      <span class="sidenav-mini-icon"> 2D </span>
                      <span class="sidenav-normal  ms-2  ps-1"> 04:30PM </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/admin/agent-three-d-list') }}">
                      <span class="sidenav-mini-icon"> 3D </span>
                      <span class="sidenav-normal  ms-2  ps-1"> 3D </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/admin/get-all-master-to-agent-transfer-log') }}">
                      <span class="sidenav-mini-icon"> T L </span>
                      <span class="sidenav-normal  ms-2  ps-1"> TransferLog </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/admin/get-all-master-to-agent-daily-status-transfer-log') }}">
                      <span class="sidenav-mini-icon"> D S </span>
                      <span class="sidenav-normal  ms-2  ps-1">Daily Status </span>
                    </a>
                  </li>

                   <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/admin/get-all-master-to-agent-monthly-status-transfer-log') }}">
                      <span class="sidenav-mini-icon"> M S </span>
                      <span class="sidenav-normal  ms-2  ps-1">Monthly Status </span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
    </li>
    @elseif($role->title == "Agent")
    <li class="nav-item">
        <a data-bs-toggle="collapse" href="#masterControl" class="nav-link text-white" aria-controls="pagesExamples" role="button" aria-expanded="false">
          <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">manage_accounts</i>
          <span class="nav-link-text ms-2 ps-1">Agent Control</span>
        </a>
        <div class="collapse show" id="pagesExamples">
          <ul class="nav">
            <li class="nav-item ">
              <div class="collapse " id="masterControl">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{ route('admin.agent-user-list')}}">
                      <span class="sidenav-mini-icon"> <i class="fas fa-users"></i> </span>
                      <span class="sidenav-normal  ms-2  ps-1"> User Lists </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/admin/agent-user-play-early-morning') }}">
                      <span class="sidenav-mini-icon"> 2D </span>
                      <span class="sidenav-normal  ms-2  ps-1"> 09:30AM </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/admin/agent-user-play-morning') }}">
                      <span class="sidenav-mini-icon"> 2D </span>
                      <span class="sidenav-normal  ms-2  ps-1"> 12:01PM </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/admin/agent-user-play-early-evening-digit') }}">
                      <span class="sidenav-mini-icon"> 2D </span>
                      <span class="sidenav-normal  ms-2  ps-1"> 02:01PM </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/admin/agent-user-play-evening-digit') }}">
                      <span class="sidenav-mini-icon"> 2D </span>
                      <span class="sidenav-normal  ms-2  ps-1"> 04:30PM </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/admin/agent-three-d-list') }}">
                      <span class="sidenav-mini-icon"> 3D </span>
                      <span class="sidenav-normal  ms-2  ps-1"> 3D </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/admin/get-all-agent-to-user-transfer-log') }}">
                      <span class="sidenav-mini-icon"> T L </span>
                      <span class="sidenav-normal  ms-2  ps-1"> TransferLog </span>
                    </a>
                  </li>

                   <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/admin/get-all-agent-to-user-daily-status-transfer-log') }}">
                      <span class="sidenav-mini-icon"> D S </span>
                      <span class="sidenav-normal  ms-2  ps-1">Daily Status </span>
                    </a>
                  </li>

                   <li class="nav-item">
                    <a class="nav-link text-white " href="{{ url('/admin/get-all-agent-to-user-monthly-status-transfer-log') }}">
                      <span class="sidenav-mini-icon"> M S </span>
                      <span class="sidenav-normal  ms-2  ps-1">Monthly Status </span>
                    </a>
                  </li>
                 
                </ul>
              </div>
            </li>
          </ul>
        </div>
    </li>
    @endif
    @endforeach
    @can('admin_access')
    <li class="nav-item mt-3">
      <h6 class="ps-4  ms-2 text-uppercase text-xs font-weight-bolder text-white">User Management</h6>
    </li>
    <li class="nav-item">
      <a data-bs-toggle="collapse" href="#pagesExample" class="nav-link text-white" aria-controls="pagesExamples" role="button" aria-expanded="false">
        {{-- <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">manage_accounts</i> --}}
        <span class="sidenav-mini-icon">
          <i class="fas fa-users-gear"></i>
        </span>
        <span class="nav-link-text ms-2 ps-1">User Control</span>
      </a>
      <div class="collapse " id="pagesExample">
        <ul class="nav nav-sm flex-column">
          @can('admin_access')
          <li class="nav-item ps-3">
            <a class="nav-link text-white " href="{{ route('admin.permissions.index')}}">
              <span class="sidenav-mini-icon"> 
              <i class="fa-regular fa-circle-check"></i>  
              </span>
              <span class="sidenav-normal  ms-2  ps-1"> Permissions </span>
            </a>
          </li>
          @endcan
          @can('admin_access')
          <li class="nav-item ps-3">
            <a class="nav-link text-white " href="{{ route('admin.roles.index') }}">
              <span class="sidenav-mini-icon"> 
                <i class="fa-solid fa-person-circle-check"></i>
              </span>
              <span class="sidenav-normal  ms-2  ps-1"> User's Roles </span>
            </a>
          </li>
          @endcan
          @can('admin_access')
          <li class="nav-item ps-3">
            <a class="nav-link text-white " href="{{ route('admin.users.index')}}">
              <span class="sidenav-mini-icon"> 
              <i class="fas fa-users"></i>  
              </span>
              <span class="sidenav-normal  ms-2  ps-1"> Users </span>
            </a>
          </li>
          @endcan
        </ul>
      </div>
    </li>
    {{-- lottery --}}
    {{-- lottery --}}
    <li class="nav-item">
      <a data-bs-toggle="collapse" href="#applicationsExamples" class="nav-link text-white " aria-controls="applicationsExamples" role="button" aria-expanded="false">
        <span class="sidenav-mini-icon">
          <i class="fas fa-list-check"></i>
        </span>
        <span class="nav-link-text ms-2 ps-1">2D Control</span>
      </a>
      <div class="collapse " id="applicationsExamples">
        <ul class="nav ">
          @can('admin_access')
          <li class="nav-item ps-3 ">
            <a class="nav-link text-white " href="{{ route('admin.two-d-users-index')}}">
              <span class="sidenav-mini-icon"> 
              <i class="fas fa-users"></i>  
              </span>
              <span class="sidenav-normal  ms-2  ps-1"> 2D Users </span>
            </a>
          </li>
          @endcan
          @can('admin_access')
          <li class="nav-item ps-3 ">
            <a class="nav-link text-white " href="{{ route('admin.twod-records.index')}}">
              <span class="sidenav-mini-icon"> 
              <i class="fas fa-list"></i>  
              </span>
              <span class="sidenav-normal  ms-2  ps-1"> 2D History </span>
            </a>
          </li>
          @endcan
          @can('admin_access')
          <li class="nav-item ps-3 ">
            <a class="nav-link text-white " href="{{ route('admin.tow-d-win-number.index') }}">
              <span class="sidenav-mini-icon"> 
              <i class="fas fa-award"></i>  
              </span>
              <span class="sidenav-normal  ms-2  ps-1">
                <small>ပေါက်ဂဏန်းကြေငြာရန် </small>
              </span>
            </a>
          </li>
          @endcan
          @can('admin_access')
          <li class="nav-item ps-3 ">
            <a class="nav-link text-white " href="{{ url('admin/get-two-d-early-morning-number') }}">
              <span class="sidenav-mini-icon"> 
              <i class="fas fa-clock"></i>  
              </span>
              <span class="sidenav-normal  ms-2  ps-1"> 2D (9:30AM) </span>
            </a>
          </li>
          @endcan
          @can('admin_access')
          <li class="nav-item ps-3 ">
            <a class="nav-link text-white " href="{{ route('admin.tow-d-morning-number.index') }}">
              <span class="sidenav-mini-icon"> <i class="fas fa-clock"></i>   </span>
              <span class="sidenav-normal  ms-2  ps-1"> 2D (12:1PM) </span>
            </a>
          </li>
          @endcan
          @can('admin_access')
          <li class="nav-item ps-3 ">
            <a class="nav-link text-white " href="{{ url('admin/get-two-d-early-evening-number') }}">
              <span class="sidenav-mini-icon"> <i class="fas fa-clock"></i> </span>
              <span class="sidenav-normal  ms-2  ps-1"> 2D (2:30PM) </span>
            </a>
          </li>
          @endcan
          @can('admin_access')
          <li class="nav-item ps-3 ">
            <a class="nav-link text-white " href="{{ route('admin.eveningNumber') }}">
              <span class="sidenav-mini-icon"> <i class="fas fa-clock"></i> </span>
              <span class="sidenav-normal  ms-2  ps-1"> 2D (4:30PM) </span>
            </a>
          </li>
          @endcan
          @can('admin_access')
          <li class="nav-item ps-3 ">
            <a class="nav-link text-white " href="{{ url('admin/two-d-early-morning-winner') }}">
              <span class="sidenav-mini-icon"> <i class="fa-solid fa-medal"></i> </span>
              <span class="sidenav-normal  ms-2  ps-1"> 2D (9:30AM) </span>
            </a>
          </li>
          @endcan
          @can('admin_access')
          <li class="nav-item ps-3 ">
            <a class="nav-link text-white " href="{{ route('admin.morningWinner') }}">
              <span class="sidenav-mini-icon"> <i class="fa-solid fa-medal"></i> </span>
              <span class="sidenav-normal  ms-2  ps-1"> 2D (12:1PM) </span>
            </a>
          </li>
          @endcan

          @can('admin_access')
          <li class="nav-item ps-3 ">
            <a class="nav-link text-white " href="{{ url('admin/two-d-early-evening-winner') }}">
              <span class="sidenav-mini-icon"> <i class="fa-solid fa-medal"></i> </span>
              <span class="sidenav-normal  ms-2  ps-1"> 2D (2:30PM) </span>
            </a>
          </li>
          @endcan
          @can('admin_access')
          <li class="nav-item ps-3 ">
            <a class="nav-link text-white " href="{{ route('admin.eveningWinner') }}">
              <span class="sidenav-mini-icon"> <i class="fa-solid fa-medal"></i> </span>
              <span class="sidenav-normal  ms-2  ps-1"> 2D (4:30PM) </span>
            </a>
          </li>
          @endcan
          @can('admin_access')
          <li class="nav-item ps-3 ">
            <a class="nav-link text-white " href="{{ route('admin.fill-balance-replies.index') }}">
              <span class="sidenav-mini-icon"> <i class="fa-solid fa-money-bill"></i> </span>
              <span class="sidenav-normal  ms-2  ps-1"> Balance Accept </span>
            </a>
          </li>
          @endcan
          @can('admin_access')
          <li class="nav-item ps-3 ">
            <a class="nav-link text-white " href="{{ route('admin.withdrawViewGet') }}">
              <span class="sidenav-mini-icon"> <i class="fa-solid fa-money-bill-transfer"></i> </span>
              <span class="sidenav-normal  ms-2  ps-1"> Balance Withdraw </span>
            </a>
          </li>
          @endcan
          @can('user_access')
          <li class="nav-item ps-3 ">
            <a class="nav-link text-white " href="{{ route('admin.CloseTwoD') }}">
              <span class="sidenav-mini-icon"> <i class="fa-solid fa-door-closed"></i> </span>
              <span class="sidenav-normal  ms-2  ps-1"> CloseTwoD </span>
            </a>
          </li>
          @endcan
          @can('admin_access')
          <li class="nav-item ps-3 ">
            <a class="nav-link text-white " href="{{ route('admin.SessionResetIndex') }}">
              <span class="sidenav-mini-icon"> <i class="fa-solid fa-rotate"></i> </span>
              <span class="sidenav-normal  ms-2  ps-1"> SessionReset</span>
            </a>
          </li>
          @endcan
          @can('admin_access')
          <li class="nav-item ps-3 ">
            <a class="nav-link text-white " href="{{ route('admin.two-d-play-noti') }}">
              <span class="sidenav-mini-icon"> <i class="fas fa-bell"></i> </span>
              <span class="sidenav-normal  ms-2  ps-1"> Notifications</span>
            </a>
          </li>
          @endcan
        </ul>
      </div>
    </li>
    
    {{-- end lottery --}}
    {{-- end lottery --}}

    {{-- 2d over amount limit --}}
    <li class="nav-item ">
      <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#productsExample">
        <span class="sidenav-mini-icon"> <i class="fas fa-paper-plane"></i> </span>
        <span class="sidenav-normal  ms-2  ps-1"> 2D Over Limit <b class="caret"></b></span>
      </a>
      <div class="collapse " id="productsExample">
        <ul class="nav nav-sm flex-column">
          <li class="nav-item">
            <a class="nav-link text-white " href="{{ url('admin/get-two-d-early-morning-number-over-amount-limit')}}">
              <span class="sidenav-mini-icon"> 2D </span>
              <span class="sidenav-normal  ms-2  ps-1"> 9:30 OverLimit </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="{{ url('admin/get-two-d-morning-number-over-amount-limit') }}">
              <span class="sidenav-mini-icon"> 2D </span>
              <span class="sidenav-normal  ms-2  ps-1"> 12:1 OverLimit </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="{{ url('admin/get-two-d-early-evening-number-over-amount-limit')}}">
              <span class="sidenav-mini-icon"> 2D </span>
              <span class="sidenav-normal  ms-2  ps-1"> 2 : OverLimit </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="{{ url('admin/get-two-d-evening-number-over-amount-limit') }}">
              <span class="sidenav-mini-icon"> 2D </span>
              <span class="sidenav-normal  ms-2  ps-1">4:30 OverLimit </span>
            </a>
          </li>
        </ul>
      </div>
    </li>
    {{-- 2d over amount limit --}}
    <li class="nav-item ">
      <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#threed">
        <span class="sidenav-mini-icon"> <i class="fas fa-list-check"></i> </span>
        <span class="sidenav-normal  ms-2  ps-1"> 3D Control <b class="caret"></b></span>
      </a>
      <div class="collapse " id="threed">
        <ul class="nav nav-sm flex-column">
          <li class="nav-item">
            <a class="nav-link text-white " href="{{ url('admin/three-d-history')}}">
              <span class="sidenav-mini-icon"> 3D </span>
              <span class="sidenav-normal  ms-2  ps-1"> <small>ထွက်ဂဏန်းများ </small> </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="{{ url('admin/threed-lotteries-match-time') }}">
              <span class="sidenav-mini-icon"> <i class="fas fa-calendar"></i> </span>
              <span class="sidenav-normal  ms-2  ps-1"> <small>ဖွင့်ရက် </small> </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="{{ url('/admin/three-d-prize-number-create') }}">
              <span class="sidenav-mini-icon"> <i class="fas fa-award"></i> </span>
              <span class="sidenav-normal  ms-2  ps-1"> <small>ပေါက်ဂဏန်းကြေငြာရန် </small> </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="{{ url('/admin/three-d-list-index') }}">
              <span class="sidenav-mini-icon"> 3D </span>
              <span class="sidenav-normal  ms-2  ps-1"> <small>ထိုးစာရင်းများ </small> </span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white " href="{{ url('/admin/three-d-winner') }}">
              <span class="sidenav-mini-icon"> 3D </span>
              <span class="sidenav-normal  ms-2  ps-1"> <small>ကံထူးရှင်များ </small> </span>
            </a>
          </li>
        </ul>
      </div>
    </li>
    {{-- <li class="nav-item">
      <a data-bs-toggle="collapse" href="#ecommerceExamples" class="nav-link text-white " aria-controls="ecommerceExamples" role="button" aria-expanded="false">
        <i class="material-icons-round {% if page.brand == 'RTL' %}ms-2{% else %} me-2{% endif %}">shopping_basket</i>
        <span class="sidenav-mini-icon">
          <i class="fas fa-list-check"></i>
        </span>
        <span class="nav-link-text ms-2 ps-1">3D Control</span>
      </a>
      <div class="collapse " id="ecommerceExamples">
        <ul class="nav ">

          <li class="nav-item ">
            <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#ordersExample">
              <span class="sidenav-mini-icon"> O </span>
              <span class="sidenav-normal  ms-2  ps-1"> Orders <b class="caret"></b></span>
            </a>
            <div class="collapse " id="ordersExample">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a class="nav-link text-white " href="../../pages/ecommerce/orders/list.html">
                    <span class="sidenav-mini-icon"> O </span>
                    <span class="sidenav-normal  ms-2  ps-1"> Order List </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white " href="../../pages/ecommerce/orders/details.html">
                    <span class="sidenav-mini-icon"> O </span>
                    <span class="sidenav-normal  ms-2  ps-1"> Order Details </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-white " href="../../pages/ecommerce/referral.html">
              <span class="sidenav-mini-icon"> R </span>
              <span class="sidenav-normal  ms-2  ps-1"> Referral </span>
            </a>
          </li>
        </ul>
      </div>
    </li> --}}

    {{-- Football  --}}

    <li class="nav-item">
      <a data-bs-toggle="collapse" href="#footballNav" class="nav-link text-white " aria-controls="footballNav" role="button" aria-expanded="false">
        <span class="sidenav-mini-icon"> 
        <i class="fas fa-basketball"></i>
        </span>
        <span class="nav-link-text ms-2 ps-1">ဘောလုံး</span>
      </a>
      <div class="collapse " id="footballNav">
        <ul class="nav ">
          <li class="nav-item ">
            <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#mmFootball">
              <span class="sidenav-mini-icon"> MP </span>
              <span class="sidenav-normal  ms-2  ps-1"> မောင်းပွဲ <b class="caret"></b></span>
            </a>
            <div class="collapse " id="mmFootball">
              <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                  <a class="nav-link text-white " href="{{ route('admin.mpbetlist')}}" >
                    <span class="sidenav-mini-icon"> B </span>
                    <span class="sidenav-normal  ms-2  ps-1"> လောင်းပွဲများ </span>
                  </a>
                </li>
              
                <li class="nav-item">
                  <a class="nav-link text-white " href="{{ route('admin.mpprofitloss')}}" >
                    <span class="sidenav-mini-icon"> PL </span>
                    <span class="sidenav-normal  ms-2  ps-1"> နိုင်/ရှုံး </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item ">
            <a class="nav-link text-white " data-bs-toggle="collapse" aria-expanded="false" href="#mpFootball">
              <span class="sidenav-mini-icon"> MM </span>
              <span class="sidenav-normal  ms-2  ps-1"> မြန်မာကြေး <b class="caret"></b></span>
            </a>
            <div class="collapse " id="mpFootball">
              <ul class="nav nav-sm flex-column">
              
                <li class="nav-item">
                  <a class="nav-link text-white " href="{{ route('admin.mmbetlist')}}" >
                    <span class="sidenav-mini-icon"> B </span>
                    <span class="sidenav-normal  ms-2  ps-1"> လောင်းပွဲများ </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-white " href="{{ route('admin.mmprofitloss')}}" >
                    <span class="sidenav-mini-icon"> PL </span>
                    <span class="sidenav-normal  ms-2  ps-1"> နှိုင်/ရှုံး </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
                  <a class="nav-link text-white " href="{{ route('admin.fixture')}}" >
                    <span class="sidenav-mini-icon"> F </span>
                    <span class="sidenav-normal  ms-2  ps-1"> ပွဲစဥ်များ </span>
                  </a>
                </li>
          <li class="nav-item ">
            <a class="nav-link text-white " href="{{ route('admin.fconfig') }}">
              <span class="sidenav-mini-icon"> R </span>
              <span class="sidenav-normal  ms-2  ps-1"> Football Configure </span>
            </a>
          </li>
        </ul>
      </div>
    </li>
    @endcan

    <li class="nav-item">
      <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link text-white">
        <span class="sidenav-mini-icon"> 
        <i class="fas fa-right-from-bracket"></i>  
        </span>
        <span class="sidenav-normal ms-2 ps-1">Logout</span>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    </li>

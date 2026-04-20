<!DOCTYPE html>
<html lang="en" data-textdirection="ltr" class="loading">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta name="description" content="Krishna Chikan">
  <meta name="keywords" content="Krishna Chikan">
  <meta name="author" content="Webmingo">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>Admin Dashboard</title>
  <!--  <title>Krishna Chikan | @yield('title')</title> -->


  <!-- BEGIN VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <!-- END VENDOR CSS-->
  <link rel="stylesheet" type="text/css" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css">
  <!-- END STACK CSS-->
  <!-- BEGIN Page Level CSS-->
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/css/datatable.css') }}">
  <!-- END Page Level CSS-->
  <!-- BEGIN Custom CSS-->
  <!-- END Custom CSS-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.10.4/sweetalert2.min.css">
  <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/custom/css/header.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/custom/css/style.css') }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>

  </script>
  <style>
   .jd-sidebar {
    width: 280px;
    background: #ffffff;
    color: #1e293b;
    border-right: 1px solid #e2e8f0;
}

.jd-header {
    border-bottom: 1px solid #e2e8f0;
}

/* Menu */
.jd-menu {
    list-style: none;
    padding: 0;
    margin: 0;
}

.jd-item {
    border-bottom: 1px solid #e2e8f0; /* separator */
}

/* Links */
.jd-item a {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 12px 15px;
    color: #334155;
    text-decoration: none;
    font-weight: 500;
    transition: 0.3s;
}

.jd-item a:hover {
    background: #f1f5f9;
    color: #2563eb;
}

/* Active */
.jd-item.active > a {
    background: #2563eb;
    color: #fff;
}

/* Icons */
.jd-item i {
    width: 20px;
}

/* Dropdown */
.jd-submenu {
    list-style: none;
    padding-left: 40px;
    display: none;
    background: #f8fafc;
}

.jd-submenu li a {
    padding: 8px 10px;
    font-size: 14px;
    color: #64748b;
}

.jd-submenu li a:hover {
    color: #2563eb;
}

/* Arrow */
.jd-arrow {
    margin-left: auto;
    transition: 0.3s;
}

.jd-item.open > a .jd-arrow {
    transform: rotate(180deg);
}

/* Logo */
.jd-logo {
    height: 40px;
    object-fit: contain;
}

/* Menu Button (mobile only) */
.jd-menu-btn {
    font-size: 20px;
    border: none;
    background: #f9f9f9;
    color: #000;
    padding: 8px 10px;
    border-radius: 6px;
    transition: 0.3s;
}

.jd-menu-btn:hover {
    background: #1d4ed8;
}

/* Hide menu button on desktop */
@media (min-width: 992px) {
    .jd-menu-btn {
        display: none;
    }
}

/* User Button */
.jd-user-btn {
    background: transparent;
    border: none;
    color: #334155;
    font-weight: 500;
}

.jd-user-btn i {
    font-size: 18px;
}

/* Dropdown */
.jd-dropdown {
    min-width: 180px;
    border-radius: 8px;
    padding: 6px;
}

.jd-dropdown .dropdown-item {
    border-radius: 6px;
    padding: 8px 10px;
}

.jd-dropdown .dropdown-item:hover {
    background: #f1f5f9;
}


  </style>
</head>

<body>


 <div class="top-header-sec jd-header py-2 bg-light border-bottom mb-2">
  <div class="container-fluid">
    <div class="d-flex align-items-center justify-content-between">

      <!-- LEFT: Logo -->
      <div class="admin-logo">
        <img src="{{ asset('images/bayepurbazaar-logo.jpeg') }}" class="jd-logo">
      </div>

      <!-- RIGHT SIDE -->
      <div class="d-flex align-items-center gap-3">

        <!-- MOBILE MENU ICON -->
       

        <!-- USER DROPDOWN -->
        <div class="btn-group">
          <button class="btn jd-user-btn dropdown-toggle" type="button" data-bs-toggle="dropdown">
            <i class="fa-solid fa-user-circle"></i>
            <span class=" d-md-inline">Admin</span>
          </button>

          <div class="dropdown-menu dropdown-menu-end jd-dropdown">
            <a class="dropdown-item" href="{{ url('admin/profile-setting') }}">
              <i class="fa-solid fa-user me-2"></i> Profile
            </a>

            <a class="dropdown-item" href="{{ url('admin/logout') }}">
              <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
            </a>
          </div>
        </div>
         <button class="jd-menu-btn d-lg-none" type="button"
          data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">
          <i class="fa-solid fa-bars"></i>
        </button>

      </div>

    </div>
  </div>
</div>

  




<div class="offcanvas offcanvas-start jd-sidebar" tabindex="-1" id="offcanvasExample">
  
  <div class="offcanvas-header jd-header">
    <h5 class="offcanvas-title">Admin Panel</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
  </div>

  <div class="offcanvas-body jd-body">

    <ul class="jd-menu">

      <!-- Dashboard -->
      <li class="jd-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <a href="{{ route('admin.dashboard') }}">
          <i class="fa-solid fa-gauge"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <!-- Master -->
      <li class="jd-item jd-has-dropdown">
        <a href="#">
          <i class="fa-solid fa-database"></i>
          <span>Master</span>
          <i class="fa-solid fa-chevron-down jd-arrow"></i>
        </a>

        <ul class="jd-submenu">
          <li><a href="{{ route('admin.locations.index') }}">Manage Location</a></li>
          <li><a href="{{ route('admin.categories.index') }}">Manage Categories</a></li>
          <li><a href="{{ route('admin.subcategories.index') }}">Manage Sub Categories</a></li>
          <li><a href="{{ route('admin.mandals.index') }}">Manage Mandals</a></li>
        </ul>
      </li>

      <!-- Listing -->
      <li class="jd-item jd-has-dropdown">
        <a href="#">
          <i class="fa-solid fa-list"></i>
          <span>Listing & Members</span>
          <i class="fa-solid fa-chevron-down jd-arrow"></i>
        </a>

        <ul class="jd-submenu">
          <li><a href="{{ route('admin.listings.index') }}">Manage Listing</a></li>
          <li><a href="{{ route('admin.mandal-members.index') }}">Manage Mandal Members</a></li>
        </ul>
      </li>

      <!-- Blogs -->
      <li class="jd-item jd-has-dropdown">
        <a href="#">
          <i class="fa-solid fa-blog"></i>
          <span>FAQ & Blogs</span>
          <i class="fa-solid fa-chevron-down jd-arrow"></i>
        </a>

        <ul class="jd-submenu">
          <li><a href="{{ route('admin.faqs.index') }}">Manage FAQ</a></li>
          <li><a href="{{ route('admin.blogs.index') }}">Manage Blogs</a></li>
        </ul>
      </li>

      <!-- Contact -->
      <li class="jd-item">
        <a href="{{ route('admin.contacts.index') }}">
          <i class="fa-solid fa-envelope"></i>
          <span>Contact Enquiries</span>
        </a>
      </li>

      <!-- Separator -->
      <div class="jd-separator"></div>

      <!-- Content -->
      <li class="jd-item jd-has-dropdown">
        <a href="#">
          <i class="fa-solid fa-layer-group"></i>
          <span>Content</span>
          <i class="fa-solid fa-chevron-down jd-arrow"></i>
        </a>

        <ul class="jd-submenu">
          <li><a href="{{ route('admin.home-intro.edit') }}">Introduction</a></li>
          <li><a href="{{ route('admin.home-hero.edit') }}">Hero Section</a></li>
          <li><a href="{{ route('admin.settings.edit') }}">Contact Page</a></li>
          <li><a href="{{ route('admin.about.edit') }}">About Us</a></li>
          <li><a href="{{ route('admin.why.edit') }}">Why Choose Us</a></li>
          <li><a href="{{ route('admin.pages.index') }}">Dynamic Pages</a></li>
        </ul>
      </li>

    </ul>

  </div>
</div>

<script>
   document.querySelectorAll(".jd-has-dropdown > a").forEach(item => {
    item.addEventListener("click", function(e) {
        e.preventDefault();

        let current = this.parentElement;

        // Close all
        document.querySelectorAll(".jd-has-dropdown").forEach(el => {
            if (el !== current) {
                el.classList.remove("open");
                el.querySelector(".jd-submenu").style.display = "none";
            }
        });

        // Toggle current
        current.classList.toggle("open");

        let submenu = current.querySelector(".jd-submenu");

        if (current.classList.contains("open")) {
            submenu.style.display = "block";
        } else {
            submenu.style.display = "none";
        }
    });
});


</script>

  <script type="text/javascript">
    jQuery('.dropdown-menu.keep-open').on('click', function (e) {
      e.stopPropagation();
    });

    if (1) {
      $('body').attr('tabindex', '0');
    }
    else {
      alertify.confirm().set({ 'reverseButtons': true });
      alertify.prompt().set({ 'reverseButtons': true });
    }
  </script>
  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
          <div class="sidebar-brand-icon rotate-n-15">
              <i class="fas fa-laugh-wink"></i>
          </div>
          <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
          <a class="nav-link" href="/first">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
          Interface
      </div>

      <li class="nav-item">
          <a class="nav-link" href="{{ route('city') }}">
              <i class="fa fa-city"></i>
              <span>City</span></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ route('store_category') }}">
              <i class="fa fa-warehouse"></i>
              <span>Store Category</span></a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.store') }}">
              <i class="fa fa-regular fa-store"></i>
              <span>Store</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.itemcategory') }}">
            <i class="bi bi-tags-fill"></i>
            <span>Item Category</span></a>
    </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ route('admin.item') }}">
              <i class="bi bi-cart3"></i>
              <span>Item</span></a>
      </li>



      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
          <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>



  </ul>
  <!-- End of Sidebar -->

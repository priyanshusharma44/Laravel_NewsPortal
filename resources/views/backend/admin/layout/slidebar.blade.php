  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

<!-- Sidebar -->
<div class="sidebar">
  <!-- Sidebar user panel (optional) -->
  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
      <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
    </div>
    <div class="info">
     @if (Auth::check())
            <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        @else
            <a href="#" class="d-block">Guest</a>
        @endif
    </div>
  </div>



  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Dashboard -->
      <li class="nav-item menu-open">
        <a href="#" class="nav-link active">
          <i class="nav-icon fas fa-tachometer-alt"></i>
          <p>
            Dashboard
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <!-- Articles -->
<li class="nav-item">
    <a href="{{ route('articles.index') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Articles</p>
    </a>
</li>
<!-- Comments -->
<li class="nav-item">
    <a href="{{ route('comments.index') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Comments</p>
    </a>
</li>
<!-- Categories -->
<li class="nav-item">
    <a href="{{ route('categories.index') }}" class="nav-link">
        <i class="far fa-circle nav-icon"></i>
        <p>Categories</p>
    </a>
</li>
 <li class="nav-item">
                    <a href="{{ route('tags.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tag"></i>
                        <p>
                            Tags
                        </p>
                    </a>
                </li>

        </ul>
      </li>

      <!-- Widgets -->
      
      <!-- Layout Options -->
      

    <!-- /.sidebar -->
  </aside>
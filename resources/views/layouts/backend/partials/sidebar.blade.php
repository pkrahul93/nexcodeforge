 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="{{ url('dashboard') }}" class="brand-link">
     <img src="{{ asset('backend/assets/img/logoh.png') }}" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-light">NexCodeForge</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       {{-- <div class="image">
         <img src="assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
       </div> --}}
       <div class="info">
         <a href="javascript:void(0)" class="d-block">{{ Auth::user()->name }}</a>
       </div>
     </div>

     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
         <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         <li class="nav-item menu-open">
           <a href="{{ url('dashboard') }}" class="nav-link active">
             <i class="nav-icon fas fa-tachometer-alt"></i>
             <p>
               Dashboard
             </p>
           </a>
         </li>
         {{-- <li class="nav-item">
           <a href="pages/widgets.html" class="nav-link">
             <i class="nav-icon fas fa-th"></i>
             <p>
               Widgets
               <span class="right badge badge-danger">New</span>
             </p>
           </a>
         </li> --}}
         <li class="nav-header">PROMOTIONS</li>
         <li class="nav-item">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-table"></i>
             <p>
               All Promotions
               <i class="fas fa-angle-left right"></i>
               <span class="right badge badge-danger">New</span>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="pages/tables/simple.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Create New Promotion</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/tables/data.html" class="nav-link">
                 <i class="far fa-circle nav-icon"></i>
                 <p>All Promotions</p>
               </a>
             </li>
           </ul>
         </li>
         <li class="nav-header">ENQUIRIES</li>
         <li class="nav-item {{ isActive(['all-contacts', 'all-promotional-enquries', 'all-general-enquries'], 'menu-is-opening menu-open') }}">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-envelope"></i>
             <p>
               All Enquiries
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
            <li class="nav-item">
               <a href="{{ url('all-contacts') }}" class="nav-link {{ isActive(['all-contacts'], 'active') }}">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Contact Enquiries</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{ url('all-promotional-enquries') }}" class="nav-link {{ isActive(['all-promotional-enquries'], 'active') }}">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Promotional Enquiries</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{ url('all-general-enquries') }}" class="nav-link {{ isActive(['all-general-enquries'], 'active') }}">
                 <i class="far fa-circle nav-icon"></i>
                 <p>General Enquiries</p>
               </a>
             </li>
           </ul>
         </li>
        <li class="nav-header">TAGS</li>
         <li class="nav-item {{ isActive(['manage-tag', 'tags'], 'menu-is-opening menu-open') }}">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-table"></i>
             <p>
               Tag Manager
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="{{ url('tags') }}" class="nav-link {{ isActive(['tags'], 'active') }}">
                 <i class="far fa-circle nav-icon"></i>
                 <p>All Tags</p>
               </a>
             </li>
           </ul>
         </li>

         <li class="nav-header">CATEGORIES</li>
         <li class="nav-item {{ isActive(['categories'], 'menu-is-opening menu-open') }}">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-table"></i>
             <p>
               Category Manager
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="{{ url('categories') }}" class="nav-link {{ isActive(['categories'], 'active') }}">
                 <i class="far fa-circle nav-icon"></i>
                 <p>All Categories</p>
               </a>
             </li>
           </ul>
         </li>

         <li class="nav-header">BLOGS</li>
         <li class="nav-item {{ isActive(['add-blog', 'all-blogs'], 'menu-is-opening menu-open') }}">
           <a href="#" class="nav-link">
             <i class="nav-icon fas fa-table"></i>
             <p>
               Blog Manager
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="{{ url('add-blog') }}" class="nav-link {{ isActive(['add-blog'], 'active') }}">
                 <i class="far fa-circle nav-icon"></i>
                 <p>Create New Blog</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="{{ url('all-blogs') }}" class="nav-link {{ isActive(['all-blogs'], 'active') }}">
                 <i class="far fa-circle nav-icon"></i>
                 <p>All Blogs</p>
               </a>
             </li>
           </ul>
         </li>


         <li class="nav-item signout">
           <a href="{{ url('logout') }}" class="nav-link bg-danger">
             <i class="nav-icon fas fa-sign-out-alt"></i>
             <p>Logout</p>
           </a>
         </li>
       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>

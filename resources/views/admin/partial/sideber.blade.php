<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" data-key="t-menu">Menu</li>

                <li>
                    <a href="{{route('admin.dashboard')}}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">Dashboard</span>
                    </a>
                </li>

                
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i> <!-- Category icon -->
                        <span data-key="t-authentication">Product Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.categories.index')}}" data-key="t-login">Category</a></li>
                        {{-- <li><a href="{{route('admin.categories.create')}}" data-key="t-register">Add Category</a></li> --}}
                        <li><a href="{{route('admin.categoryCustomFields.index')}}" data-key="t-register">Custom Feild</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="box"></i> <!-- Product icon -->
                        <span data-key="t-authentication">Products</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.products.index')}}" data-key="t-login">Products</a></li>
                        <li><a href="{{route('admin.products.create')}}" data-key="t-register">Add Product</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{route('admin.order-history')}}">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard">orders</span>
                    </a>
                </li>
                

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="file-text"></i>
                        <span data-key="t-pages">Pages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="pages-starter.html" data-key="t-starter-page">Starter Page</a></li>
                        <li><a href="pages-404.html" data-key="t-error-404">Error 404</a></li>
                        
                    </ul>
                </li>

    
                

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="share-2"></i>
                        <span data-key="t-multi-level">Multi Level</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="javascript: void(0);" data-key="t-level-1-1">Level 1.1</a></li>
                        <li>
                            <a href="javascript: void(0);" class="has-arrow" data-key="t-level-1-2">Level 1.2</a>
                            <ul class="sub-menu" aria-expanded="true">
                                <li><a href="javascript: void(0);" data-key="t-level-2-1">Level 2.1</a></li>
                                <li><a href="javascript: void(0);" data-key="t-level-2-2">Level 2.2</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>

            
        </div>
        <!-- Sidebar -->
    </div>
</div>
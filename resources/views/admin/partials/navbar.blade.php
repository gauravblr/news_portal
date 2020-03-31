<nav class="pcoded-navbar">
    <div class="pcoded-inner-navbar main-menu">
        <div class="pcoded-navigatio-lavel">Navigation</div>
        <ul class="pcoded-item pcoded-left-item">
            <li class="">
                <a href="{{ url('/admin/dashboard') }}">
                    <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                </a>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-edit-1"></i></span>
                    <span class="pcoded-mtext">Posts</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" pcoded-hasmenu">
                    <li class="">
                        <a href="{{ route('posts.create') }}">
                            <span class="pcoded-mtext">Add New</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('posts.index') }}">
                            <span class="pcoded-mtext">posts</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('category.index') }}">
                            <span class="pcoded-mtext">categories</span>
                        </a>
                    </li>
                    </li>
                </ul>
            </li>
            <li class="">

                <a href="/{{ Auth::user()->role }}/fileupload">
                    <span class="pcoded-micon"><i class="feather icon-upload-cloud"></i></span>
                    <span class="pcoded-mtext">File Upload</span>
                </a>
            </li>
            <li class="">
                <a href="{{--{{ route('popups.create') }}--}}">
                    <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                    <span class="pcoded-mtext">Pop up</span>
                </a>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-users"></i></span>
                    <span class="pcoded-mtext">Users</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" pcoded-hasmenu">
                    <li class="">
                        <a href="{{ route('users.create') }}">
                            <span class="pcoded-mtext">Add New</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('users.index') }}">
                            <span class="pcoded-mtext">All users</span>
                        </a>
                    </li>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="icofont icofont-comment"></i></span>
                    <span class="pcoded-mtext">Comments</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" pcoded-hasmenu">
                    <li class="">
                        <a href="{{ route('approve_comment') }}">
                            <span class="pcoded-mtext">Approved comment</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('unapprove_comment') }}">
                            <span class="pcoded-mtext">Unapprove comment</span>
                        </a>
                    </li>
                    </li>
                </ul>
            </li>
            <li class="pcoded-hasmenu">
                <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-eye"></i></span>
                    <span class="pcoded-mtext">Admin</span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" pcoded-hasmenu">
                        <li class="pcoded-hasmenu pcoded-trigger" dropdown-icon="style1" subitem-icon="style1">
                            <a href="javascript:void(0)">
                            <span class="pcoded-mtext">Security</span>
                            </a>
                            <ul class="pcoded-submenu">
                                <li class="">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-mtext">Roles</span>
                                </a>
                                </li>
                                <li class="">
                                <a href="javascript:void(0)">
                                    <span class="pcoded-mtext">Permission</span>
                                </a>
                                </li>
                            </ul>
                        </li>
                    <li class="">
                        <a href="{{ route('posts.index') }}">
                            <span class="pcoded-mtext">Settings</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ url('/admin/sensitive') }}">
                            <span class="pcoded-mtext">Sensitive Data</span>
                        </a>
                    </li>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

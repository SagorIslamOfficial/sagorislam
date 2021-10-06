<div class="left-side-menu">
    <div class="h-100" data-simplebar>
        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <ul id="side-menu">
                <li class="menu-title">Navigation</li>
                <li>
                    <a href="{{ route('dashboard') }}">
                        <i data-feather="airplay"></i>
                        <span> Dashboards </span>
                    </a>
                </li>

                <li class="menu-title mt-2">Components</li>

                <li>
                    <a href="{{ route('home.index') }}">
                        <i data-feather="home"></i>
                        <span> Home </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('headings.index') }}">
                        <i data-feather="file-text"></i>
                        <span> Headings </span>
                    </a>
                </li>

                <li>
                    <a href="#about" data-toggle="collapse">
                        <i data-feather="check-circle"></i>
                        <span> About </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="about">
                        <ul class="nav-second-level">
                            <li><a href="{{ route('about-us.index') }}">About Us</a></li>
                            <li><a href="{{ route('skill.index') }}">Skills</a></li>
                            <li><a href="{{ route('fact.index') }}">Facts</a></li>
                            <li><a href="{{ route('feedback.index') }}">Feedback</a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{ route('resume.index') }}">
                        <i data-feather="paperclip"></i>
                        <span> Resume </span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('service.index') }}">
                        <i data-feather="gift"></i>
                        <span> Service </span>
                    </a>
                </li>

                <li>
                    <a href="#portfolio" data-toggle="collapse">
                        <i data-feather="gift"></i>
                        <span> Portfolio </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="portfolio">
                        <ul class="nav-second-level">
                            <li><a href="{{ route('category.index') }}">Category</a></li>
                            <li><a href="{{ route('item.index') }}">Item</a></li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="{{ route('contact.index') }}">
                        <i data-feather="navigation"></i>
                        <span> Contact </span>
                    </a>
                </li>


                <li class="menu-title">User Setting</li>
                <li>
                    <a href="{{ route('user.index') }}">
                        <i data-feather="settings"></i>
                        <span> User Profile </span>
                    </a>
                </li>

            </ul>
        </div>
        <!-- End Sidebar -->
        <div class="clearfix"></div>
    </div>
    <!-- Sidebar -left -->
</div>

<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        {{-- -- HeroSection -- --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('hero') }}">
                <i class="bi bi-person"></i>
                <span>Hero</span>
            </a>
        </li>

        {{-- Skills Section --}}
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#skills-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>Skills</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="skills-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href=" {{ route('addSkills') }} ">
                        <i class="bi bi-circle"></i><span>Add Skills</span>
                    </a>
                </li>

                <li>
                    <a href=" {{ route('showSkills') }} ">
                        <i class="bi bi-circle"></i><span>Show Skills</span>
                    </a>
                </li>
            </ul>
        </li>
        {{-- End Skills Section --}}


        {{-- PortFolio Section --}}
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#portfolio-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>PortFolio</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="portfolio-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href=" {{ route('addPortfolioCategory') }} ">
                        <i class="bi bi-circle"></i><span>Add a Category</span>
                    </a>
                </li>

                <li>
                    <a href=" {{ route('insertPortfolioEntry') }} ">
                        <i class="bi bi-circle"></i><span>Insert a Entry</span>
                    </a>
                </li>
            </ul>
        </li>
        {{-- End portfolio Section --}}


        {{-- Services Section --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('insertService') }}">
                <i class="bi bi-person"></i>
                <span>Services</span>
            </a>
        </li><!-- End Services Page Nav -->


        {{-- Testimonial Section --}}
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('insertTestmonial') }}">
                <i class="bi bi-person"></i>
                <span>Testimonials</span>
            </a>
        </li><!-- End Testimonial Page Nav -->

         {{-- About Section --}}
         <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('about') }}">
              <i class="bi bi-person"></i>
              <span>About</span>
          </a>
      </li><!-- End About Page Nav -->



        {{-- Resume Section --}}

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#resume-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-menu-button-wide"></i><span>PortFolio</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="resume-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href=" {{ route('addPortfolioCategory') }} ">
                        <i class="bi bi-circle"></i><span>Add a Category</span>
                    </a>
                </li>

                <li>
                    <a href=" {{ route('insertPortfolioEntry') }} ">
                        <i class="bi bi-circle"></i><span>Insert a Entry</span>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link collapsed" href="{{ route('resume') }}">
              <i class="bi bi-person"></i>
              <span>Resume</span>
          </a>
      </li><!-- End Resume Page Nav -->




       
        

        

     

        <li class="nav-heading">Pages</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.profile') }}">
                <i class="bi bi-person"></i>
                <span>Profile</span>
            </a>
        </li><!-- End Profile Page Nav -->

    </ul>

</aside><!-- End Sidebar-->

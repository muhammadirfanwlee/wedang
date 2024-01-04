  <!-- Navbar start -->
  <div class="container-fluid nav-bar ">
    <div class="container">
      <nav class="navbar navbar-light navbar-expand-lg py-4 navbar-fixed-top">
        <a href="/" class="navbar-brand">
          <h1 class="text-primary fw-bold mb-0">Toko<span class="text-dark">Kue</span> </h1>
        </a>
        <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
          <span class="fa fa-bars text-primary"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <div class="navbar-nav mx-auto">
            <a href="/" class="nav-item nav-link active">Home</a>
            <a href="{{ URL::to('login') }}" class="nav-item nav-link">Login</a>
            <a href="service.html" class="nav-item nav-link">Services</a>
            <a href="event.html" class="nav-item nav-link">Events</a>
            <a href="menu.html" class="nav-item nav-link">Menu</a>
            <div class="nav-item dropdown">
              <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
              <div class="dropdown-menu bg-light">
                <a href="book.html" class="dropdown-item">Booking</a>
                <a href="blog.html" class="dropdown-item">Our Blog</a>
                <a href="team.html" class="dropdown-item">Our Team</a>
                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                <a href="404.html" class="dropdown-item">404 Page</a>
              </div>
            </div>
            <a href="contact.html" class="nav-item nav-link">Contact</a>
          </div>
          <button class="btn-search btn btn-primary btn-md-square me-4 rounded-circle d-none d-lg-inline-flex" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fas fa-search"></i></button>
          <a href="" class="btn btn-primary py-2 px-4 d-none d-xl-inline-block rounded-pill">Book Now</a>
        </div>
      </nav>
    </div>
  </div>
  <!-- Navbar End -->


  <!-- Modal Search Start -->
  <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
      <div class="modal-content rounded-0">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Search by keyword</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex align-items-center">
          <div class="input-group w-75 mx-auto d-flex">
            <input type="search" class="form-control bg-transparent p-3" placeholder="keywords" aria-describedby="search-icon-1">
            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal Search End -->
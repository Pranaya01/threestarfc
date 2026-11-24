<section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="aim float-left">
        <i class="icofont-star"></i>FITNESS
        <i class="icofont-star"></i> FRIENDSHIP 
        <i class="icofont-star"></i> FAIR

      </div>
    </div>
  </section>
  <header id="header">
    <div class="container">

      <div class="logo float-left">
        <a href="../"><img src="{{ asset('assets/img/logo.png') }}" alt="" class="img-fluid"></a>
      </div>

      <nav class="nav-menu float-right d-none d-lg-block">
      <ul>
          <li><a href="{!! url('')!!}">Home</a></li>
          <li class="drop-down"><a href="">About Us</a>
                <ul>
                <li><a href="{!! url('founders'); !!}">Founders</a></li>
                <!-- <li><a href="{!! url('president-message'); !!}">President Message</a></li> -->
                  <li><a href="{!! url('about-us'); !!}">The Club</a></li>
                  <li><a href="{!! url('board-of-directors'); !!}">Board of Directors</a></li>
                  <li><a href="{!! url('past-presidents'); !!}">Past Presidents</a></li>
                  <li><a href="{!! url('life-members'); !!}">Life Members</a></li>
                  <li><a href="{!! url('threestarcafe'); !!}">Three Star Cafe</a></li>
                </ul>
          </li>
            <li class="drop-down"><a href="#">Team</a>
                <ul>
                <li class="drop-down"><a href="#">Senior Team</a>
                        <ul>
                            <li><a href="{!! url('senior-team'); !!}">Squad</a></li>
                            <li><a href="{!! url('officials'); !!}">Officials</a></li>
                        </ul>
                    </li>
                    <!-- <li><a href="{!! url('junior-team'); !!}">Junior Team</a>
                    <li><a href="{!! url('former-players'); !!}">Former Players</a> -->

                </ul>
            </li>
          <li><a href="{!! url('title-achievement'); !!}">Achievement</a></li>
          <li><a href="{!! url('article'); !!}">News</a></li>
          <li><a href="{!! url('contact-us'); !!}">Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header>
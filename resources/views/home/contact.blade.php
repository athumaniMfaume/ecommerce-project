<section class="contact_section ">
    <div class="container px-0">
      <div class="heading_container heading_center">
        <h2>
          Contact Us
        </h2> 
      </div>
    </div>
    <div class="container container-bg">
      <div class="row">
        <div class="col-lg-7 col-md-6 px-0">
          <div class="map_container">
            <div class="map-responsive">
              <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d7923.843431202129!2d39.223099688068395!3d-6.779382169007065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1ssinza%20mapambano%20location!5e0!3m2!1sen!2stz!4v1747646359979!5m2!1sen!2stz" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-5 px-0">
          <form action="{{ url('/send-message') }}" method="POST">
            @csrf
            <div>
              <input type="text" name="name" placeholder="Name" />
              @error('name')
                <p class="text-danger"> {{$message}} </p>
              @enderror
            </div>
            <div>
              <input type="email" name="email" placeholder="Email" />
                            @error('email')
                <p class="text-danger"> {{$message}} </p>
              @enderror
            </div>

            <div>
              <input type="text" name="phone" placeholder="Phone" />
                            @error('phone')
                <p class="text-danger"> {{$message}} </p>
              @enderror
            </div>
            <div>
              <input type="text" name="message" class="message-box" placeholder="Message" />
                            @error('message')
                <p class="text-danger"> {{$message}} </p>
              @enderror
            </div>
            <div class="d-flex ">
              <button type="submit">
                SEND
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <br><br><br>

  <!-- end contact section -->

   

  <!-- info section -->

  <section class="info_section  layout_padding2-top">
    <div class="social_container">
      <div class="social_box">
        <a href="">
          <i class="fa fa-facebook" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-twitter" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-instagram" aria-hidden="true"></i>
        </a>
        <a href="">
          <i class="fa fa-youtube" aria-hidden="true"></i>
        </a>
      </div>
    </div>
    <div class="info_container ">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-3">
            <h6>
              ABOUT US
            </h6>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <div class="info_form ">
              <h5>
                Newsletter
              </h5>
              <form action="#">
                <input type="email" placeholder="Enter your email">
                <button>
                  Subscribe
                </button>
              </form>
            </div>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              NEED HELP
            </h6>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet, consectetur adipiscing elit, sed doLorem ipsum dolor sit amet,
            </p>
          </div>
          <div class="col-md-6 col-lg-3">
            <h6>
              CONTACT US
            </h6>
            <div class="info_link-box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span> Gb road 123 london Uk </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>+01 12345678901</span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span> demo@gmail.com</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <footer class=" footer_section">
      <div class="container">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/"><b>Athumani Mfaume</b></a>
        </p>
      </div>
    </footer>
   

  </section>
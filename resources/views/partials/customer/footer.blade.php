<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 footer-contact">
          <h3>{{ trans('panel.site_title') }}</h3>
          <p>
              lorem ipsum <br> lorem ipsum, Rizal <br><br>
            <strong>Phone:</strong> +63 977 666 2231<br>
            <strong>Email:</strong> test@gmail.com<br>
          </p>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="/#pricing">Services</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="/#team">Our Top Employee</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="/#contact">Contact Us</a></li>
          </ul>
        </div>
        @php
          $services = App\Models\Service::where('isAvailable', true)->orderBy('name', 'asc')->paginate(4);
        @endphp
        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Our Available Services</h4>
          <ul>
            @foreach($services as $service)
              <li><i class="bx bx-chevron-right"></i> <a href="/customer/appointment_service/{{$service->id}}">{{$service->name ?? ''}}</a></li>
            @endforeach
          </ul>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Our Social Networks</h4>
          <p>Visit our social media platform.</p>
          <div class="social-links mt-3">
            <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
            <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
            <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="container footer-bottom clearfix">
    <div class="copyright">
      &copy; Copyright <strong><span>{{ trans('panel.site_title') }}</span></strong>. All Rights Reserved
    </div>

  </div>
</footer>

<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 footer-contact">
          <h3>{{ trans('panel.site_title') }}</h3>
          <p>
              San Isidro Barangay Hall <br> Taytay, Rizal <br><br>
            <strong>Phone:</strong> +63 977 666 8820<br>
            <strong>Email:</strong> ebarangayassistance@gmail.com<br>
          </p>
        </div>

        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bx bx-chevron-right"></i> <a href="/#about">About us</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="/#services">Services</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="/#team">Our Team</a></li>
            <li><i class="bx bx-chevron-right"></i> <a href="/#contact">Contact Us</a></li>
          </ul>
        </div>
        @php
          $documents = App\Models\Document::where('isAvailable', true)->orderBy('name', 'asc')->get();
        @endphp
        <div class="col-lg-3 col-md-6 footer-links">
          <h4>Our Available Documents</h4>
          <ul>
            @foreach($documents as $document)
              <li><i class="bx bx-chevron-right"></i> <a href="/resident/request_document/{{$document->id}}">{{$document->name ?? ''}}</a></li>
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
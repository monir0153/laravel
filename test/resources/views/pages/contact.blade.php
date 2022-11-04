@extends('layouts.master_home')
@section('home_content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Contact</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Contact</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <strong>{{session('success')}}</strong>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
    <!-- ======= Contact Section ======= -->
    {{-- <div class="map-section">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14757.728335483938!2d91.9134116673929!3d22.375062932176455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30ad25d109832a0d%3A0x8a1151c4e72a1597!2sGomdondi%20Railway%20Station!5e0!3m2!1sen!2sbd!4v1664173636607!5m2!1sen!2sbd" width="100%" height="400px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      
    </div> --}}

    <section id="contact" class="contact">
      <div class="container">

        <div class="row justify-content-center" data-aos="fade-up">

          <div class="col-lg-10">

            <div class="info-wrap">
              <div class="row">
                <div class="col-lg-4 info">
                  <i class="icofont-google-map"></i>
                  <h4>Location:</h4>
                  <p>{{$contact->address}}</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="icofont-envelope"></i>
                  <h4>Email:</h4>
                  <p>{{$contact->email}}</p>
                </div>

                <div class="col-lg-4 info mt-4 mt-lg-0">
                  <i class="icofont-phone"></i>
                  <h4>Call:</h4>
                  <p>{{$contact->phone}}</p>
                </div>
              </div>
            </div>

          </div>

        </div>

        <div class="row mt-5 justify-content-center" data-aos="fade-up">
          <div class="col-lg-10">
            
            <form action="{{route('contact.form')}}" method="post">
              @csrf
              <div class="form-row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" placeholder="Your Name"  />
                 
                </div>
                <div class="col-md-6 form-group">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" />
                 
                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" placeholder="Subject" />
               
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Message"></textarea>
               
              </div>
              
              <button type="submit" class="btn btn-success">Send Message</button>
              
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

@endsection
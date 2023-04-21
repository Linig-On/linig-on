@extends('layouts.app') @section('content')
<div class="container">

<div id="breadcrumbs" class="mx-3 mt-5">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/service/worker/#">Services</a></li>
            <li class="breadcrumb-item active" aria-current="page">Worker</li>
        </ol>
        </nav>
</div>

<!-- justify-content-center align-items-center -->
<div class="row ">
  <div class="col-md-4 p-5 ">
    <i class="fa-solid fa-quote-left fa-2xl"></i>
            <p class="text-center">
            I am a normal paragraph. I am currently explaining about my about me. This is what I do and I like it!
            </p>
        <hr>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-primary text-uppercase fw-bold z-index-30">
                Book A service
            </button>
        </div>
            <div class="py-4">
                <div>
                <h2>Skills</h2>
                </div>
                
               <h2>Socials</h2>
               <div class="d-flex justify-content-center gap-3">
                <i class="fa-brands fa-facebook fa-2xl"></i>
                <i class="fa-brands fa-facebook-messenger fa-2xl"></i>
                <i class="fa-brands fa-linkedin fa-2xl"></i>
                </div>
                
            </div>
</div>


  <div class="col-md-8">
    <div class="row">
      <div class="col-md-12 col-sm-4 shadow p-3 mb-5 bg-body rounded">
            <div class="row py-2">
                    <div class="col-md-2 d-flex flex-row gap-3 align-items-center">
                        <i class="fa fa-solid fa-user"></i>
                        <label for="" class="text-primary text-nowrap fw-bold small">Full Name</label>
                    </div>
                    <div class="col-md-8 z-index-30">
                        <input disabled type="text" class="form-control" id="floatingInputGrid" placeholder="Full Name" value="Jennifer Felice Morjanavic">
                    </div>
            </div>
            <div class="row py-2">
                <div class="col-md-2 d-flex flex-row gap-3 align-items-center">
                        <i class="fa fa-solid fa-phone"></i>
                        <label for="" class="text-primary text-nowrap fw-bold small">Mobile</label>
                    </div>
                    <div class="col-md-8 z-index-30">
                        <input disabled type="text" class="form-control" id="floatingInputGrid" placeholder="Full Name" value="0918 094 7841">
                    </div>
            </div>
            <div class="row py-2">
                    <div class="col-md-2 d-flex flex-row gap-3 align-items-center">
                        <i class="fa fa-solid fa-location-dot"></i>
                        <label for="" class="text-primary text-nowrap fw-bold small">Address</label>
                    </div>
                    <div class="col-md-8 z-index-30">
                        <input disabled type="text" class="form-control" id="floatingInputGrid" placeholder="Full Name" value="Bagumbayan Sur, Naga City">
                    </div>
            </div>
            <div class="d-flex justify-content-between py-2">
								<div></div>
								<button type="button" class="btn btn-primary text-uppercase fw-bold z-index-30">
									View Resume
									<i class="fa-regular fa-file text-white"></i>
								</button>
							</div>
      </div>



      <div class="col-md-12 col-sm-8 shadow p-3 mb-5 bg-body rounded">
            <div class="d-flex px-2 py-2" style="height: 50vh;">
            <div>
                <h2>About Me</h2>
                    <p> Book a service hero!
                        My service offers a tailor-made cleaning services to fit your needs and budget. 
                        Whether you need a general clean or a quick daily tidy up, I've got the perfect solution for you, 
                        even for students! I'll help you organize and fulfill your household cleaning needs with my service!
                    </p>
                <h2>Pricings</h2>
                    <p> With the low price of 350 PHP  you can get a service with:
                       <li> General Cleaning 
                       <li>Dish Washing
                       <li>Laundry
                       <li>Clothes Folding
                       <li> Watering of Plants
                       <li>Ironing <br>
                        What are you waiting for? Book now!</p>
            </div>
            </div>

      </div>

      <div class="col-md-12 col-sm-8">
                <h2>Reviews </h2>
                <hr class="divider">
                    
                <div class="d-flex flex-column align-items-center">
                    <div class="col-md-12 col-sm-4 shadow p-3 mb-5 bg-body rounded">
                        Content 1
                    </div>
                    <div class="col-md-12 col-sm-4-auto shadow p-3 mb-5 bg-body rounded">
                        Content 2
                    </div>
                    <div class="col-md-12 col-sm-4 shadow p-3 mb-5 bg-body rounded">
                        Content 3
                    </div>
                </div>


      </div>
      
    </div>
  </div>
</div>



</div>

@endsection
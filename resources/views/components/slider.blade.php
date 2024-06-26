@section('carousel_style')
<style>
  .carousel-item img {
      /* width: 100vw; */
      height: 78vh;
      /* height:100%; */
      /* max-width:100%; */
      object-fit: cover;
      object-position: 50% 50%;
  }

  @media (max-width: 768px) {
      .carousel-item img {
          height: 23vh;
      }
  }
</style>
@endsection

<div class="sectiondua row justify-content-center m-0">
  <div class="col-md-12 col-12">
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="2500">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6" aria-label="Slide 7"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="7" aria-label="Slide 8"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="8" aria-label="Slide 9"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="9" aria-label="Slide 10"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
              <a href="{{asset('uploads/slide/'.$slide1->nameimg)}}" target="_blank">
                <img src="{{asset('uploads/slide/'.$slide1->nameimg)}}" class="d-block w-100" alt="...">
              </a>
            </div>
            <div class="carousel-item">
              <a href="{{asset('uploads/slide/'.$slide2->nameimg)}}" target="_blank">
                <img src="{{asset('uploads/slide/'.$slide2->nameimg)}}" class="d-block w-100" alt="...">
              </a>
            </div>
            <div class="carousel-item">
              <a href="{{asset('uploads/slide/'.$slide3->nameimg)}}" target="_blank">
                <img src="{{asset('uploads/slide/'.$slide3->nameimg)}}" class="d-block w-100" alt="...">
              </a>
            </div>
            <div class="carousel-item">
              <a href="{{asset('uploads/slide/'.$slide4->nameimg)}}" target="_blank">
                <img src="{{asset('uploads/slide/'.$slide4->nameimg)}}" class="d-block w-100" alt="...">
              </a>
            </div>
            <div class="carousel-item">
              <a href="{{asset('uploads/slide/'.$slide5->nameimg)}}" target="_blank">
                <img src="{{asset('uploads/slide/'.$slide5->nameimg)}}" class="d-block w-100" alt="...">
              </a>
            </div> 
            <div class="carousel-item">
              <a href="{{asset('uploads/slide/'.$slide6->nameimg)}}" target="_blank">
                <img src="{{asset('uploads/slide/'.$slide6->nameimg)}}" class="d-block w-100" alt="...">
              </a>
            </div> 
            <div class="carousel-item">
              <a href="{{asset('uploads/slide/'.$slide7->nameimg)}}" target="_blank">
                <img src="{{asset('uploads/slide/'.$slide7->nameimg)}}" class="d-block w-100" alt="...">
              </a>
            </div> 
            <div class="carousel-item">
              <a href="{{asset('uploads/slide/'.$slide8->nameimg)}}" target="_blank">
                <img src="{{asset('uploads/slide/'.$slide8->nameimg)}}" class="d-block w-100" alt="...">
              </a>
            </div> 
            <div class="carousel-item">
              <a href="{{asset('uploads/slide/'.$slide9->nameimg)}}" target="_blank">
                <img src="{{asset('uploads/slide/'.$slide9->nameimg)}}" class="d-block w-100" alt="...">
              </a>
            </div> 
            <div class="carousel-item">
              <a href="{{asset('uploads/slide/'.$slide10->nameimg)}}" target="_blank">
                <img src="{{asset('uploads/slide/'.$slide10->nameimg)}}" class="d-block w-100" alt="...">
              </a>
            </div> 
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
    </div>
  </div>
</div>
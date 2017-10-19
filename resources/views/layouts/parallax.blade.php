@section('parallax')
    <div class="parallax overflow-hidden bg-blue-400 page-section third">
    <div class="container parallax-layer" data-opacity="true">
      <div class="media v-middle">
        <div class="media-left text-center">
          <a href="#">
            <img src="/images/people/110/guy-6.jpg" alt="people" class="img-circle width-80" />
          </a>
        </div>
        <div class="media-body">
          <h1 class="text-white text-display-1 margin-v-0">{{ Auth::user()->name }}</h1>
          <p class="text-subhead"><a class="link-white text-underline" href="website-student-public-profile.html">查看公众形象</a></p>
        </div>
        <div class="media-right">
          <span class="label bg-blue-500">Student</span>
        </div>
      </div>
    </div>
  </div>
@endsection
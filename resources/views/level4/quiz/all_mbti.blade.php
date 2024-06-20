<x-app-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('all_mbti.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <script src="https://kit.fontawesome.com/bdd89edb33.js"></script>
    <link
      href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900"
      rel="stylesheet"
    />
    
</head>
<body>
    @include('layouts.sidebar')
    @php
    $jobs_by_mbti = [
        'INTJ' => [
            ['title' => 'Product Manager', 'image' => 'product_manager.png'],
            ['title' => 'Sales Manager', 'image' => 'sales_manager.png'],
            ['title' => 'Accountant', 'image' => 'accountant.png'],
        ],
        'ENFP' => [
            ['title' => 'Product Manager', 'image' => 'product_manager.png'],
            ['title' => 'Marketing Manager', 'image' => 'marketing_manager.png'],
            ['title' => 'Partnerships Manager', 'image' => 'partnerships_manager.png'],
        ],
        'ENTJ' => [
            ['title' => 'Product Manager', 'image' => 'product_manager.png'],
            ['title' => 'Sales Manager', 'image' => 'sales_manager.png'],
            ['title' => 'Partnerships Manager', 'image' => 'partnerships_manager.png'],
        ],
        'INFP' => [
            ['title' => 'Marketing Manager', 'image' => 'marketing_manager.png'],
            ['title' => 'Chief Operating Officer (COO)', 'image' => 'coo.png'],
            ['title' => 'Accountant', 'image' => 'accountant.png'],
        ],
        'ESTP' => [
            ['title' => 'Marketing Manager', 'image' => 'marketing_manager.png'],
            ['title' => 'Sales Manager', 'image' => 'sales_manager.png'],
            ['title' => 'Project Manager', 'image' => 'project_manager.png'],
        ],
        'ENFJ' => [
            ['title' => 'Marketing Manager', 'image' => 'marketing_manager.png'],
            ['title' => 'Customer Service Manager', 'image' => 'customer_service_manager.png'],
            ['title' => 'Chief Operating Officer (COO)', 'image' => 'coo.png'],
        ],
        'ISTJ' => [
            ['title' => 'Sales Manager', 'image' => 'sales_manager.png'],
            ['title' => 'Chief Financial Officer (CFO)', 'image' => 'cfo.png'],
            ['title' => 'Accountant', 'image' => 'accountant.png'],
        ],
        'ISFP' => [
            ['title' => 'Customer Service Manager', 'image' => 'customer_service_manager.png'],
            ['title' => 'Partnerships Manager', 'image' => 'partnerships_manager.png'],
            ['title' => 'Project Manager', 'image' => 'project_manager.png'],
        ],
        'INTP' => [
            ['title' => 'Chief Financial Officer (CFO)', 'image' => 'cfo.png'],
            ['title' => 'Chief Operating Officer (COO)', 'image' => 'coo.png'],
            ['title' => 'Accountant', 'image' => 'accountant.png'],
        ],
        'ESFJ' => [
            ['title' => 'Chief Financial Officer (CFO)', 'image' => 'cfo.png'],
            ['title' => 'Project Manager', 'image' => 'project_manager.png'],
            ['title' => 'Partnerships Manager', 'image' => 'partnerships_manager.png'],
        ],
        'ESTJ' => [
            ['title' => 'Chief Financial Officer (CFO)', 'image' => 'cfo.png'],
            ['title' => 'Sales Manager', 'image' => 'sales_manager.png'],
            ['title' => 'Partnerships Manager', 'image' => 'partnerships_manager.png'],
        ],
        'ISTP' => [
            ['title' => 'Project Manager', 'image' => 'project_manager.png'],
            ['title' => 'Sales Manager', 'image' => 'sales_manager.png'],
            ['title' => 'Chief Operating Officer (COO)', 'image' => 'coo.png'],
        ],
        'ESFP' => [
            ['title' => 'Sales Manager', 'image' => 'sales_manager.png'],
            ['title' => 'Project Manager', 'image' => 'project_manager.png'],
            ['title' => 'Customer Service Manager', 'image' => 'customer_service_manager.png'],
        ],
        'ENTP' => [
            ['title' => 'Sales Manager', 'image' => 'sales_manager.png'],
            ['title' => 'Marketing Manager', 'image' => 'marketing_manager.png'],
            ['title' => 'Project Manager', 'image' => 'project_manager.png'],
        ],
        'ISFJ' => [
            ['title' => 'Customer Service Manager', 'image' => 'customer_service_manager.png'],
            ['title' => 'Accountant', 'image' => 'accountant.png'],
            ['title' => 'Chief Operating Officer (COO)', 'image' => 'coo.png'],
        ],
        'INFJ' => [
            ['title' => 'Customer Service Manager', 'image' => 'customer_service_manager.png'],
            ['title' => 'Partnerships Manager', 'image' => 'partnerships_manager.png'],
            ['title' => 'Project Manager', 'image' => 'project_manager.png'],
        ],
    ];
@endphp
<div class="first_big"><br><br>
  <h1 class="big_titre" >MBTI and Job Recommendations for Your Team</h1>
  <div class="big">
      <section class="section-plans" id="section-plans">
          <div class="row">
              @foreach ($users as $user)
                  <div class="col-1-of-3">
                      <div class="card">
                          <div class="card__side card__side--front-1">
                              <div class="card__title">
                                  <h4 class="card__heading">{{ $user->name }}</h4><br>
                                  <h4 class="card__heading">{{ $user->mbti_type }}</h4>
                                  <img class="image_mbti" src="{{ asset('all_mbti/' . $user->mbti_type . '.png') }}" alt="">
                              </div>
                          </div>
                          <div class="card__side card__side--back card__side--back-1">
                              <div class="card__cta">
                                  @foreach ($jobs_by_mbti[$user->mbti_type] as $job)
                                      <div class="card__price-box">
                                          <img class="job_image" src="{{ asset('images_mbti/' . $job['image']) }}" alt="{{ $job['title'] }}">
                                          <h4 class="job_title">{{ $job['title'] }}</h4>
                                      </div> <br><br>
                                  @endforeach
                                </div>
                          </div>
                     
                        </div>
                        <div class="audio-player">
                          <audio id="{{ $user->mbti_type }}-audio" src="{{ asset('mbti/' . $user->mbti_type . '.mp3') }}"></audio>
                          <a href="#" class="audio-control" data-mbti="{{ $user->mbti_type }}">What's an {{ $user->mbti_type }} ?                           <img class="volume" src="{{ asset('mbti/volume2.png') }}" alt="">
                          </a>
                        </div>
                      </div>
                  
                  @endforeach
          </div>
      </section>
  </div>
  <div class="btn" >    <a href="{{ route('home_mbti') }}" class="btnnext">Next</a>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.audio-control').click(function(e) {
            e.preventDefault();
            var mbtiType = $(this).data('mbti');
            var audioElement = document.getElementById(mbtiType + '-audio');

            if (audioElement.paused) {
                audioElement.play();
            } else {
                audioElement.pause();
            }
        });
    });
</script>
</body>
</html>
</x-app-layout>


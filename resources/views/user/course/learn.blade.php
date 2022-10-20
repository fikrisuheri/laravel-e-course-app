
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <link rel="stylesheet" href="{{ asset('mazer') }}/assets/css/main/app.css" />
    <link
      rel="shortcut icon"
      href="{{ asset('mazer') }}/assets/images/logo/favicon.svg"
      type="image/x-icon"
    />
    <link
      rel="shortcut icon"
      href="{{ asset('mazer') }}/assets/images/logo/favicon.png"
      type="image/png"
    />
    
  </head>

  <body>
    <nav class="navbar navbar-light">
      <div class="container-fluid d-block">
        <a href="{{ route('frontend.user.course.index') }}"><i class="bi bi-chevron-left"></i></a>
        <a class="navbar-brand ms-4" href="{{ route('frontend.user.course.index') }}">
          <img src="{{ asset('mazer') }}/assets/images/logo/logo.svg" />
        </a>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  <h4 class="card-title">{{ $data['current_course']['number'] }}.{{ $data['current_course']['name'] }}</h4>
                </div>
                <div class="card-body">
                    <iframe class="w-100 rounded" height="400"
                    src="https://www.youtube.com/embed/{{ $data['current_course']['link'] }}">
                </iframe>
                </div>
                <div class="card-footer d-flex justify-content-between">
                   <div>
                    @if ($data['current_course']['number'] != 1)
                   <a href="{{ route('frontend.user.course.learn',[
                    'id' => $data['userCourse']['id'],
                    'progress' => $data['current_course']['number'] - 1
                  ]) }}" class="btn btn-secondary">{{ __('button.previous') }}</a>
                   @endif
                   </div>

                   <div>
                    @if ($data['current_course']['number'] != $data['userCourse']['course']['total_item'])
                    <a href="{{ route('frontend.user.course.learn',[
                        'id' => $data['userCourse']['id'],
                        'progress' => $data ['current_course']['number'] + 1
                      ]) }}" class="btn btn-primary">{{ __('button.next') }}</a>
                      @else  
                      <a href="{{ route('frontend.user.course.index')}}" class="btn btn-primary">{{ __('button.finish') }}</a>
                      @endif
                   </div>
                </div>
              </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Materi</h4>
                  </div>
                <div class="card-body">
                    @foreach ($data['userCourse']['course']['detail'] as $detail)
                            <a href="{{ route('frontend.user.course.learn',[
                                'id' => $data['userCourse']['id'],
                                'progress' => $detail['number']
                              ]) }}">
                            <div class="alert {{ $detail['number'] == $data['current_course']->number ? 'alert-primary' : 'alert-secondary' }}"><i data-feather="video"></i> {{ $detail->number }}.{{ $detail->name }}
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
      </div>
    </div>
  </body>
</html>

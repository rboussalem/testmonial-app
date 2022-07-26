<section class="listing">
    <div class="container">
        <div class="listing-content">
            <h2>Testmonials</h2>
            <ul class="items">
                @foreach ($testmonials as $testmonial)
                <li class="item">
                    <div class="image">
                        @if ($testmonial->path == null)
                            <img src="{{asset('assets/img/avatar.jpg')}}" alt="">
                        @else
                            @if (in_array(pathinfo(Storage::url($testmonial->path))['extension'], array('png', 'jpg')))
                                <img src="{{ Storage::url($testmonial->path) }}" alt="">
                            @else
                                <a href="" download="{{ asset($testmonial->path) }}">
                                    <img src="{{asset('assets/img/avatar.jpg')}}" alt="">
                                </a>
                            @endif
                        @endif
                    </div>
                    <p class="titre">{{$testmonial->titre}}</p>
                    <div class="message">{{$testmonial->message}}</div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>


<section class="admin-listing">
    <div class="container">
        <div class="admin-listing-content">
            <ul class="items">
                @foreach ($testmonials as $testmonial)
                <li class="item">
                    <a href=" {{ route('admin.testmonial.edit', ['id'=> $testmonial->id ]) }} ">
                        <div class="info">
                            @component('partials.statut')
                                {{$testmonial->statut}}
                            @endcomponent
                            <span class="date"> {{$testmonial->created_at->diffForHumans()}} </span>
                        </div>
                        <p class="titre">{{$testmonial->titre}}</p>
                    </a>
                </li>
                @endforeach
            </ul>
            
            @if ( $testmonials->lastPage() > 1 )
            <div class="pagination">
                <div class="pagination-content">
                    Pages :
                    {{$testmonials->links()}}
                </div>
            </div>
            @endif
        </div>
    </div>
</section>
@if ($errors->any())
<section class="errors">
    <div class="container">
        <div class="errors-content">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> - {{$error}}</li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
@endif
@if (session()->has('status'))
    <section class="notif">
        <div class="container">
            <div class="notif-content">
                Notification : {{session()->get('status')}}
            </div>
        </div>
    </section>
@endif
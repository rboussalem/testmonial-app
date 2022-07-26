<li >
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="logout" type="submit"> {{ __('Logout') }} <i class="fas fa-sign-out-alt"></i></button>
    </form>
</li>
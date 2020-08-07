<nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="container">
      <div class="navbar-header">
        <a class="navbar-brand" href="/">Laravel Livewire</a>
      </div>
      <ul class="nav navbar-nav">
          @if (!$isLoggedIn)
            <a class="nav-item nav-link" href="/login">
                Login
            </a>
            <a class="nav-item nav-link" href="/register"">
                Register
            </a>
          @else
            <a class="nav-item nav-link" href="/dashboard">
                Dashboard
            </a>
            <a class="nav-item nav-link" href="#" wire:click="logout">Logout</a>
          @endif
      </ul>
    </div>
</nav>

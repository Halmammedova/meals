<nav class="navbar navbar-expand-lg navbar-dark bg-success" aria-label="Navbar">
    <div class="container-xl">
        <a class="navbar-brand" href="{{ route('home') }}"><span class="h2 fw-semibold">Home</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample05">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('recipes.index') }}"><span class="h5 ms-5 ps-5">Recipes</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('abouts.index') }}"><span class="ms-5">ABOUT US</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('contacts.index') }}"><span class="ms-5">Contact US</span></a>
          </li>
        </ul>
      </div>
    </div>
</nav>

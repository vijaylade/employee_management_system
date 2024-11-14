@include('Admin.Admin-Layouts.header');

@include('Admin.Admin-Layouts.sidebar');

<main id="main" class="main">

    <section class="section dashboard">
      <div class="row">

        @yield('content')

      </div>
    </section>

</main>

@include('Admin.Admin-Layouts.footer');

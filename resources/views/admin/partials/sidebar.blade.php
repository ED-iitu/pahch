<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="profile-info">
            <figure class="user-cover-image" style="background: none"></figure>
            <div class="user-info">
                <img src="../../img/icons/logo.svg" alt="avatar">
                <h6 class="">{{ auth()->user()->name }}</h6>
                <p class="">Admin</p>
            </div>
        </div>
        <div class="shadow-bottom"></div>
        @include('admin.partials.menu')
    </nav>

</div>

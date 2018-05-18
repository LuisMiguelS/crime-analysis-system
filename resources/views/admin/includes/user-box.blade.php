<!-- User box -->
<div class="user-box">
    <div class="user-img">
        <img src="{{ asset('admin/assets/images/users/avatar-1.jpg') }}" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
    </div>
    <h5><a href="#">{{ Auth::User()->name }}</a> </h5>
    <p class="text-muted">Admin Panel C·A·S</p>
</div>
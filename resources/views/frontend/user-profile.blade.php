@extends('frontend.layouts.app')
@section('content')
<div class="row">
    <div
      class="col-lg-4 col-md-4 offset-lg-4 offset-md-4 mt-4 pt-5 headers"
      style="padding-bottom:300px"
    >
      
    {{-- profile update --}}
<div class="modal" tabindex="-1" id="updateProfile">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title"><i class="fas fa-user me-2"></i>ဓာတ်ပုံတင်ရန်</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form action="{{ route('admin.profiles.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <input type="file" class="form-control" name="profile">
                  {{-- <p>Modal body text goes here.</p> --}}
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Update</button>
              </form>
          </div>
      </div>
  </div>
</div>
{{-- profile info update --}}
<div class="modal" tabindex="-1" id="updateInfo">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title"><i class="fas fa-info-circle me-2"></i>အချက်အလက်များပြင်ရန်</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form action="{{ route('admin.changePhoneAddress', Auth::user()->id) }}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" id="name" class="form-control" name="name" placeholder="Enter Name" value="{{ Auth::user()->name }}">
                  </div>
                  <div class="mb-3">
                      <label for="phone" class="form-label">Phone</label>
                      <input type="text" class="form-control" name="phone" placeholder="Enter Phone" value="{{ Auth::user()->phone }}">
                  </div>
                  <div class="mb-3">
                      <label for="address" class="form-label">Address</label>
                      <input type="text" id="address" class="form-control" name="address" placeholder="Enter Address" value="{{ Auth::user()->address }}">
                  </div>

                  {{-- <p>Modal body text goes here.</p> --}}
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Update</button>
              </form>
          </div>
      </div>
  </div>
</div>
{{-- change password --}}
<div class="modal" tabindex="-1" id="updatePassword">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title"><i class="fas fa-key me-2"></i>Password ပြင်ရန်</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <form action="{{ route('admin.changePassword', Auth::user()->id) }}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="mb-3">
                      <label for="old_password" class="form-label">Old Password</label>
                      <input type="password" id="old_password" class="form-control" name="old_password" placeholder="Enter Old Password" value="">
                  </div>
                  <div class="mb-3">
                      <label for="password" class="form-label">New Password</label>
                      <input type="password" class="form-control" name="password" placeholder="Enter New Password" value="">
                  </div>
                  {{-- <p>Modal body text goes here.</p> --}}
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Update</button>
              </form>
          </div>
      </div>
  </div>
</div> 

    </div>
</div>


@include('frontend.layouts.footer')
@endsection
@section('script')
{{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.32/dist/sweetalert2.all.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if(session('SuccessRequest'))
        Swal.fire({
            icon: 'success',
            title: 'Success! သင့်ကံစမ်းမှုအောင်မြင်ပါသည် ! သိန်းထီးဆုကြီးပေါက်ပါစေ',
            text: '{{ session('
            SuccessRequest ') }}',
            timer: 3000,
            showConfirmButton: false
        });
        @endif
    });
</script>



<script>
    $('#morning').click(function() {
        $('#morning').addClass('shadow');
        $('#morning').addClass('border');
        $('#morning').addClass('border-1');
        $('#morning').addClass('border-success');
        $('#morningnine').removeClass('shadow');
        $('#morningnine').removeClass('border');
        $('#morningnine').removeClass('border-1');
        $('#morningnine').removeClass('border-success');
        $('#eveningtwo').removeClass('shadow');
        $('#eveningtwo').removeClass('border');
        $('#eveningtwo').removeClass('border-1');
        $('#eveningtwo').removeClass('border-success');
        $('#evening').removeClass('shadow');
        $('#evening').removeClass('border');
        $('#evening').removeClass('border-1');
        $('#evening').removeClass('border-success');

        $('.morning').removeClass('d-none');
        $('.morningnine').addClass('d-none');
        $('.eveningtwo').addClass('d-none');
        $('.evening').addClass('d-none');
    });
    $('#morningnine').click(function() {
        $('#morningnine').addClass('shadow');
        $('#morningnine').addClass('border');
        $('#morningnine').addClass('border-1');
        $('#morningnine').addClass('border-success');
        $('#morning').removeClass('shadow');
        $('#morning').removeClass('border');
        $('#morning').removeClass('border-1');
        $('#morning').removeClass('border-success');
        $('#eveningtwo').removeClass('shadow');
        $('#eveningtwo').removeClass('border');
        $('#eveningtwo').removeClass('border-1');
        $('#eveningtwo').removeClass('border-success');
        $('#evening').removeClass('shadow');
        $('#evening').removeClass('border');
        $('#evening').removeClass('border-1');
        $('#evening').removeClass('border-success');

        $('.morningnine').removeClass('d-none');
        $('.morning').addClass('d-none');
        $('.eveningtwo').addClass('d-none');
        $('.evening').addClass('d-none');
    });
    $('#eveningtwo').click(function() {
        $('#eveningtwo').addClass('shadow');
        $('#eveningtwo').addClass('border');
        $('#eveningtwo').addClass('border-1');
        $('#eveningtwo').addClass('border-success');
        $('#morning').removeClass('shadow');
        $('#morning').removeClass('border');
        $('#morning').removeClass('border-1');
        $('#morning').removeClass('border-success');
        $('#morningnine').removeClass('shadow');
        $('#morningnine').removeClass('border');
        $('#morningnine').removeClass('border-1');
        $('#morningnine').removeClass('border-success');
        $('#evening').removeClass('shadow');
        $('#evening').removeClass('border');
        $('#evening').removeClass('border-1');
        $('#evening').removeClass('border-success');

        $('.eveningtwo').removeClass('d-none');
        $('.morning').addClass('d-none');
        $('.morningnine').addClass('d-none');
        $('.evening').addClass('d-none');

    });

    $('#evening').click(function() {
        $('#evening').addClass('shadow');
        $('#evening').addClass('border');
        $('#evening').addClass('border-1');
        $('#evening').addClass('border-success');
        $('#morning').removeClass('shadow');
        $('#morning').removeClass('border');
        $('#morning').removeClass('border-1');
        $('#morning').removeClass('border-success');
        $('#morningnine').removeClass('shadow');
        $('#morningnine').removeClass('border');
        $('#morningnine').removeClass('border-1');
        $('#morningnine').removeClass('border-success');
        $('#eveningtwo').removeClass('shadow');
        $('#eveningtwo').removeClass('border');
        $('#eveningtwo').removeClass('border-1');
        $('#eveningtwo').removeClass('border-success');

        $('.evening').removeClass('d-none');
        $('.morning').addClass('d-none');
        $('.morningnine').addClass('d-none');
        $('.eveningtwo').addClass('d-none');
    });
</script>
@endsection

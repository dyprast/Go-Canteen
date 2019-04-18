  
  @include('_____API.time-ago')
  <div id="loader-home" class="loader-api">
    <img src="{{ asset('img/loader-api.gif') }}">
  </div>
  <div class="photograph">
    <div class="row-custom">
      @foreach($fotografers as $res)
      <div class="person">
        <img src="{{ asset('UploadedFile/fotografer_profile/'.$res->profile) }}" alt="">
        <p>
          @if(strlen($res->nama_lengkap) > 8)
          {{ substr($res->nama_lengkap,0,8) }}..
          @else
          {{ $res->nama_lengkap }}
          @endif
        </p>
      </div>
      @endforeach
    </div>
  </div>
  <div class="content-photograph">
    @foreach($fotos as $res_)
    @php
      $d = $res->created_at;
      $t = convert_datetime($d);
    @endphp
    <div class="card no-box-shadow photography demo-facebook-card">
      <div class="card-header">
        <div class="demo-facebook-avatar"><img src="{{ asset('UploadedFile/fotografer_profile/'.$res_->fotografer->profile) }}" width="34" height="34" style="border-radius: 50%;"/></div>
        <div class="demo-facebook-name">{{ $res_->fotografer->nama_lengkap }}</div>
        <div class="demo-facebook-date">{{ timeAgo($t) }}</div>
      </div>
      <div class="card-content card-content-padding">
        <img src="{{ asset('UploadedFile/foto/'.$res_->foto) }}" width="100%"/>
        <p>@php echo $res_->deskripsi_foto @endphp</p>
        <div class="indicators-user">
          <span class="likes">
              <i class="icon f7-icons ios-only">heart</i>
              <i class="icon material-icons md-only">favorite_border</i>
              1.122
          </span>
          <div>
            <a href="#" class="link">
              <i class="icon f7-icons ios-only">heart</i>
              <i class="icon material-icons md-only">favorite_border</i>
            </a>
            <a href="#" class="link">
              <i class="icon f7-icons ios-only">save</i>
              <i class="icon material-icons md-only">save</i>
            </a>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
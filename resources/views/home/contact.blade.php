@extends('layouts.master')
@section('main')

<div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
    <div class="contact-us-area">
        <!-- google-map-area start -->
        <div class="google-map-area">
            <!--  Map Section -->
            <div id="contacts" class="map-area">
                <div id="map" class="map" ></div>
            </div>
        </div>
        <!-- google-map-area end -->
        <!-- contact us form start -->
        <div class="contact-us-form">
            <div class="sec-heading-area">
                <h2>Liên hệ chúng tôi</h2>
            </div>
            <div class="contact-form">
                <span class="legend">Thông tin liên hệ</span>
                <form action="" method="post">
                @csrf
                    <div class="form-top">
                        <div class="form-group col-sm-6 col-md-6 col-lg-5">
                            <label>Họ tên <sup>*</sup></label>
                            <input required type="text" name="c_name" class="form-control">
                        </div>
                        <div class="form-group col-sm-6 col-md-6 col-lg-5">
                            <label>Email <sup>*</sup></label>
                            <input required name="c_email" type="email" class="form-control">
                        </div>
                        <div class="form-group col-sm-6 col-md-6 col-lg-5">
                            <label>Tiêu đề <sup>*</sup></label>
                            <input required type="text" name="c_title" class="form-control">
                        </div>											
                        <div class="form-group col-sm-12 col-md-12 col-lg-10">
                            <label>Nội dung <sup>*</sup></label>
                            <textarea required name="c_content" class="yourmessage"></textarea>
                        </div>												
                    </div>
                    <div class="submit-form form-group col-sm-12 submit-review">
                        <p><sup>*</sup> Trường bắt buộc</p>
                        <button type="submit" class="btn btn-info">Gửi thông tin</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- contact us form end -->
    </div>					
</div>
<script>
// Initialize and add the map
function initMap() {
  // The location of Uluru
  var uluru = {lat: 20.9918236, lng: 105.8388412};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 15, center: uluru});
  // The marker, positioned at Uluru
  var marker = new google.maps.Marker({position: uluru, map: map});
}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnkLldYGeRofQhIXB8zqUlcXGBRftbZEQ&callback=initMap">
    </script>
@stop

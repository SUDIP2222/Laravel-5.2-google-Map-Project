@extends('layouts.master')

@section('content')

    <div>
        <div class="row">
            <div class="col-sm-3">
                {{--wallllllllllllllll--}}



                    <div class="list-group">

                        <div class="list-group-item" >
                            <h5 class="list-group-item-heading">
                                <p>{{$branches->name}}</p>
                            </h5>
                            <h5>
                                <p>Address : {{$branches->address}}</p>
                            </h5>
                            <h5>
                                <p>Open : {{$branches->open}}</p>
                            </h5>

                            <p class="list-group-item-text" > Weekly Holiday : {{$branches->weekend}}</p><br>
                            <a href = "{{ URL::to('branch/'.$branches->id.'/problem') }}" class="btn btn-danger"><span class="glyphicon glyphicon-alert"></span> Click If U Have Any Problem</a>

                        </div>

                    </div>


                {{--  dfdfdfdfdfdfd--}}
            </div>
            <div class="col-md-8" id="map" style="height: 510px; width: 890px;"></div>
        </div>

    </div>

    <script src="http://maps.google.com/maps/api/js?key=AIzaSyBUF1WRo8VyNvyDjiy1kJ0qCeOu2ayaMTo" type="text/javascript"></script>
    <script src="asset/al/dist/sweetalert.min.js"></script>
    <script>
        //dd($users);
        var locations =  [

            [{{$branches->id}},{{$branches->lat}}, {{$branches->lan}},'{{$branches->name}}','{{$branches->address}}','{{$branches->open}}','{{$branches->weekend}}'],

        ];
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 16,
            center: new google.maps.LatLng({{$branches->lat}},{{$branches->lan}}),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        });
        var infowindow = new google.maps.InfoWindow();
        var marker, i;
        for (i = 0; i < locations.length; i++) {
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map
            });
            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent("<h6><a href="+">"+locations[i][3]+"</a></h6><p>"+locations[i][4]+"</p>" +
                            "<p> Open : "+locations[i][5]+"</p>"+
                            "<p> Weekly Holiday : "+locations[i][6]+"</p>");
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    </script>


@endsection

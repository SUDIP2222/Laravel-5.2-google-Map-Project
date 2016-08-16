@extends('layouts.master')

@section('content')

    <div>
        <div class="row">
            <div class="col-sm-3">
                {{--wallllllllllllllll--}}


                @foreach($branches as $branch)
                <div class="list-group">

                    <a href="branch/{{$branch->id}}" class="list-group-item" >
                        <h5 class="list-group-item-heading">
                            <p> <span class="glyphicon glyphicon-map-marker"></span> {{$branch->name}}</p>
                        </h5>
                        <h5>
                            <p>Address : {{$branch->address}}</p>
                        </h5>
                        <h5>
                            <p>Open : {{$branch->open}}</p>
                        </h5>

                        <p class="list-group-item-text" > Weekly Holiday : {{$branch->weekend}}</p>
                    </a>

                </div>

                @endforeach
                {{--  dfdfdfdfdfdfd--}}
            </div>
            <div class="col-md-8" id="map" style="height: 510px; width: 890px;"></div>
        </div>

    </div>

    <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
    <script src="asset/al/dist/sweetalert.min.js"></script>
    <script>
        //dd($users);
        var locations =  [
            @foreach($branches as $branch)
                 [{{$branch->id}},{{$branch->lat}}, {{$branch->lan}},'{{$branch->name}}','{{$branch->address}}','{{$branch->open}}','{{$branch->weekend}}'],
            @endforeach
        ];
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 8,
            center: new google.maps.LatLng(23.777176,90.399452),
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
                    infowindow.setContent("<h6><a href=branch/"+locations[i][0]+">"+locations[i][3]+"</a></h6><p>"+locations[i][4]+"</p>" +
                            "<p> Open : "+locations[i][5]+"</p>"+
                            "<p> Weekly Holiday : "+locations[i][6]+"</p>");
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    </script>
    @if (notify()->ready())
        <script>
            swal({
                title: "{!! notify()->message() !!}",
                text: "{!! notify()->option('text') !!}",
                type: "{{ notify()->type() }}",
                @if (notify()->option('timer'))
                timer: {{ notify()->option('timer') }},
                showConfirmButton: false
                @endif
            });
        </script>
    @endif

@endsection

@extends('layouts.app')

@section('content')

        <div class="container">
            <div class="row dashboard-cards">
                @foreach($data as $item)
                <div class="{{ ($loop->index==3||$loop->index==4)? 'col-lg-6 col-md-6 col-sm-6':'col-lg-4 col-md-4 col-sm-4' }} col-xs-12">
                    <div class="card mt-4">
                    <a href="{{ $item['link']}}" class="item pl-2">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-xs-8">
                                <div class="row">
                                    <div><span class="{{ $item['icon']?? 'fa undefined' }} dashboard-card-icon m-1"></span> </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xs-12">
                                        <div class="website-traffic-ctn">
                                            <h6><small>Total</small><br>{{ $item['name'] }}<b>&nbsp;&nbsp;&nbsp;></b></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-xs-4">
                                    <span class="card-count-outer">
                                        @if($loop->last)
                                            <img src="{{ asset('images/Org.png') }}" width="100%" height="" />
                                        @else
                                            <h2 class="card-count"><span class="counter">{{ $item['count'] ?? '0' }}</span></h2>
                                        @endif
                                    </span>
                            </div>
                        </div>
                    </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
@endsection

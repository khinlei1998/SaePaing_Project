@extends('layouts.app')

@section('content')

<div class="breadcomb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list">
                        <div class="row" style="height: 600px;">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                              <h1 align="center">Sae Paing Organization Chart</h1>
                              <br>
                                <figure class="org-chart cf">
                                  <ul class="org administration">
                                    <li class="org">                    
                                      <ul class="org director">
                                        <li class="org">
                                          <a class="org"  href="#"  style="margin-bottom: 10px;background:#005569;color:#fff;position:relative;top:10px;"><span >Board of Directors</span></a>
                                            <a class="org"  href="#" style="margin-bottom: 10px;background:#005569;color:#fff;position:relative;top:10px;"><span>Chairman</span></a>

                                          <a href="{{url('profileall/' . '00000005')  }}"  class="org" style="background:#005569;color:#fff;position:relative;top:110px;">
                                          <img src="{{asset('images/info.png')}}" style="width:22px;float:right;" class="img-info" >
                                          <span>Managing Director (CEO)<br>Daw Su Su Myat Aye</span>
                                          </a>

                                          <ul class="org subdirector">
                                            <li class="org"><a class="org"  href="#"><span>ရုံးအဖွဲ့</span></a></li>
                                            <div class="my_divider"></div>
                                          </ul>
                                          <!-- <ul class="org department" style="z-index:999;transform: rotateY(0deg) rotate(90deg);"></ul> -->
                                          <ul class="org departments cf">                                
                                            <li class="org"><a class="org"  href="#"><span>အကြံပေး</span></a></li>
                                            <li class=" org department dep-b" style="margin-left:185px;">
                                              <a class="org"  href="{{ url('/home/orgchartpg2') }}"><span>Group I</span></a>
                                            </li>
                                            <li class=" org department dep-c">
                                              <a class="org"  href="{{ url('/home/orgchartpg3') }}"><span>Group II</span></a>
                                            </li>
                                            <li class=" org department dep-d">
                                              <a class="org"  href="{{ url('/home/orgchartpg4') }}"><span>Group III</span></a>
                                            </li>
                                            <li class=" org department dep-e">
                                              <a class="org"  href="{{ url('/home/orgchartpg5') }}"><span>Group IV</span></a>
                                            </li>
                                              <li class=" org department dep-e">
                                              <a class="org"  href="{{ url('/home/orgchartpg6') }}"><span>Group V</span></a>
                                            </li>
                                          </ul>
                                        </li>
                                      </ul>    
                                    </li>
                                  </ul>            
                                </figure>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
 </div>

 

@endsection
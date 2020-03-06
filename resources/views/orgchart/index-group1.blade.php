@extends('layouts.app')

@section('content')


<h1 align="center">Sae Paing Organization Chart</h1>

<div class="system-org group1-orgchart">
  <div id="chart-container"></div>
</div>
  
<br>
 
@endsection

@push('scripts')
    <script>
        window.onload = function () {
            $(function () {

              var datasource = {
                'name': '<a href="{{url('profileall/' . '00000069')  }}"><div><img src="{{asset('images/info.png')}}" style="width:20px;float:right;" class="img-info" ><p class="p">&emsp;Executive Director</p></div></a>',
                'title': '<label>U Paing Soe Aung</label>',
                'children': [
                  
                  { 'name': '<a href="{{url('profileall/' . '00000076')  }}"><div><img src="{{asset('images/info.png')}}" style="width:20px;float:right;" class="img-info" ><p class="p">&emsp;&emsp;Director</p></div></a>', 'title': '<label>Daw Thin Sandy Ye</label>',
                      'children': [
                      { 'name': '<a href="{{url('profileall/' . '00000418')  }}"><div><img src="{{asset('images/info.png')}}" style="width:20px;float:right;" class="img-info" ><p>&emsp;&emsp;Chariman Office<br> Department</p></div></a>', 'title': '<label>U Than Lwin</label>' },
                      { 'name': '<p>Business Development & <br> Planning Department</p>', 'title': '<label>U Paing Soe Aung</label>'},
                      { 'name': '<p>Project Development<br> Department</p>', 'title': '<label>Daw Thin Sandy Ye</label>'},
                      { 'name': '<p>Project Document<br> Department</p>', 'title': '<label>U Nay Win Myint</label>'}
                    ]
                  },
                  { 'name': '<a href="{{url('profileall/' . '00000418')  }}"><div><img src="{{asset('images/info.png')}}" style="width:20px;float:right;" class="img-info" ><p class="p">&emsp;&emsp;Director</p></div></a>', 'title': '<label>U Zaw Ye Win</label>',
                    'children': [
                      { 'name': '<p>PR <br> Department</p>', 'title': '<label>U Zaw Ye Win</label>' }
                      
                    ]
                  }
                  
                  
                ]
              };

              $('#chart-container').orgchart({
                'data' : datasource,
                'nodeContent': 'title'
              });
            });
        }
  </script>

@endpush
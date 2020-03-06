
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
                'name': '<p class="p">Director</p>',
                'title': '<label>U Zaw Tun Aung</label>',
                'children': [
                  
                  { 'name': '<p class="p">Admin Department</p>', 'title': '<label>U Zaw Naing Oo</label>'},
                  { 'name': '<p class="p">HR Department</p>', 'title': '<label>D May Sandar Tun</label>'},
                  { 'name': '<p class="p">HR Monitoring And<br> IT Support Dept</p>', 'title': '<label>U Si Tun Aung</label>'}

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
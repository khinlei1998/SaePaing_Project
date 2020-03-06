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
                'name': '<p class="p">Executive Director</p>',
                'title': '<label>U Soe Phone Tint</label>',
                'children': [
                  
                  { 'name': '<p class="p">Project Director</p>', 'title': '<label>DKKN, UZMH, DZPK</label>',
                      'children': [
                      { 'name': '<p>Project Management<br> Department</p>', 'title': '<label>DKKN, UZMH, DZPK</label>' }
                    ]
                  },
                  { 'name': '<p class="p">Director</p>', 'title': '<label>Daw Ei Ei Mon</label>',
                    'children': [
                      { 'name': '<p>Logistics <br> Department</p>', 'title': '<label>Daw Ei Ei Mon</label>' }
                      
                    ]
                  },
                  { 'name': '<p class="p">Machinery Department</p>', 'title': '<label>U Soe Htut Aung</label>'}
                  
                  
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
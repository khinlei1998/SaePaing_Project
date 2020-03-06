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
        $(function() {
            
              
          var datasource = {
            'name': '<p class="p">Director</p>',
            'title': '<label>Daw Hsu Paik Yadanar</label>',
            'children': [
              
              { 'name': '<p class="b">Sales & Marketing <br> Department</p>', 'title': '<label>Daw Hsu Paik Yadanar</label>'}
              
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
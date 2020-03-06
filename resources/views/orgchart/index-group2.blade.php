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
              'name': '<p class="p">Executive Director</p>',
              'title': '<label>U Aung Min</label>',
              'children': [
                
                { 'name': '<p class="p">Director</p>', 'title': '<label>?</label>',
                    'children': [
                    { 'name': '<p>Finance <br> Department</p>', 'title': '<label>Daw Anso Mary</label>' },
                    { 'name': '<p>Account <br> Department</p>', 'title': '<label>?</label>'}
                    
                  ]
                },
                { 'name': '<p>Cash And Assets <br>Department </p>', 'title': '<label>Daw Thi Thi Han</label>'}
                
                
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
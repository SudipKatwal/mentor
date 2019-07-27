@extends('front.layouts.master')
@section('content')
  <!--Banner-->
      <div class="container top-150">
        <a class="btn btn-success" href="{{route('features.create')}}">Add New</a>
        &nbsp <hr>
        <div class="row">
        @include('front.includes.errors')
          <table class="table table-bordered data-table">
              <thead>
                  <tr>
                      <th>S.No</th>
                      <th>Title</th>
                      <th>Descriptions</th>
                      <th>type</th>
                      <th>Edit</th>
                      <th>Delete</th>
                  </tr>
              </thead>
              <tbody>
              </tbody>
          </table>   
          &nbsp<hr>       
        </div>
      </div>

  <!--/ Banner-->
  
@endsection


@section('scripts')
    <script>
        $(document).ready(function(){
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                responsive:true,
                width:100,
                ajax: {
                    url: "{{ route('features.data') }}",
                    type:'POST',
                    'headers': {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                },
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex',width:'10%'},
                    {data: 'title', name: 'title',width:'20%'},
                    {data: 'descriptions', name: 'descriptions',width:'40%'},
                    {data: 'type', name: 'type',width:'10%'},
                    {data: 'edit', name: 'edit', width:'10%', orderable: false, searchable: false},
                    {data: 'delete', name: 'delete', width:'10%', orderable: false, searchable: false},
                ]
            });
        });

        function deleteModalUpdate(id, itemTitle=null){
            $('#itemTitle').empty();
            var url = "{{route('features.destroy',':id')}}";
            url = url.replace(':id',id);
            $('#itemTitle').append(itemTitle);
            $('#deleteForm').attr('action',url);
        }
    </script>
@endsection
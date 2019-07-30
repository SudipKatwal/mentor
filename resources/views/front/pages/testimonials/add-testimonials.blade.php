@extends('front.layouts.master')
@section('content')
  <!--Banner-->
      <div class="container top-150">
        <div class="row">  
            <form action="{{route('testimonials.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <input type="hidden" name="_id" value="{{!empty($detail) ? $detail->id : ''}}">
                <div class="form-group">
                    <label for="usr">Feature:</label>
                    <input type="text" class="form-control" value="{{!empty($detail) ? $detail->name : ''}}" name="name">
                    @if($errors->has('name'))
                        <span class="text-danger">{{$errors->first('name')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label for="pwd">Description:</label>
                    <textarea class="form-control" name="editor1" row="20">{{(!empty($detail) ? $detail->descriptions : '')}}</textarea>
                    @if($errors->has('editor1'))
                        <span class="text-danger">{{$errors->first('editor1')}}</span>
                    @endif
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="{{empty($detail) ? 'Submit' : 'Update'}}">
                </div>
            </form>
        </div>
      </div>
  <!--/ Banner-->
  
@endsection

@section('scripts')
<script>

CKEDITOR.replace( 'editor1' );
        
</script>
@endsection
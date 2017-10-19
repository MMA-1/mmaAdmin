@extends('main')

@section('title','| Edit Posts')
@section('stylesheet')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=35dmlnmnknqahkym6zsnyi80y13rnq79i5456gpv8prnyhsi"></script>

    <script>tinymce.init({ selector:'textarea',
            plugins: "link code image textcolor colorpicker image imagetools media table template emoticons",
            toolbar: "forecolor backcolor table template emoticons | bold italic | alignleft aligncenter alignright alignjustify fontsizeselect | bullist numlist outdent indent | link image media",
            templates: [
                {title: 'Some title 1', description: 'Some desc 1', content: '<b>MMA </b> <i>Solutions </i>'},
                {title: 'Some title 2', description: 'Some desc 2', url: 'development.html'}
            ],

        });</script>
@endsection
@section('content')
    <div class="row">
        {!! Form::model($post,['route'=>['posts.update',$post->id],'method'=>'PUT', 'files'=>true])!!}
        <div class="col-md-8">
            {{Form::label('title', 'Title:')}}
            {{Form::text('title',null,array('class'=>'form-control','required'=>'','maxlength'=>'255'))}}
            {{Form::label('slug', 'Slug:',['class'=>'form-spacing-top'])}}
            {{Form::text('slug',null,array('class'=>'form-control','required'=>'','minlength'=>'5','maxlength'=>'255'))}}
            {{Form::label('category_id','Category',['class'=>'form-spacing-top'])}}
            {{Form::select('category_id',$categories,null,['class'=>'form-control'])}}
            {{Form::label('subcategory_id','Sub Category',['class'=>'form-spacing-top'])}}
            <select name="subcategory_id" class="form-control" >
            </select>
            {{Form::label('tags','Tags:',['class'=>'form-spacing-top'])}}
            {{Form::select('tags[]',$tags,null,['class'=>'form-control select2-multi','multiple'=>'multiple'])}}
            {{Form::label('featured_image','Upload Featured Image:')}}
            {{Form::file('featured_image')}}
            {{Form::label('body', 'Post Body:',['class'=>'form-spacing-top'])}}
            {{Form::textarea('body',null,array('class'=>'form-control','required'=>''))}}
            {{Form::label('priority', 'Priority:')}}
            {{Form::text('priority',null,array('class'=>'form-control'))}}
            {{Form::label('metatagvalue', 'Metatag Value:')}}
            {{Form::text('metatagvalue',null,array('class'=>'form-control'))}}
            {{Form::label('metatagdescription', 'Metatag Description:')}}
            {{Form::text('metatagdescription',null,array('class'=>'form-control'))}}
            {{Form::label('approved', 'Approval:')}}
            {{Form::select('approved', array('1' => 'Approved', '0' => 'Block'),null,array('class'=>'form-control'))}}
        </div>
        <div class="col-md-4">
            <div class="well">
                <dl class="dl-horizontal">
                    <dt>Created At:</dt>
                    <dd>{{date('d-M-Y',strtotime($post->created_at))}}</dd>
                </dl>
                <dl class="dl-horizontal">
                    <dt>Updated At:</dt>
                    <dd>{{date('d-M-Y',strtotime($post->updated_at))}}</dd>
                </dl>
                <hr>
                <div class="row">
                    <div class="col-sm-6">
                        {!! Html::linkRoute('posts.show','Cancel', array($post->id), array('class'=>'btn btn-primary btn-block'))!!}
                    </div>
                    <div class="col-sm-6">
                        {{Form::submit('Save Changes',array('class'=>'btn btn-success btn-block'))}}

                    </div>
                </div>
            </div>
        </div>
        {!! Form::close()!!}
    </div>
    <div class="row">
        <div class="col-md-12">
            <h4> META TAGS HINTS</h4> <br>
            <u>GoogleAds Hint -></u>&nbsp;&nbsp;&nbsp;&nbsp;
            <br>
            <u>Default -></u>&nbsp;&nbsp;Latest Science News, Tech News, Physics News, Nasa News, Tricks And Hacks, Science Theory and Facts
        </div>
    </div>
@endsection
@section('scripts')
    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/select2.min.js') !!}
    <script type="text/javascript">
        $(".select2-multi").select2();
    </script>
    <script type="text/javascript">

        $(document).ready(function () {
            $("#idTitle").keyup(function () {
                $("#idSlug").val(slugify(this.value));
            });
        });
        function slugify(text) {
            return text.toString().toLowerCase()
                .replace(/\s+/g, '-')           // Replace spaces with -
                .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                .replace(/^-+/, '')             // Trim - from start of text
                .replace(/-+$/, '');            // Trim - from end of text
        }

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var categoryid = $(this).val();
                if(categoryid) {
                    $.ajax({
                        url: '/subcategories/ajax/'+categoryid,
                        type: "GET",
                        dataType: "json",
                        success:function(data) {


                            $('select[name="subcategory_id"]').empty();
                            $('select[name="subcategory_id"]').append('<option value="">Select Option</option>');
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                            });

                        }
                    });
                }else{
                    $('select[name="subcategory_id"]').empty();
                }
            });
        });
    </script>
@endsection
@extends('main')

@section('title','| Edit Album')
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
    <div class="inner">
    <div class="row">
        <div class="col-lg-12">
            <div class="box dark">
                <header>
                    <div class="icons"><i class="icon-edit"></i></div>
                    <h5>Edit Album</h5>
                </header>
    <div id="div-1" class="accordion-body collapse in body">
        {!! Form::model($album,['route'=>['albums.update',$album->id],'method'=>'PUT', 'files'=>true,'class' => 'form-horizontal'])!!}

        <div class="form-group">
            {{Form::label('albumtitle', 'Album Title:',['class'=>'col-lg-3'])}}
            <div class="col-lg-8">
                {{Form::text('albumtitle',null,array('class'=>'form-control','required'=>'','maxlength'=>'255','id'=>'idTitle'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('slug', 'Slug:',['class'=>'col-lg-3'])}}
            <div class="col-lg-8">
                {{Form::text('slug',null,array('class'=>'form-control','required'=>'','minlength'=>'5','maxlength'=>'255','id'=>'idSlug'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('year', 'Year:',['class'=>'col-lg-3'])}}
            <div class="col-lg-8">
                {{Form::text('year',null,array('class'=>'form-control','required'=>'','maxlength'=>'255'))}}
            </div>
        </div>
            <div class="form-group">
            {{Form::label('category_id','Category',['class'=>'col-lg-3'])}}
            <div class="col-lg-8">
            {{Form::select('category_id',$categories,null,['class'=>'form-control'])}}
            </div>
            </div>
            <div class="form-group">
            {{Form::label('subcategory_id','Sub Category',['class'=>'col-lg-3'])}}
            <div class="col-lg-8">
            <select name="subcategory_id" class="form-control" >
            </select>
            </div>
            </div>
            <div class="form-group">
            {{Form::label('tags','Tags:',['class'=>'col-lg-3'])}}
            <div class="col-lg-8">
            {{Form::select('tags[]',$tags,null,['class'=>'form-control select2-multi','multiple'=>'multiple'])}}
            </div>
            </div>
            <div class="form-group">
            {{Form::label('album_image','Upload Featured Image:',['class'=>'col-lg-3'])}}
            <div class="col-lg-8">
            {{Form::file('album_image')}}
            </div>
            </div>
        <div class="form-group">
            {{Form::label('description', 'Album Description:',['class'=>'col-lg-3'])}}
            <div class="col-lg-8">
                {{Form::textarea('description',null,array('class'=>'form-control'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('priority', 'Priority:',['class'=>'col-lg-3'])}}
            <div class="col-lg-8">
                {{Form::text('priority',5,array('class'=>'form-control'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('metatagvalue', 'Metatag Value:',['class'=>'col-lg-3'])}}
            <div class="col-lg-8">
                {{Form::text('metatagvalue',null,array('class'=>'form-control'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('metatagdescription', 'Metatag Description:',['class'=>'col-lg-3'])}}
            <div class="col-lg-8">
                {{Form::text('metatagdescription',null,array('class'=>'form-control'))}}
            </div>
        </div>
        <div class="form-group">
            {{Form::label('approved', 'Approval:',['class'=>'col-lg-3'])}}
            <div class="col-lg-8">
                {{Form::select('approved', array('1' => 'Approved', '0' => 'Block'),null,array('class'=>'form-control'))}}
            </div>
        </div>
            <div class="form-group">
                <div class="col-md-12">
                    <div class="well text-center">
                            <label class="btn btn-success btn-flat btn-rect">Created At:</label>
                            <label class="btn btn-success btn-line btn-rect">{{date('d-M-Y',strtotime($album->created_at))}}</label>

                            <label class="btn btn-primary btn-flat btn-rect">Updated At:</label>
                            <label class="btn btn-primary btn-line btn-rect">{{date('d-M-Y',strtotime($album->updated_at))}}</label>


                        <hr>
                        <div class="row">
                                {!! Html::linkRoute('albums.show','Cancel', array($album->id), array('class'=>'btn btn-primary btn-md'))!!}

                                {{Form::submit('Save Changes',array('class'=>'btn btn-success btn-md'))}}

                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close()!!}
    </div>
            </div>
        </div>
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
    <script type="text/javascript">
        function getAllSubcategories(ctryid,selectedval)
        {
            if(ctryid!=null) {
                $.ajax({
                    url: '/subcategories/ajax/'+ctryid,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {


                        $('select[name="subcategory_id"]').empty();
                        $('select[name="subcategory_id"]').append('<option value="">Select Option</option>');
                        $.each(data, function(key, value) {
                            if(key==selectedval)
                                $('select[name="subcategory_id"]').append('<option value="'+ key +'" selected>'+ value +'</option>');
                            else
                                $('select[name="subcategory_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                        });

                    },
                    error: function (error) {
                    alert('error; ' + eval(error));
                    }
                });
            }else{
                $('select[name="subcategory_id"]').empty();
            }
        }
        getAllSubcategories(0,<?=$album->subcategory_id?>);
    </script>
@endsection
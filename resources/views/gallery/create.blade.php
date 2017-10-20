@extends('main')

@section('title','| Create New Gallery')
@section('stylesheet')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/select2.min.css') !!}
@endsection
@section('content')
    <div class="inner">
    <div class="row">

        <div class="col-md-12">
            <div class="box dark">
                <header>
                    <div class="icons"><i class="icon-edit"></i></div>
                    <h5>Create New Gallery</h5>
                </header>
                <div id="div-1" class="accordion-body collapse in body">
            {!! Form::open(array('route' => 'gallery.store','data-parsley-validate'=>'', 'files'=>true)) !!}
            {{Form::label('title', 'Title:')}}
            {{Form::text('title',null,array('class'=>'form-control','required'=>'','maxlength'=>'255','id'=>'idTitle'))}}
            {{Form::label('slug', 'Slug:')}}
            {{Form::text('slug',null,array('class'=>'form-control','required'=>'','minlength'=>'5','maxlength'=>'255','id'=>'idSlug'))}}
            {{Form::label('tags','Tags:',['class'=>'form-spacing-top'])}}
            <select class="form-control select2-multi" name="tags[]" multiple="multiple">
                @foreach($tags as $tag)
                    <option value='{{$tag->id}}'>{{$tag->name}}</option>
                @endforeach
            </select>
            {{Form::label('featured_image','Upload Featured Image:')}}
            {{Form::file('featured_image')}}
            {{Form::label('priority', 'Priority:')}}
            {{Form::text('priority',5,array('class'=>'form-control'))}}
            {{Form::label('metatagvalue', 'Metatag Value:')}}
            {{Form::text('metatagvalue',null,array('class'=>'form-control'))}}
            {{Form::label('metatagdescription', 'Metatag Description:')}}
            {{Form::text('metatagdescription',null,array('class'=>'form-control'))}}
            {{Form::label('approved', 'Approval:')}}
            {{Form::select('approved', array('1' => 'Approved', '0' => 'Block'),null,array('class'=>'form-control'))}}
            {{Form::submit('Save Image',array('class'=>'btn btn-success', 'style'=>'margin-top:10px;'))}}
            {!! Form::close() !!}
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <h4> META TAGS HINTS</h4> <br>
            <u>GoogleAds Hint -></u>&nbsp;&nbsp;&nbsp;&nbsp; Love Shayari, Pyar Shayari, Romantic Shayari, Love Status, Pyar Ka Dard, Sad Shayari, Hindi Shayari
            <br>
            <u>SitesMetataggCopied -></u>&nbsp;&nbsp;&nbsp;&nbsp; Hindi Love Shayari, Love Shayari in Hindi, Hindi Shayari Love, Love Shayari in Hindi, Best Love Shayari, Hindi Shayari on Love, Shayari for Lover,
            Shayari, Shayari in Hindi, Shayaris, Hindi Shayari, Whatsapp Status, Facebook Status, Sms in Hindi, Festival Wishes, Funny Shayari, Best Wishes, Poetry, Poems, Quotes.
            Best Dard Shayari, दर्द भरी शायरी, Pyar Ka Dard Status Painful Llines, Latest broken heart Shayari In Hindi, 2 line painful hindi shayari, dard sms, Dard bhare quotes, Sad shayari for love with Images, Painful Sms, Bewafa Dard Bhari Shayari, Latest Dard Bhari Shayari’s In Hindi, Very Painful status, Very very sad dard shayari on pyar & zindagi, Dard bhari broken heart shayari, Mohabbat Ka Dard Short Shayari, Emotional Shayari, Painful Dard Quotes By Depressed Alone Boy, Dard-E-Dil Shayari on Love and Life, After Break Up Sad Dard Quotes, Most Painful Shayari on Lost My Love, Sad Long Shayari in Hindi, Broken Heart Shayari who lost his love.
            <br>
            <u>MmaHint -></u>&nbsp;&nbsp;&nbsp;&nbsp; Shayari Dunia, Dunia Shayari, Shayari Couplet, shayaridunia, shayaridunia.com, shayaridunya, shayaridunya.com, shayarifm,ihindishayari,lovesove
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
@endsection
@extends('layouts.app')
@section('title','Translate ')
@section('app_content')
    <div class="container mt-5">
        <h1 class="text-center">Google Translate<small style="font-size: 14px">(Copy)</small></h1>
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-5">
                <form action="">
                    <div class="form-group">
                        <select name="source_language" id="source_language" class="form-control">
                            <option value="">Select a Language</option>
                            <option value="ar">Arabic</option>
                            <option value="bn">Bengali</option>
                            <option value="co">Corsican</option>
                            <option value="zh">Chinese </option>
                            <option value="da">Danish</option>
                            <option value="nl">Dutch</option>
                            <option value="en">English</option>
                            <option value="fr">French</option>
                            <option value="de">German</option>
                            <option value="hi">Hindi</option>
                            <option value="ja">Japanese</option>
                            <option value="ko">Korean</option>
                            <option value="th">Thai</option>
                            <option value="tr">Turkish</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="source_word" id="source_word" cols="30" rows="10" class="form-control" style="font-size: 22px"></textarea>
                    </div>
                </form>
            </div>
            <div class="col-md-5">
                <div class="form-group">
                    <select name="result_language" id="result_language" class="form-control">
                        <option value="">Select a Language</option>
                        <option value="ar">Arabic</option>
                        <option value="bn">Bengali</option>
                        <option value="co">Corsican</option>
                        <option value="zh">Chinese </option>
                        <option value="da">Danish</option>
                        <option value="nl">Dutch</option>
                        <option value="en">English</option>
                        <option value="fr">French</option>
                        <option value="de">German</option>
                        <option value="hi">Hindi</option>
                        <option value="ja">Japanese</option>
                        <option value="ko">Korean</option>
                        <option value="th">Thai</option>
                        <option value="tr">Turkish</option>
                    </select>
                </div>
                <div class="form-group">
                    <textarea name="result_world" id="result_world" cols="30" rows="9" class="form-control" style="font-size: 25px"></textarea>
                </div>
            </div>
        </div>
    </div>
@stop

@push('script')
<script>
    $('body').on('keyup blur','#source_word',function () {
        var source_word = $(this).val();
        if(source_word == ''){
            $('#result_world').val('');
        }
        var source_language = $('#source_language').val();
        var result_language = $('#result_language').val();
        var data = {word : source_word,source_lan : source_language,res_lan:result_language};
//       console.log(source_language);
//       console.log(result_language);
        if(source_language != '' && result_language != ''){
            if(source_word == ''){
                return;
            }
            $.ajax({
                url : "{{route('translate.word')}}",
                method : 'GET',
                data : data,
                success : function (res) {
                    console.log(res);
                    $('#result_world').val(res);

                }
            })
        }else{
            alert('Select Lan');
        }
    });
</script>
@endpush


@if (LaravelLocalization::getCurrentLocale() == 'ar')

    @section('scripts')
        <script>
            // console.log('ssssssssssssssssssssssssss');
            $(document).ready(function () {
                // $.get('/ajax-subcat?cat_id='+ cat_id,function(data){});
                    $('#categories').on('change',function(e){
                        // console.log(e);
                        var cat_id = e.target.value;
                        console.log(cat_id);
                        //ajax
                        $.get('/ajax-subcat?cat_id='+ cat_id,function(data){
                            //success data
                        console.log(data);
                            $('#subcategory').empty();
                        $.each(data,function(index,subcatObj){
                            console.log(subcatObj.value);
                            // var option = $('<option/>', {id:create, value:subcatObj});
                            $('#subcategory').append('<option class="" style="font-size:16px" value="'+subcatObj.value+'">'+subcatObj.name_ar+'</option>');
                        });
                    });
                });
            });
        </script>
    @endsection

@else

    @section('scripts')
        <script>
            // console.log('ssssssssssssssssssssssssss');
            $(document).ready(function () {
                // $.get('/ajax-subcat?cat_id='+ cat_id,function(data){});
                    $('#categories').on('change',function(e){
                        // console.log(e);
                        var cat_id = e.target.value;
                        console.log(cat_id);
                        //ajax
                        $.get('/ajax-subcat?cat_id='+ cat_id,function(data){
                            //success data
                        console.log(data);
                            $('#subcategory').empty();
                        $.each(data,function(index,subcatObj){
                            console.log(subcatObj.value);
                            // var option = $('<option/>', {id:create, value:subcatObj});
                            $('#subcategory').append('<option class="" style="font-size:16px" value="'+subcatObj.value+'">'+subcatObj.name_en+'</option>');
                        });
                    });
                });
            });
        </script>
    @endsection

@endif
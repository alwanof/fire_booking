@extends('layouts.admin-lte')
@section('style')

@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{__('Create Service')}}</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data" action="{{ route('services.store') }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="inputName">{{__('Title')}}</label>
                            <input type="text" name="title" class="form-control" placeholder="{{__('Title')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="inputName">{{__('Description')}}</label>
                            <textarea name="description" class="form-control" rows="5" cols="80"
                                      placeholder="{{__('Description')}}" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">{{__('Category')}}</label>
                            <select class="form-control" name="category_id" id="category_id" required>
                                <option value="">{{__('Select Category')}}</option>
                                @foreach(\App\Category::all() as $category)
                                    <option value="{{$category->id}}">{{$category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" id="models_holder">
                            <label for="">{{__('Model')}}</label>
                            <select class="form-control" name="user_model_id" id="user_model_id" required>
                                <option value="">{{__('Select Model')}}</option>
                            </select>
                        </div>
                         <div class="form-group" >
                            <label for="">{{__('Cancel Policy')}}</label>
                            <select class="form-control" name="cancel_policy_id" >
                                <option value="">{{__('Select Cancel Policy')}}</option>
                                @foreach(\App\CancelPolicy::all() as $cancel_policy)
                                <option value="{{$cancel_policy->id}}">{{$cancel_policy->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="inputName">{{__('Price')}}</label>
                                <input type="number" name="price" class="form-control" placeholder="{{__('Price')}}"
                                       required>
                            </div>
                            <div class="form-group col-6">
                                <label for="inputName">{{__('Discounted Price')}}</label>
                                <input type="text" name="discount_price" class="form-control" value="0"
                                       placeholder="{{__('Discounted Price')}}" required>
                            </div>
                        </div>
                        <div class="row">
                            @if(\App\Setting::where('configuration_id',8)->first())
                            <div class="form-group col-6">
                                <label for="">Is Age Group Discount Acitve</label>
                                <select name="is_age_group_active" class="form-control" id="is_age_group_active">
                                    <option value="false">False</option>
                                    <option value="true">True</option>
                                </select>
                            </div>
                            @endif
                            <div class="form-group col-6">
                            <label for="">Is Hot Deal </label>
                            <select name="is_hot_deal" class="form-control" id="is_hot_deal">
                                <option value="false">False</option>
                                <option value="true">True</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group">
                            <label for="">{{__('Amount')}}</label>
                            <input type="number" class="form-control" name="amount" value="1" min="1" required>
                        </div>
                        <div class="form-group">
                            <label for="">{{__('Duration')}}</label>
                            <input type="number" class="form-control" id="duration" step="15" name="duration" value="30"
                                   min="30" required>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">{{__('Start Hours')}}</label>
                                <select class="form-control" name="start_hours" id="start_hours">
                                    @foreach ( range( 0, 86400, 3600 ) as $timestamp )
                                        @php
                                            $hour_mins = gmdate( 'H:i', $timestamp );
                                            if ( ! empty( 'g:i a' ) )
                                            $times[$hour_mins] = gmdate( 'g:i a', $timestamp );
                                            else $times[$hour_mins] = $hour_mins
                                        @endphp
                                        <option value="{{$timestamp}}">{{$hour_mins}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">{{__('End Hours')}}</label>
                                <select class="form-control" name="end_hours" id="end_hours">
                                    @foreach ( range( 0, 86400, 3600 ) as $timestamp )
                                        @php
                                            $hour_mins = gmdate( 'H:i', $timestamp );
                                            if ( ! empty( 'g:i a' ) )
                                            $times[$hour_mins] = gmdate( 'g:i a', $timestamp );
                                            else $times[$hour_mins] = $hour_mins
                                        @endphp
                                        <option value="{{$timestamp}}">{{$hour_mins}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="images">{{__('Avatar')}}</label>
                            <input id="input-b3" required name="avatar[]" type="file" class="file" multiple
                                   data-show-upload="false" data-show-caption="true"
                                   data-msg-placeholder="Select {files} for upload...">
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Additional Field Name</label>
                                    <input type="text" class="form-control" name="additional_field_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Additional Field Options</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="additioal_field_options[]">
                                        <button type="button" class="btn btn-success btn-sm " id="add_option"> <i class="fa fa-plus"></i> </button>
                                    </div>
                                </div>
                                <div id="options_holder"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <hr>
                            <legend class="text-center">{{__('Time Schedule')}}</legend>
                            <hr>
                            <div class="form-group">
                                <label for="inputName">{{__('Start Date')}}</label>
                                <input type="date" name="start_date" id="start_date"
                                       value="{{date('Y-m-d',strtotime('today'))}}" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="inputName">{{__('End Date')}}</label>
                                <input type="date" name="end_date" id="end_date"
                                       value="{{date('Y-m-d',strtotime('tomorrow'))}}" class="form-control" required>
                            </div>
                            <div class=" table-responsive" id="timeSchemaHolder">
                            </div>
                        </div>
                        <div class="form-group">
                            <a href="{{route('home')}}" class="btn btn-secondary">{{__('Cancel')}}</a>
                            <input type="submit" value="{{__('Save Changes')}}" class="btn btn-success float-right">
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(function () {
            $(document).on('click', '#add_option', function () {
                var section = '<div class="form-group">';
                section += ' <label for="">Additional Field Options</label>';
                section += '<div class="input-group">';
                section += ' <input type="text" class="form-control" name="additioal_field_options[]">';
                section += '<button type="button" class="btn btn-danger btn-sm " id="add_option"> <i class="fa fa-trash"></i> </button>';
                section += ' </div> ';
                section += ' </div> ';
                $("#options_holder").append(section);
            })
        })

        function delete_div(id) {
            $("#image_div_" + id).remove();
        }
    </script>
    <script>
        $(function () {
            $(document).ready(function () {
                $.ajax({
                    url: "/services/TimeSchemaCreator",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        "duration": $("#duration").val(),
                        "start_date": $("#start_date").val(),
                        "end_date": $("#end_date").val(),
                        "start_hours": $("#start_hours").val(),
                        "end_hours": $("#end_hours").val()
                    },
                    success: function (data) {

                        $("#timeSchemaHolder").html(data);
                    },
                    error: function (data) {
                        alert("Something Wrong !");
                    }
                })

            })
            $("#duration,#start_hours,#end_hours,#start_date,#end_date").on("change", function () {

                $.ajax({
                    url: "/services/TimeSchemaCreator",
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        "duration": $("#duration").val(),
                        "start_date": $("#start_date").val(),
                        "end_date": $("#end_date").val(),
                        "start_hours": $("#start_hours").val(),
                        "end_hours": $("#end_hours").val()
                    },
                    success: function (data) {

                        $("#timeSchemaHolder").html(data);
                    },
                    error: function (data) {
                        alert("Something Wrong !");
                    }
                })

            });

            $("#category_id").on("change", function () {
                $.ajax(
                    {
                        url: "{{route('category.getModels')}}",
                        type: "POST",
                        data: {
                            "_token": "{{csrf_token()}}",
                            "category_id": $(this).val()
                        },
                        success: function (data) {
                            $("#models_holder").html(data);
                        },
                        error: function () {

                        }
                    });

            })

        })
    </script>
@endsection

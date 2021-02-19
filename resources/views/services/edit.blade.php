@extends('layouts.admin-lte')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">{{__('Edit Service')}}</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" enctype="multipart/form-data"
                          action="{{ route('services.update1',$service->id) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="inputName">{{__('Title')}}</label>
                            <input type="text" name="title" class="form-control" placeholder="{{__('Title')}}"
                                   value="{{$service->title}}" required>
                        </div>
                        <div class="form-group">
                            <label for="inputName">{{__('Description')}}</label>
                            <textarea name="description" class="form-control" rows="5" cols="80"
                                      placeholder="{{__('Description')}}" required>{{$service->description}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="">{{__('Model')}}</label>
                            <select class="form-control" name="user_model_id" id="user_model_id" required>
                                <option value="">{{__('Select Model')}}</option>
                                @foreach($models as $model)
                                    <option value="{{$model->id}}"
                                            @if($service->user_model_id == $model->id) selected @endif>{{$model->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group" >
                            <label for="">{{__('Cancel Policy')}}</label>
                            <select class="form-control" name="cancel_policy_id"  required>
                                <option value="">{{__('Select Cancel Policy')}}</option>
                                @foreach(\App\CancelPolicy::all() as $cancel_policy)
                                <option value="{{$cancel_policy->id}}" @if($service->cancel_policy_id == $cancel_policy->id) selected @endif>{{$cancel_policy->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="inputName">{{__('Price')}}</label>
                                <input type="number" name="price" class="form-control" placeholder="{{__('Price')}}"
                                       value="{{$service->price}}" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="inputName">{{__('Discounted Price')}}</label>
                                <input type="text" name="discount_price" class="form-control"
                                       placeholder="{{__('Discounted Price')}}" value="{{$service->discount_price}}"
                                       required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">{{__('Amount')}}</label>
                            <input type="number" class="form-control" name="amount" value="{{$service->amount}}" min="1"
                                   required>
                        </div>
                        <div class="row">
                            @if(\App\Setting::where('configuration_id',8)->first())
                            <div class="form-group col-6">
                                <label for="">Is Age Group Discount Acitve</label>
                                <select name="is_age_group_active" class="form-control" id="is_age_group_active">
                                    <option @if($service->age_group_discount_active == false) selected @endif value="false">False</option>
                                    <option @if($service->age_group_discount_active == true) selected @endif value="true">True</option>
                                </select>
                            </div>
                            @endif
                            <div class="form-group col-6">
                                <label for="">Is Hot Deal </label>
                                <select name="is_hot_deal" class="form-control" id="is_hot_deal">
                                    <option @if($service->is_hot_deal == false) selected @endif value="false">False</option>
                                    <option @if($service->is_hot_deal == true) selected @endif value="true">True</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">{{__('Duration')}}</label>
                            <input type="number" class="form-control" id="duration" step="15" name="duration"
                                   value="{{$service->duration}}" min="30" required>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="">{{__('Start Hours')}}</label>
                                <select class="form-control" name="start_hours" id="start_hours">
                                    @foreach ( range( 0, 82800, 3600 ) as $timestamp )
                                        @php
                                            $hour_mins = gmdate( 'H:i', $timestamp );
                                            if ( ! empty( 'g:i a' ) )
                                            $times[$hour_mins] = gmdate( 'g:i a', $timestamp );
                                            else $times[$hour_mins] = $hour_mins
                                        @endphp
                                        <option @if($service->serviceTimes->min("time") == $hour_mins ) selected
                                                @endif value="{{$timestamp}}">{{$hour_mins}} </option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">

                                <label for="">{{__('End Hours')}}</label>
                                <select class="form-control" name="end_hours" id="end_hours">
                                    @foreach ( range( 0, 82800, 3600 ) as $timestamp )
                                        @php
                                            $hour_mins = gmdate( 'H:i', $timestamp );
                                            if ( ! empty( 'g:i a' ) ){
                                            $times[$hour_mins] = gmdate( 'g:i a', $timestamp );
                                            }else {$times[$hour_mins] = $hour_mins;}



                                        @endphp
                                        <option value="{{$timestamp}}">{{$hour_mins}} </option>

                                    @endforeach
                                </select>

                            </div>
                        </div>
                        <div class="form-group">
                            <label for="images">{{__('Avatar')}}</label>


                            <input id="input-b3" name="avatar[]" type="file" class="file" multiple
                                   data-show-upload="false" data-show-caption="true"
                                   data-msg-placeholder="Select {files} for upload...">

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Additional Field Name</label>
                                    <input type="text" class="form-control" value="{{$service->additional_field_name}}"
                                           name="additional_field_name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Additional Field Options</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="additioal_field_options[]">
                                        <button type="button" class="btn btn-success btn-sm " id="add_option"><i
                                                class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div id="options_holder">
                                    @if($service->additional_field_options != null)
                                        @foreach(json_decode($service->additional_field_options) as $option)
                                    <div class="form-group">
                                        <label for="">Additional Field Options</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" value="{{$option}}" name="additioal_field_options[]">
                                            <button type="button" class="btn btn-danger btn-sm " id="add_option"><i
                                                    class="fa fa-trash"></i></button>
                                        </div>
                                    </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <hr>
                            <legend class="text-center">{{__('Time Schedule')}}</legend>
                            <hr>
                            <div class="form-group">
                                <label for="inputName">{{__('Start Date')}}</label>
                                <input type="date" name="start_date" id="start_date" value="{{$start_date}}"
                                       class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="inputName">{{__('End Date')}}</label>
                                <input type="date" name="end_date" id="end_date" value="{{$end_date}}"
                                       class="form-control" required>
                            </div>
                            <div class=" table-responsive" id="timeSchemaHolder">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td>Time</td>
                                        @foreach ($dates as $value)
                                            <td>{{$value}}  </td>
                                        @endforeach

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($times_ava as $key => $value)
                                        <tr>
                                            <td>{{$key}}</td>
                                            @foreach ($dates as $value)
                                                <td><input type="checkbox" name="times[]" checked
                                                           value="{{$value}}-{{$key}}"></td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

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
    <script>
        fileinput = $("#input-b3").fileinput({
            theme: "fas",
            initialPreview: [
                @foreach($service->Images as $image)
                    "<img src='{{asset($image->path)}}'" +
                " class='file-preview-image'" +
                " alt='{{$image->id}}' title='{{$image->id}}'>",
                @endforeach
            ],
            initialPreviewConfig: [
                    @foreach($service->Images as $image)
                {
                    caption: '{{asset($image->path)}}',
                    url: '{{route('service_image.destroy',$image->id)}}',
                    key: {{$image->id}},
                    extra: {id: {{$image->id}}}
                },
                @endforeach

            ]
        });
    </script>
@endsection
@section('script')
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
            $(document).on("change", [
                "#duration",
                "#start_hours",
                "#end_hours",
                "#start_date",
                "#end_date",
            ], function () {

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

        })
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
    </script>
@endsection

                 <label for="">{{__('Model')}}</label>
                            <select class="form-control" name="user_model_id" id="user_model_id" required>
                                <option value="">{{__('Select Model')}}</option>
                                @foreach($models as $model)
                                    <option value="{{$model->id}}">{{$model->title}}</option>
                                @endforeach
                            </select>

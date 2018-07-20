 
      <div class="col-xs-9">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Welcome to MyBlog</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
            </div>
                  <div class="box-body">
                        
                          <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
                            {!! Form::label('title') !!}
                            {!! Form::text('title', null, ['class' => 'form-control']) !!}

                            @if($errors->has('title'))
                                <span class="help-block">{{ $errors->first('title') }}</span>
                            @endif
                          </div>

                           <div class="form-group {{ $errors->has('slug') ? 'has-error' : ''}}">
                            {!! Form::label('slug') !!}
                            {!! Form::text('slug', null, ['class' => 'form-control']) !!}


                            @if($errors->has('slug'))
                                <span class="help-block">{{ $errors->first('slug') }}</span>
                            @endif
                          </div>
                  </div>
                  <div class="box-footer">
                      <button type="submit" class="btn btn-primary">{{ $category->exists ? 'Update' : 'Save' }}</button>
                       <a href="{{ route('categories.index') }}" class="btn btn-default">Cantel</a>
                  </div>
            </div>
      </div>
 
    </div>
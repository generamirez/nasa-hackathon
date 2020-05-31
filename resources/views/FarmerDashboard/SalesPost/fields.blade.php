

<style>
    #center{
        min-height: 100%;
        display:flex;
        align:center;

    }
</style>
    <div class="container" id="center">
        <div class="form-body">

            <h3>{{ __('msg.new_listing') }}</h3>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="name" class="control-label">{{ __('msg.name') }}</label>
                        {{ Form::text('title', null, ['class' => 'form-control', 'required', 'maxlength' => 255]) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="date" class="control-label">{{ __('msg.description') }}</label>
                        {{ Form::text('description', null, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="date" class="control-label">{{ __('msg.available') }}</label>
                        {{ Form::number('available', null, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="date" class="control-label">{{ __('msg.price') }}</label>
                        {{ Form::number('price', null, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="image" class="control-label">Image</label>
                        {{ Form::file('image', ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>

            <div class="row">
                    <div class="col-sm-8">
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a href={{route('sales-posts.index')}} class="btn btn-secondary">{{ __('msg.back') }}</a>
                          <button class="btn btn-primary" type="submit">{{ __('msg.submit') }}</button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
{{-- </div> --}}

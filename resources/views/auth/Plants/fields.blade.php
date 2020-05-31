

<style>
    #center{
        min-height: 100%;
        display:flex;
        align:center;

    }
</style>
    <div class="container" id="center">
        <div class="form-body">
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
                        <label for="date" class="control-label">Variety</label>
                        {{ Form::text('variety', null, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="date" class="control-label">Scientific Name</label>
                        {{ Form::text('scientific_name', null, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="date" class="control-label">Opt Growth</label>
                        {{ Form::number('opt_grow', null, ['class' => 'form-control', 'step'=>"0.01"]) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="date" class="control-label">Min Growth</label>
                        {{ Form::number('min_grow', null, ['class' => 'form-control', 'step'=>"0.01"]) }}
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

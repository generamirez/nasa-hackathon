

<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="form-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name" class="control-label">Title</label>
                        {{ Form::text('title', null, ['class' => 'form-control', 'required', 'maxlength' => 255]) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="date" class="control-label">Description</label>
                        {{ Form::text('description', null, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="date" class="control-label"># Available</label>
                        {{ Form::number('available', null, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="date" class="control-label">Price</label>
                        {{ Form::number('price', null, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="image" class="control-label">Image</label>
                        {{ Form::file('image', ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

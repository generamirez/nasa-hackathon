

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
                        <label for="name" class="control-label">Title</label>
                        {{ Form::text('title', null, ['class' => 'form-control', 'required', 'maxlength' => 255]) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="date" class="control-label">Description</label>
                        {{ Form::text('description', null, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="date" class="control-label"># Available</label>
                        {{ Form::number('available', null, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="date" class="control-label">Price</label>
                        {{ Form::number('price', null, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>

            {{-- <div class="row">
                <div class="col-sm-8">
                    <div class="form-group">
                        <label for="image" class="control-label">Image</label>
                        {{ Form::file('image', ['class' => 'form-control']) }}
                    </div>
                </div>
            </div> --}}

            <div class="row">
                    <div class="col-sm-8">
                        <div class="btn-group" role="group" aria-label="Basic example">
                          <a href={{route('sales-posts.index')}} class="btn btn-secondary">Back</a>
                          <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
        </div>
    </div>
{{-- </div> --}}

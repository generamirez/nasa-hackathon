
<div class="row justify-content-center">
    <div class="col-md-8">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <th>Participants</th>
                {{-- <th>Description</th>
                <th>Available</th>
                <th>Price</th>
                <th>Actions</th> --}}
            </thead>
            <tbody>
                @forelse ($conversations as $c)
                    <tr>
                        <td>{{ $c->title }}</td>
                        <td>{{ $c->description }}</td>
                        <td>{{ $c->available }}</td>
                        <td>{{ $c->price }}</td>
                        <td>
                            <img src="{{ $p->thumbnailUrl }}" class="img-responsive bg-transparent">
                                <h5> Description </h5>
                                <p>
                                    {{ $p->description }}
                                </p>
                                <h5> Seller </h5>
                                <p>
                                    {{ $p->user->name }}
                                </p>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a href={{route('click.chat',['id'=>$p->id])}} class="btn btn-primary">Message Seller</a>
                                    </div>
                                </div>
                                </div>
                            </div> --}}

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="100%" class="text-center">---</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

{{ $posts->links() }}


<div class="row justify-content-center">
    <div class="col-md-8">
    <div class="table-responsive">
            <div class="btn-group float-right mb-4" role="group" aria-label="Basic example">
              <a type="button" href={{route('sales-posts.create')}} class="btn btn-primary">Create a new listing</a>
            </div>
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Description</th>
                <th>Available</th>
                <th>Price</th>
                <th>Actions</th>
            </thead>
            <tbody>
                @forelse ($posts as $p)
                    <tr>
                        {{-- <td>
                            <a href="{{ route('blocked-dates::dashboard.blocked-dates.show', $blockedDate->id) }}">
                                {{ $blockedDate->name }}
                            </a>
                        </td> --}}
                        <td>{{ $p->title }}</td>
                        <td>{{ $p->description }}</td>
                        <td>{{ $p->available }}</td>
                        <td>{{ $p->price }}</td>
                        <td>
                            @if (isset($my_list))
                                {{ Form::open(['route' => 'mark.sold']) }}
                                    {{ Form::hidden('id', $p->id) }}
                                        <button type="submit" class="btn btn-danger">Sell</button>
                                {{ Form::close() }}
                            @else
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#showModal">
                                        View
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="listingModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h5 class="modal-title" id="listingModalLabel">{{ $p->title }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        </div>
                                        <div class="modal-body">
                                            {{-- {{ dd($p) }} --}}
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
                                </div>
                            @endif

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

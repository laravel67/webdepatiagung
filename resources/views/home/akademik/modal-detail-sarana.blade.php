@foreach ( $saranas as $$sarana)
<div class="modal fade" id="exampleModalLong{{ $$sarana->id }}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Biografi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    @if ($sarana->image)
                    <img src="{{ asset('storage/'.$sarana->image) }}" class="img-fluid" width="200" height="200">
                    @else
                    <svg class="bd-placeholder-img" width="300" height="300" xmlns="http://www.w3.org/2000/svg"
                        role="img" aria-label="Placeholder: 300x300" preserveAspectRatio="xMidYMid slice"
                        focusable="false">
                        <title>Placeholder</title>
                        <rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777"
                            dy=".3em">300x300</text>
                    </svg>
                    @endif
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <strong>{{ $sarana->name }}</strong>
                    </li>
                    <li class="list-group-item">
                        <article align='justify'>
                            {!! $sarana->body !!}
                        </article>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endforeach
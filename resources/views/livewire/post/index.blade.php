<div>
    <div class="row mb-3">
        <div class="col">
            <a class="btn btn-success btn-sm" href="{{ route('apost.create') }}"><i class="fa-solid fa-circle-plus"></i>
                Post</a>
        </div>
        <div class="col-md">
            <x-search></x-search>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul</th>
                    <th>Kategory</th>
                    @can('admin')
                    <th>Autho</th>
                    @endcan
                    <th>Dibuat</th>
                    <th>
                        Opsi
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $i=> $post)
                <tr>
                    <td>{{ $posts->firstItem()+$i }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name ?? '-' }}</td>
                    @can('admin')
                    <td>{{ $post->author->name ?? '-' }}</td>
                    @endcan
                    <td>
                        {{
                        \Carbon\Carbon::parse($post->created_at)->locale('id')->translatedFormat('d F
                        Y')}}
                    </td>
                    <td>
                        <div class="btn btn-group">
                            <x-btn-action href="{{ route('apost.show', $post->slug) }}" color="success">
                                {{ __('eye') }}
                            </x-btn-action>
                            <x-btn-action href="{{ route('apost.edit', $post->slug) }}" color="warning">
                                {{ __('edit') }}
                            </x-btn-action>
                            <x-btn-action model="deleting('{{ $post->slug }}')" color="danger">
                                {{ __('trash') }}
                            </x-btn-action>
                        </div>
                    </td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
        {!! $posts->links() !!}
    </div>
</div>
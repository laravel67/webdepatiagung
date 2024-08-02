<div class="row">
    <div class="col-md-7">
        <div class="row mb-3">
            <div class="col col-md-6">
                <a class="btn btn-success btn-sm" href="{{ route('category.create') }}"><i
                        class="fa-solid fa-circle-plus"></i>
                    Kategori</a>
            </div>
            <div class="col-7 col-md-6">
                <x-search></x-search>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Kategori</th>
                        <th>Slug Kategori</th>
                        <th>
                            Opsi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $i=> $category)
                    <tr>
                        <td>{{ $categories->firstItem()+$i }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td>
                            <div class="btn btn-group">
                                <x-btn-action href="{{ route('category.edit', $category->slug) }}" color="warning">
                                    {{ __('edit') }}
                                </x-btn-action>
                                <x-btn-action model="deleting('{{ $category->slug }}')" color="danger">
                                    {{ __('trash') }}
                                </x-btn-action>
                            </div>
                        </td>
                    </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
            {!! $categories->links() !!}
        </div>
    </div>
    <x-image-draw></x-image-draw>
</div>
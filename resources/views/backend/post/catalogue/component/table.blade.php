<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th class="text-center">
                <input type="checkbox" class="input-checkbox" id="checkAll">
            </th>
            <th style="width: 100px;">Ảnh</th>
            <th >Tên ngôn ngữ</th>
            <th >Canonical</th>
            <th >Mô tả</th>
            <th class="text-center">Tình trạng</th>
            <th class="text-center">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @if (isset($postCatalogues) && is_object($postCatalogues))
        @foreach ($postCatalogues as $postCatalogue)
            <tr>
                <td class="text-center">
                    <input type="checkbox" value="{{ $postCatalogue->id }}" class="input-checkbox checkBoxItem">
                </td>
                <td><span class="image img-cover"><img src="{{ $postCatalogue->image }}" alt=""></span></td>
                <td>{{ $postCatalogue->name }}</td>
                <td>{{ $postCatalogue->canonical }}</td>
                <td>{{ $postCatalogue->description }}</td>
                <td class="text-center js-switch-{{ $postCatalogue->id }}">
                    <input type="checkbox" value="{{ $postCatalogue->publish }}" class="js-switch status" data-field="publish" data-model="PostCatalogue" {{ ($postCatalogue->publish == 2) ? 'checked' : '' }} data-modelId = "{{ $postCatalogue->id }}"/>
                </td>
                <td class="text-center">
                    <a href="{{ route('postCatalogue.edit', $postCatalogue->id) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                    <a href="{{ route('postCatalogue.delete', $postCatalogue->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
        @endforeach
        @endif
    </tbody>
</table>

@if (isset($postCatalogues))
{{ $postCatalogues->links('pagination::bootstrap-4') }}
@endif

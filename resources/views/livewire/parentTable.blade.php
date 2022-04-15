@include('partials.session')
<button class="btn btn-success btn-sm btn-lg pull-right" wire:click="showAddForm" type="button">{{ trans('Parents.Add Parent') }}</button><br><br>
<div class="table-responsive">
    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50" style="text-align: center">
        <thead>
            <tr class="table-success">
                <th>#</th>
                <th>{{ trans('Parents.Email') }}</th>
                <th>{{ trans('Parents.Father Name') }}</th>
                <th>{{ trans('Parents.Father National ID') }}</th>
                <th>{{ trans('Parents.Father Passport ID') }}</th>
                <th>{{ trans('Parents.Father Phone') }}</th>
                <th>{{ trans('Parents.Father Job') }}</th>
                <th>{{ trans('Parents.Actions') }}</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; ?>
            @foreach ($parents as $parent)
            <tr>
                <?php $i++; ?>
                <td>{{ $i }}</td>
                <td>{{ $parent->email }}</td>
                <td>{{ $parent->father_name }}</td>
                <td>{{ $parent->father_national_id }}</td>
                <td>{{ $parent->father_passport_id }}</td>
                <td>{{ $parent->father_phone }}</td>
                <td>{{ $parent->father_job }}</td>
                <td>
                    <button wire:click="edit({{ $parent->id }})" title="{{ trans('parents.Edit Parent') }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
                    <button type="button" class="btn btn-danger btn-sm" wire:click="delete({{ $parent->id }})" title="{{ trans('parents.Delete Parent') }}"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
            @endforeach
    </table>
</div>
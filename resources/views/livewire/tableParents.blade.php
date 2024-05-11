<div class="d-flex justify-content-between mb-3">
    <a class="modal-effect btn btn-primary-gradient" data-effect="effect-flip-horizontal" data-toggle="modal" href="#"
        wire:click="AddParents">{{ trans('myParents.AddParents') }}</a>
</div>
<div class="table-responsive">
    <table class="table text-center text-md-nowrap" id="example1">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ trans('myParents.Email') }}</th>
                <th>{{ trans('myParents.Name_F') }}</th>

                <th>{{ trans('myParents.Phone_F') }}</th>
                <th>{{ trans('myParents.Job_F') }}</th>

                <th>{{ trans('myParents.Name_M') }}</th>

                <th>{{ trans('myParents.Phone_M') }}</th>
                <th>{{ trans('myParents.Job_M') }}</th>
                <th>{{ trans('myParents.Processes') }}</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 0; ?>
            @foreach ($my_parents as $my_parent)
                <tr>
                    <?php $i++; ?>
                    <td>{{ $i }}</td>
                    <td>{{ $my_parent->email }}</td>
                    <td>{{ $my_parent->Name_Father }}</td>
                    <td>{{ $my_parent->Phone_Father }}</td>
                    <td>{{ $my_parent->Job_Father }}</td>
                    <td>{{ $my_parent->Name_Mother }}</td>

                    <td>{{ $my_parent->Phone_Mother }}</td>
                    <td>{{ $my_parent->Job_Mother }}</td>
                    <td>
                        <button class="btn btn-success-gradient btn-sm" wire:click="edit({{ $my_parent->id }})"
                            title="{{ trans('Grades_trans.Edit') }}"><i class="fa fa-edit"></i></button>
                        <button class="btn btn-danger-gradient  btn-sm" wire:click="delete({{ $my_parent->id }})"
                            title="{{ trans('myParents.Delete') }}">
                            <i class="fa fa-trash"></i></button>
                </tr>
            @endforeach
    </table>
</div>

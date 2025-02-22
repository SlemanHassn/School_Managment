<!-- Deleted inFormation Student -->
<div class="modal fade" id="graduate_Student{{ $promotion->student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('Students_trans.graduate_st') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('oneSoft') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$promotion->student->id}}">

                    <h5 style="font-family: 'Cairo', sans-serif;">{{ trans('Students_trans.ac_G') }}
                    </h5>
                    <input type="text" readonly value="{{ $promotion->student->name }}" class="form-control">

                    <div class="modal-footer">
                        <button class="btn btn-danger">{{ trans('Students_trans.graduate') }}</button>
                        <button type="button" class="btn btn-secondary"
                            data-dismiss="modal">{{ trans('Students_trans.Close') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

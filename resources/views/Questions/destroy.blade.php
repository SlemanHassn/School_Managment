<div class="modal fade" id="delete_exam{{ $question->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="{{ route('questions.destroy', 'test') }}" method="post">
            {{ method_field('delete') }}
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('tests.D_question') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p> {{ trans('tests.D_F') }} {{ $question->name }}</p>
                    <input type="hidden" name="id" value="{{ $question->id }}">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger-gradient">{{ trans('tests.Delete') }}</button>
                    <button type="button" class="btn btn-secondary-gradient"
                        data-dismiss="modal">{{ trans('tests.Close') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>

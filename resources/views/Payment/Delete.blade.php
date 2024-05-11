<!-- Deleted inFormation Student -->
<div class="modal fade" id="Delete_receipt{{ $payment_student->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('Fees_Invoices.Delete_the_bill_of_exchange') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('Payment.destroy', 'test') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" value="{{ $payment_student->id }}">
                    <h5 style="font-family: 'Cairo', sans-serif;">
                        {{ trans('Fees_Invoices.DeleteFees') }}</h5>
                    <div class="modal-footer">
                        <button class="btn btn-danger-gradient">{{ trans('Fees_Invoices.Delete') }}</button>
                        <button type="button" class="btn btn-secondary-gradient"
                            data-dismiss="modal">{{ trans('Students_trans.Close') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

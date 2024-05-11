<div>

    @if ($show_table == true)
        @include('livewire.tableParents')

    @else
        <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" wire:click="back(2)" type="button"
                        class="btn btn-rounded {{ $currentStep != 1 ? 'btn-secondary-gradient' : 'btn-primary-gradient' }}">1</a>
                    <p>{{ trans('myParents.Step1') }}</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" wire:click="firstStepSubmit" type="button"
                        class="btn btn-rounded {{ $currentStep != 2 ? 'btn-secondary-gradient' : 'btn-primary-gradient' }}">2</a>
                    <p>{{ trans('myParents.Step2') }}</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" wire:click="secondStepSubmit" type="button"
                        class="btn btn-rounded {{ $currentStep != 3 ? 'btn-secondary-gradient' : 'btn-primary-gradient' }}"
                        disabled="disabled">3</a>
                    <p>{{ trans('myParents.Step3') }}</p>
                </div>
            </div>

        </div>
        @include('livewire.Father')
        @include('livewire.Mother')

        <div class="row setup-content {{ $currentStep != 3 ? 'displayNone' : '' }}" id="step-3">
            @if ($currentStep != 3)
                <div style="display: none" class="row setup-content" id="step-3">
            @endif
            <div class="col-xs-12">
                <div class="col-md-12">
                    <h3 class="mt-3" style="font-family: 'Cairo', sans-serif;">{{ trans('myParents.setp_last') }}</h3>
                    <br>

                    <input type="hidden" wire:model='parent_id'>
                    <button class="btn btn-danger-gradient  nextBtn py-0 btn-lg pull-right" type="button"
                        wire:click="back(2)">{{ trans('myParents.Back') }}</button>
                    @if ($updateMode)
                        <button class="btn btn-success-gradient py-0 btn-lg pull-right" wire:click="submitForm_Edit"
                            type="button">{{ trans('myParents.Finish') }}</button>
                    @else
                        <button class="btn btn-success-gradient py-0  btn-lg pull-right" wire:click="submitForm"
                            type="button">{{ trans('myParents.Finish') }}</button>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>

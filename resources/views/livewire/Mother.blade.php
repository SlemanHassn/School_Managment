@if ($currentStep != 2)
    <div style="display: none" class="row setup-content" id="step-2">
@endif
<div class="col-xs-12">
    <div class="col-md-12">
        <br>

        <div class="form-row">
            <div class="col">
                <label class="mt-2 mb-0" for="title">{{ trans('myParents.Name_Mother') }}</label>
                <input type="text" wire:model="Name_Mother" class="form-control">
                @error('Name_Mother')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label class="mt-2 mb-0" for="title">{{ trans('myParents.Name_Mother_en') }}</label>
                <input type="text" wire:model="Name_Mother_en" class="form-control">
                @error('Name_Mother_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="col-md-3">
                <label class="mt-2 mb-0" for="title">{{ trans('myParents.Job_ar') }}</label>
                <input type="text" wire:model="Job_Mother" class="form-control">
                @error('Job_Mother')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label class="mt-2 mb-0" for="title">{{ trans('myParents.Job_en') }}</label>
                <input type="text" wire:model="Job_Mother_en" class="form-control">
                @error('Job_Mother_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label class="mt-2 mb-0" for="title">{{ trans('myParents.National_ID') }}</label>
                <input type="text" wire:model="National_ID_Mother" class="form-control">
                @error('National_ID_Mother')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label class="mt-2 mb-0" for="title">{{ trans('myParents.Passport_ID') }}</label>
                <input type="text" wire:model="Passport_ID_Mother" class="form-control">
                @error('Passport_ID_Mother')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="col">
                <label class="mt-2 mb-0" for="title">{{ trans('myParents.Phone') }}</label>
                <input type="text" wire:model="Phone_Mother" class="form-control">
                @error('Phone_Mother')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        </div>


        <div class="form-row">
            <div class="form-group col-md-6">
                <label class="mt-2 mb-0" for="inputCity">{{ trans('myParents.Nationality') }}</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="Nationality_Mother_id">
                    <option selected>{{ trans('myParents.Choose') }}...</option>
                    @foreach ($Nationalities as $National)
                        <option value="{{ $National->id }}">{{ $National->Name }}</option>
                    @endforeach
                </select>
                @error('Nationality_Mother_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col">
                <label class="mt-2 mb-0" for="inputState">{{ trans('myParents.Blood_Type') }}</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="Blood_Type_Mother_id">
                    <option selected>{{ trans('myParents.Choose') }}...</option>
                    @foreach ($Type_Bloods as $Type_Blood)
                        <option value="{{ $Type_Blood->id }}">{{ $Type_Blood->Name }}</option>
                    @endforeach
                </select>
                @error('Blood_Type_Mother_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group col">
                <label class="mt-2 mb-0" for="inputZip">{{ trans('myParents.Religion') }}</label>
                <select class="custom-select my-1 mr-sm-2" wire:model="Religion_Mother_id">
                    <option selected>{{ trans('myParents.Choose') }}...</option>
                    @foreach ($Religions as $Religion)
                        <option value="{{ $Religion->id }}">{{ $Religion->Name }}</option>
                    @endforeach
                </select>
                @error('Religion_Mother_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="mt-2 mb-0" for="exampleFormControlTextarea1">{{ trans('myParents.Address') }}</label>
            <textarea class="form-control" wire:model="Address_Mother" id="exampleFormControlTextarea1" rows="4"></textarea>
            @error('Address_Mother')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-danger-gradient py-0 nextBtn btn-lg pull-right" type="button" wire:click="back(1)">
            {{ trans('myParents.Back') }}
        </button>



        @if ($updateMode)
            <button class="btn btn-success-gradient py-0  nextBtn btn-lg pull-right" type="button"
            wire:click="secondStepSubmit_edit">{{ trans('myParents.Next') }}</button>
        @else
             <button class="btn btn-success-gradient py-0  nextBtn btn-lg pull-right" type="button"
            wire:click="secondStepSubmit">{{ trans('myParents.Next') }}</button>
        @endif

    </div>
</div>
</div>

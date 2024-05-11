<div>
    <div class="card card-statistics h-100">
        @if ($QuestionCunter == 0)
            <div class="card-header text-center">
                <h5>
                    {{ trans('Dstudent.No_questions') }}
                </h5>
                <button wire:click='back' class="btn btn-primary-gradient py-0">
                    {{ trans('Dstudent.back') }}</button>
                <hr>
            </div>
        @else
            <div class="card-header pb-0 d-flex justify-content-between">
                <h5>{{ $data[$counter]->title }}
                </h5>
                <h5>{{ $counter + 1 }}/{{ $QuestionCunter }}
                </h5>
                <h5>{{ trans('Dstudent.Score') }} {{ $score }}
                </h5>
            </div>
            <hr>
            <div class="card-body pt-0">
                @foreach (preg_split('/(-)/', $data[$counter]->answers) as $index => $answer)
                    <div class="form-check mb-3 ">
                        <input class="form-check-input ml-1   mr-4" type="radio" name="cutsomRadio"
                            id="cutsomRadio{{ $index }}"
                            wire:click="nextQue({{ $data[$counter]->id }},{{ $data[$counter]->score }},'{{ $answer }}','{{ $data[$counter]->right_answer }}')">
                        <label class="form-check-label ml-4 mr-5" for="cutsomRadio{{ $index }}">
                            {{ $answer }}
                        </label>
                    </div>
                @endforeach
        @endif
    </div>
</div>

</div>

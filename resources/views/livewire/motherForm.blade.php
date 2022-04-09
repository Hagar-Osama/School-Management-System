@if($currentStep != 2)
<div style="display: none" class="row setup-content" id="step-1">
    @endif
    <div class="col-xs-12">
        <div class="col-md-12">
            <br>
            <div class="form-row">
                <div class="col">
                    <label for="title">{{trans('Parents.Email')}}</label>
                    <input type="email" wire:model="email" class="form-control">
                    @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="title">{{trans('Parents.Password')}}</label>
                    <input type="password" wire:model="password" class="form-control">
                    @error('password')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <label for="title">{{trans('Parents.Mother Name')}}</label>
                    <input type="text" wire:model="mother_name" class="form-control">
                    @error('mother_name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="title">{{trans('Parents.Mother Name_en')}}</label>
                    <input type="text" wire:model="mother_name_en" class="form-control">
                    @error('mother_name_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-3">
                    <label for="title">{{trans('Parents.Mother Job')}}</label>
                    <input type="text" wire:model="mother_job" class="form-control">
                    @error('mother_job')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="title">{{trans('Parents.Mother Job_en')}}</label>
                    <input type="text" wire:model="mother_job_en" class="form-control">
                    @error('mother_job_en')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label for="title">{{trans('Parents.Mother National ID')}}</label>
                    <input type="text" wire:model="mother_national_id" class="form-control">
                    @error('mother_national_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col">
                    <label for="title">{{trans('Parents.Mother Passport ID')}}</label>
                    <input type="text" wire:model="mother_passport_id" class="form-control">
                    @error('mother_passport_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label for="title">{{trans('Parents.Mother Phone')}}</label>
                    <input type="text" wire:model="mother_phone" class="form-control">
                    @error('mother_phone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

            </div>


            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">{{trans('Parents.Mother Nationality ID')}}</label>
                    <select class="custom-select my-1 mr-sm-2" wire:model="mother_nationality_id">
                        <option selected>{{trans('Parents.Choose')}}...</option>
                        @foreach($Nationalities as $National)
                        <option value="{{$National->id}}">{{$National->name}}</option>
                        @endforeach
                    </select>
                    @error('mother_nationality_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="inputState">{{trans('Parents.Mother Blood Type ID')}}</label>
                    <select class="custom-select my-1 mr-sm-2" wire:model="mother_blood_id">
                        <option selected>{{trans('Parents.Choose')}}...</option>
                        @foreach($bloodTypes as $bloodType)
                        <option value="{{$bloodType->id}}">{{$bloodType->name}}</option>
                        @endforeach
                    </select>
                    @error('mother_blood_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col">
                    <label for="inputZip">{{trans('Parents.Mother Religion ID')}}</label>
                    <select class="custom-select my-1 mr-sm-2" wire:model="mother_religion_id">
                        <option selected>{{trans('Parents.Choose')}}...</option>
                        @foreach($Religions as $Religion)
                        <option value="{{$Religion->id}}">{{$Religion->name}}</option>
                        @endforeach
                    </select>
                    @error('mother_religion_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>


            <div class="form-group">
                <label for="exampleFormControlTextarea1">{{trans('Parents.Mother Address')}}</label>
                <textarea class="form-control" wire:model="mother_address" id="exampleFormControlTextarea1" rows="4"></textarea>
                @error('mother_address')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button class="btn btn-danger btn-sm nextBtn btn-lg pull-right" type="button" wire:click="back(1)">
                {{trans('Parents.Back')}}
            </button>


            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" wire:click="secondStepSubmit" type="button">{{trans('Parents.Next')}}
            </button>

        </div>
    </div>
</div>

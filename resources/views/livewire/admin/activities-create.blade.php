

<div>

    <form wire:submit.prevent="register">

        {{-- STEP 1 --}}

        @if ($currentStep == 1)





        <div class="step-one">
            <div class="card">
                <div class="card-header bg-secondary text-white">Paso 1/3 - Seleccionar Materias</div>
                <div class="card-body">

                    <div class="d-flex flex-column align-items-left mt-2">

                        {{-- @foreach ( $coursesForUser as $curso ) --}}
                        @foreach ( $courses as $curso )

                            @php
                                    /* $cursox = App\Models\User_course::where('ced',$userActiveCed)
                                                                    ->where('code',$curso['code'])
                                                                    ->get(); */

                                    $cursox = App\Models\User_course::where('name',$userActiveName)
                                                                    ->where('code',$curso['code'])
                                                                    ->get();

                            @endphp

                            <h4> {{ $curso['code'].' '.$curso['course'] }} </h4>
                            <div class="content-start">
                                @foreach ($cursox as $cursoy )
                                        <label for="{{ $cursoy['id'] }}">
                                        {{ $cursoy['section'] }}
                                        {{-- <input type="checkbox" id="{{ $cursoy['id']}}" value="{{ $cursoy['id'] }}" wire:click="<button wire:click="$emitUp('courses')"> --}}
                                        <input type="checkbox" id="{{ $cursoy['id']}}" value="{{ $cursoy['id'] }}"  wire:model="coursess">
                                        </label>
                                @endforeach
                            </div>
                        @endforeach

                    </div>

                    <span class="text-danger">@error('coursess'){{ $message }}@enderror</span>
                </div>
            </div>
        </div>


        @endif

        {{-- STEP 2 --}}

        @if ($currentStep == 2)


        <div class="step-two">
            <div class="card">


            <div class="card">
                <div class="card-header bg-secondary text-white">Paso 2/3 - Datos</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nombre de Actividad</label>
                                <input type="text" class="form-control" placeholder="Ingrese el nombre de la actividad" wire:model.defer="name">
                                <span class="text-danger">@error('name'){{ $message }}@enderror</span>
                            </div>
                        </div>


                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Factultad de la materia:</label>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group w-full">
                            <label for="">Nombre del Profesor: {{ $userActiveName }}</label>

                        </div>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header bg-secondary text-white">Descripcion de Actividad</div>
                <div class="card-body">
                    <div class = "form-group my-4">
                        <label for="body" class="p-r-mute">   </label>
                        <textarea id="body" wire:model="body" class="form-control w-full" placeholder="Indique de manera especifica como realizar la actividad" rows="6" required></textarea>
                    </div>
                    {{-- <div class="frameworks d-flex flex-column align-items-left mt-2">
                        <label for="laravel">
                            <input type="checkbox" id="laravel" value="laravel" wire:model="frameworks"> Laravel
                        </label>
                        <label for="codeigniter">
                           <input type="checkbox" id="codeigniter" value="codeigniter" wire:model="frameworks"> Codeigniter
                       </label>
                       <label for="vuejs">
                           <input type="checkbox" id="vuejs" value="vuejs" wire:model="frameworks"> Vue Js
                       </label>
                       <label for="cakePHP">
                           <input type="checkbox" id="cakePHP" value="cakePHP" wire:model="frameworks"> CakePHP
                       </label>
                    </div> --}}
                    <span class="text-danger">@error('body'){{ $message }}@enderror</span>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-secondary text-white">Proposito de la Actividad</div>
                <div class="card-body">
                    <div class = "form-group my-4">
                        <label for="extract" class="p-r-mute">   </label>
                        <textarea id="extract" wire:model="extract" class="form-control" placeholder="Indique de manera especifica el proposito de la actividad" rows="6" required></textarea>
                    </div>


                    <span class="text-danger">@error('extract'){{ $message }}@enderror</span>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-secondary text-white">Criterios de la Evaluacion</div>
                <div class="card-body">
                    <div class = "form-group my-4">
                        <label for="extract01" class="p-r-mute">   </label>
                        <textarea id="extract01" wire:model="extract01" class="form-control" placeholder="Indique de manera especifica los criterios de evaluacion de la actividad" rows="6" required></textarea>
                    </div>

                    <span class="text-danger">@error('extract01'){{ $message }}@enderror</span>
                </div>
            </div>


        </div>


        @endif


        {{-- STEP 3 --}}

        @if ($currentStep == 3)


        <div class="step-three">
            <div class="card">
                <div class="card-header bg-secondary text-white">Paso 3/3 - Infomacion Final</div>
                <div class="card-body">



                    <div class="row">

                        <div class="col-md-6">
                            <h4>Tipo de Evaluacion</h4>
                            <div class="form-group">
                               @if(count($evaluations) > 0)
                                <label for="evaluation"></label>
                                    <select names="evaluation" wire:model="evaluation"
                                    class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                                        <option value="" selected>Seleccione tipo de Evaluacion</option>
                                        @foreach ($evaluations as $evaluation)
                                            <option value="{{ $evaluation['id'] }}">{{ $evaluation['name'] }}</option>
                                            {{-- <option value="{{ $evaluation->id }}">{{ $evaluation->name }}</option> --}}
                                            {{-- <option value="Bangladesh">Bangladesh</option> --}}
                                        @endforeach
                                    </select>
                                @endif
                                {{-- <span class="text-danger">@error('country'){{ $message }}@enderror</span> --}}
                            </div>
                        </div>
                    </div>
                    <div>
                        <h4>Periodo de la Actividad</h4>
                        <div class="dates-wrapper group">

                            <div class="field clearfix date-range-start date-wrapper">
                                <div class="label">
                                <label for="lapse_in">Inicio de actividad:</label>
                                </div>
                                <div class="input">
                                    <input type="date" name="lapse_in" id="datapicker" class="input-text"
                                    placeholder="{{date('d-m-Y', strtotime($academic_start))}}"
                                    wire:model="lapse_in">
                                </div>
                                {{-- <a href="#" class="calendar-btn calendar-start hide-text">View calendar</a>--}}
                                {{-- <p>{{date('d-m-Y', strtotime($academic_start))}}</p> --}}
                            </div>

                            <div class="field clearfix date-range-start date-wrapper">
                                <div class="label">
                                <label for="lapse_out">Final de actividad:</label>
                                </div>
                                <div class="input">
                                    <input type="date" name="lapse_out" id="datapicker" class="input-text"
                                    placeholder="{{date('d-m-Y', strtotime($academic_finish))}}"
                                    wire:model="lapse_out">
                                </div>
                                {{-- <a href="#" class="calendar-btn hide-text">View calendar</a> --}}
                                {{-- <p>{{date('d-m-Y', strtotime($academic_finish))}}</p> --}}

                            </div>

                        </div>
                    </div>

                    <div>
                        <input wire:model="status" name="status" type="radio" value="1" /> Borrador
                        <input wire:model="status" name="status" type="radio" value="3" /> Revision
                        <input wire:model="status" name="status" type="radio" value="2" /> Publicado
                    </div>




                </div>
            </div>
        </div>
        @endif


        <div class="action-buttons d-flex justify-content-between bg-white pt-2 pb-2">

           @if ($currentStep == 1)
               <div></div>
           @endif

           {{-- @if ($currentStep == 2 || $currentStep == 3 || $currentStep == 4 || $currentStep == 5 || $currentStep == 6)
               <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Back</button>
           @endif --}}

           @if ($currentStep == 2 || $currentStep == 3 )
               <button type="button" class="btn btn-md btn-secondary" wire:click="decreaseStep()">Atras</button>
           @endif

           {{-- @if ($currentStep == 1 || $currentStep == 2 || $currentStep == 3 || $currentStep == 4 || $currentStep == 5)
               <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Next</button>

           @endif --}}

           {{-- @if ($currentStep == 6)

           @endif --}}

           @if ($currentStep == 1 || $currentStep == 2)
               <button type="button" class="btn btn-md btn-success" wire:click="increaseStep()">Siguiente</button>
           @endif

           @if ($currentStep == 3)
                <button type="submit" class="btn btn-md btn-primary">Crear</button>
           @endif


        </div>

    </form>


</div>

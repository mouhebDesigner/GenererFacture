<div class="authority-list">
    
    @foreach ($authorityModules as $module)
        <h6 class="card-title">
            @if(App::getLocale() == "ar")
                {{ $module->labelAr }}
            @else 
                {{ $module->label }}
            @endif
        </h6>
        <ul class="actions-list">
            @foreach ($module->authorityActions()->get() as $action)
                <li>
                    <label>
                        <input type="checkbox" name="actions[]" value="{{ $action->id }}" {{ $roleActions->contains($action->id) ? 'checked' : '' }}> {{ $action->label }}
                    </label>
                </li>
            @endforeach
        </ul>
    @endforeach

    
</div>

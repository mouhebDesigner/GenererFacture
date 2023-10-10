@foreach ($services as $service)
    @php
        $data = json_decode($service->data, true);
    @endphp
    <tr>
        <th>{{ $service->id }}</th>
        @if($service->type == 1)
            <td>{{ $service->platform->label }}</td>
            <td>{{ $service->platform->labelAr }}</td>
        @else 
            <td>{{ $service->label }}</td>
            <td>{{ $service->labelAr }}</td>

        @endif
        {{-- <td>{{ $service->description }}</td> --}}
        <td>
            @if($service->type == 1)
                {{ __('Platform') }}
            @else 
                {{ __('Other type') }}
            @endif

        </td>
        <td>
            @if(App::getLocale() == "en")
                {{ $service->user->firstName }}
                {{ $service->user->lastName }}
            @else 
                {{ $service->user->firstNameAr }}
                {{ $service->user->lastNameAr }}
            @endif
        </td>
        <td>
            @if($service->type == 1)
                @if(App::getLocale() == "en")
                    {{ $service->platform->label }}
                @else 
                    {{ $service->platform->labelAr }}
                @endif
            @else 
                ------
            @endif
        </td>
        <td>
            @if($service->type == 1)
                @if(Auth::user()->isTopAdmin())
                <a href="{{ route('topAdmin.platforms.edit', $service->platform) }}"
                    class="btn btn-primary">{{ __('Show details') }}</a>
                @else 
                    <a href="{{ route('platforms.show', $service->platform) }}"
                        class="btn btn-primary">{{ __('Show details') }}</a>

                @endif
            @else 
                ------
            @endif

        </td>
        
        @if(Auth::user()->isTopAdmin())
        <td>
            <a href="{{ route('topAdmin.services.edit', $service) }}"
                class="btn btn-primary">{{ __('Edit') }}</a>
            <button class="btn btn-danger btn-delete"
                data-url="{{ route('topAdmin.services.destroy', $service) }}">{{ __('Delete') }}</button>
        </td>
        @endif
    </tr>
@endforeach
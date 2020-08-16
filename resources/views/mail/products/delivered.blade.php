@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Hello!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>


@isset($ticket)
<h1 style="text-align: center; margin-bottom: 20px">{{ $ticket }}</h1>
@endisset

@isset($products)
<table class="table">
    <thead>
        <tr>
            <th>Nazwa</th>
            <th>Cena</th>
            <th>Razem</th>
        </tr>
    </thead>
    <tbody>
            @php 
                $sum = 0 
            @endphp
            @foreach ($products as $product)
                @php 
                    $sum += $product['price'] * $product['pivot']['quantity'];
                @endphp
                <tr>
                    <td scope="row">{{ $product['title'] }}</td>
                    <td style="white-space: nowrap; text-align: left;">{{ $product['pivot']['quantity'] }}x {{ $product['price'] }} zł</td>
                    <td style="white-space: nowrap; font-weight: bold; text-align: right;">{{ $product['price'] * $product['pivot']['quantity'] }} zł</td>
                </tr>
            @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td style="text-align: left; font-weight: bold; ">RAZEM</td>
            <td colspan="2" style="text-align: right; font-weight: bold; ">{{ $sum }} zł</td>
        </tr>
    </tfoot>
</table>
@endisset

@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Pozdrawiamy'),<br>
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "W razie problemów z kliknięciem przycisku, wklej poniższy adres do przeglądarki.",
    [
        'actionText' => $actionText,
    ]
) <span class="break-all">[{{ $displayableActionUrl }}]({{ $actionUrl }})</span>
@endslot
@endisset
@endcomponent

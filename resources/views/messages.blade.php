@extends('layouts.default')

@section('content')
    @php
        $selected = ($selected) ? $selected : 0;
    @endphp
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h3>
                <i class="fa fa-envelope mr-2" aria-hidden="true"></i>
                Twoje powiadomienia
            </h3>
        </div>
    </div>
    <div class="container">
        <div class="card">
            <div class="card-body pl-3 pr-3 pt-0" style="min-height: 60vh;">
                <div class="row h-100">
                    @if(!$messages->isEmpty())
                        <div class="col-12 col-md-4 h-100 border-right">
                            @foreach ($messages as $index => $message)
                                <div class="row align-items-center h-100 bg-light py-2 border-bottom" style="height: 100px; max-height: 100px;">                                    
                                    <div class="col-3">
                                        <a href="{{ action('NotificationController@messages', ['selected' => $index]) }}">
                                            <span class="fa-stack fa-lg mx-auto w-100">
                                                <i class="fa fa-circle fa-stack-2x {{ ($index==$selected || (!$selected && $index==0)) ? 'text-primary' : 'text-muted' }}"></i>
                                                <i class="fa {{ ($index==$selected || (!$selected && $index==0)) ? 'fa-envelope-open' : 'fa-envelope' }} fa-stack-1x fa-inverse"></i>
                                            </span> 
                                        </a>
                                    </div>
                                    <div class="col-9 pl-0 pr-3 pt-1">
                                        <a class="text-body text-decoration-none" href="{{ action('NotificationController@messages', ['selected' => $index]) }}">
                                            <h6 class="text-justify @if(!$message->read_at) font-weight-bold @endif">{{ $message->data['title'] }}</h6>
                                            <small>{{ $message->created_at }}</small>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-12 col-md-8 p-3">
                            <h5>
                                <span class="font-weight-bold">Temat:</span>
                                {{ $messages[$selected]->data['title'] }}
                            </h5>
                            <div>
                                <span class="font-weight-bold">Data:</span>
                                {{ $messages[$selected]->created_at }}
                            </div>
                            <hr />
                            <p>{{ $messages[$selected]->data['content'] }}</p>
                            @isset ($messages[$selected]->data['ticket'])
                                <div class="border-top border-bottom text-center my-3 py-3">
                                    <h4>Twój identyfikator zamówienia:</h4>
                                    <h2 class="font-weight-bold">{{ $messages[$selected]->data['ticket'] }}</h2>
                                </div>
                            @endisset
                            @isset ($messages[$selected]->data['order'])
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Nazwa</th>
                                            <th>Cena</th>
                                            <th>Ilość</th>
                                            <th>Razem</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @php 
                                                $sum = 0 
                                            @endphp
                                            @foreach ($messages[$selected]->data['order']['products'] as $product)
                                                @php 
                                                    $sum += $product['price'] * $product['pivot']['quantity'];
                                                @endphp
                                                <tr>
                                                    <td class="text-wrap" scope="row">{{ $product['title'] }}</td>
                                                    <td class="text-nowrap">{{ $product['price'] }} zł</td>
                                                    <td class="text-nowrap">{{ $product['pivot']['quantity'] }}</td>
                                                    <td class="text-nowrap font-weight-bold">{{ $product['price'] * $product['pivot']['quantity'] }} zł</td>
                                                </tr>
                                            @endforeach
                                            <tr class="table-active">
                                                <td class="font-weight-bold">RAZEM</td>
                                                <td colspan="3" class="font-weight-bold text-right">{{ $sum }} zł</td>
                                            </tr>
                                    </tbody>
                                </table>
                                <h5 class="mt-4 font-weight-bold">Dane zamówienia</h5>
                                <p>
                                    <i>
                                    {{ $messages[$selected]->data['order']['first_name'] }}
                                    {{ $messages[$selected]->data['order']['last_name'] }}<br/>
                                    {{ $messages[$selected]->data['order']['street'] }}<br/>
                                    {{ $messages[$selected]->data['order']['postal_code'] }}
                                    {{ $messages[$selected]->data['order']['city'] }}<br />
                                    {{ $messages[$selected]->data['order']['email'] }}<br/>
                                    {{ $messages[$selected]->data['order']['phone_number'] }}<br/>
                                    @if($messages[$selected]->data['order']['nip'])
                                        NIP: {{ $messages[$selected]->data['order']['nip'] }}
                                    @endif
                                    </i>
                                </p>
                            @endisset

                            @isset ($messages[$selected]->data['ending'])
                                <p>{{ $messages[$selected]->data['ending'] }}</p>
                            @endisset
                        </div>
                    @else
                        <h2 class="text-center p-4 mt-3 w-100">Nie masz żadnych powiadomień</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

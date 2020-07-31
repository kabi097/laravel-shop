@extends('layouts.default')

@section('content')
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
                    @if(!empty($messages))
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
                                        <a class="text-body" href="{{ action('NotificationController@messages', ['selected' => $index]) }}">
                                            <h6 class="text-justify @if(!$message->read_at) font-weight-bold @endif">{{ $message->data['title'] }}.</h6>
                                            <small>{{ $message->created_at }}</small>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-12 col-md-8 p-3">
                            <h5>
                                <span class="font-weight-bold">Temat:</span>
                                {{ ($selected) ? $messages[$selected]->data['title'] : $messages[0]->data['title']}}
                            </h5>
                            <div>
                                <span class="font-weight-bold">Data:</span>
                                {{ ($selected) ? $messages[$selected]->created_at : $messages[0]->created_at}}
                            </div>
                            <hr />
                            {{ ($selected) ? $messages[$selected]->data['content'] : $messages[0]->data['content']}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-2">
                <a href="#" class="btn btn-danger btn-sm btn-block" role="button" id="compose">COMPOSE</a>
                <hr />
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#"><span class="badge pull-right">42</span> Inbox </a>
                    </li>
                    <li><a href="#">Sent</a></li>
                    <li><a href="#">Drafts</a></li>
                    <li><a href="#"><span class="badge pull-right">3</span>Trash boxes</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-md-10">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab"><span class="glyphicon glyphicon-inbox">
                </span>Primary</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="home">
                        <div class="list-group">
                            <a href="#" class="list-group-item">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox">
                                    </label>
                                </div>
                                <span class="glyphicon glyphicon-star-empty"></span><span class="name" style="min-width: 120px;
                                display: inline-block;">Bhaumik Patel</span> <span class="">This is big title</span>
                                <span class="text-muted" style="font-size: 11px;">- Hi hello how r u ?</span> <span
                                        class="badge">12:10 AM</span> <span class="pull-right"><span class="glyphicon glyphicon-paperclip">
                                </span></span></a><a href="#" class="list-group-item">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox">
                                    </label>
                                </div>
                                <span class="glyphicon glyphicon-star-empty"></span><span class="name" style="min-width: 120px;
                                        display: inline-block;">Bhaumik Patel</span> <span class="">This is big title</span>
                                <span class="text-muted" style="font-size: 11px;">- Hi hello how r u ?</span> <span
                                        class="badge">12:10 AM</span> <span class="pull-right"><span class="glyphicon glyphicon-paperclip">
                                        </span></span></a><a href="#" class="list-group-item read">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox">
                                    </label>
                                </div>
                                <span class="glyphicon glyphicon-star"></span><span class="name" style="min-width: 120px;
                                                display: inline-block;">Bhaumik Patel</span> <span class="">This is big title</span>
                                <span class="text-muted" style="font-size: 11px;">- Hi hello how r u ?</span> <span
                                        class="badge">12:10 AM</span> <span class="pull-right"><span class="glyphicon glyphicon-paperclip">
                                                </span></span></a>
                        </div>
                    </div>
                    <div class="tab-pane fade in" id="profile">
                        <div class="list-group">
                            <div class="list-group-item">
                                <span class="text-center">This tab is empty.</span>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade in" id="messages">
                        ...</div>
                    <div class="tab-pane fade in" id="settings">
                        This tab is empty.</div>
                </div>
            </div>
        </div>
    </div>
    <div id="compose_window">
        <h4 class="header">New Message<span class="pull-right">&close;</span></h4>
        <form class="form-horizontal">
            <div class="form-group">
                <label for="email">To</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" placeholder="Subject">
            </div>
            <div class="form-group">
                <label for="subject">Body</label>
                <textarea class="form-control" id="subject" placeholder="" rows="5"></textarea>
            </div>
            <div class="form-group">
                <div class="btn btn-primary">Send</div>
            </div>
        </form>
    </div>

@endsection

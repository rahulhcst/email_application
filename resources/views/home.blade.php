@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-2" style="border-right: 1px solid #ccc">
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
                        <div class="list-group" id="list-group">
                            <div class="list-group-item read" data-toggle="collapse" data-target="#demo">
                                <span class="name" style="min-width: 120px;display: inline-block;">Bhaumik Patel</span>
                                <span class="">This is big title</span>
                                <span class="text-muted" style="font-size: 11px;">- Hi hello how r u ?</span>
                                <span class="badge">12:10 AM</span>
                                <div class=""></div>
                            </div>
                            <div id="demo" class="collapse">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="compose_window">
        <h4 class="header">New Message<span class="pull-right"><span class="glyphicon glyphicon-search" onclick="Gmail.saveToDraft(this);" aria-hidden="true"></span></span></h4>
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
                <textarea class="form-control" id="email_body" placeholder=""  rows="5"></textarea>
            </div>
            <div class="form-group">
                <div class="btn btn-primary" id="sendMail" onclick="Gmail.sendMail()">Send</div>
            </div>
        </form>
    </div>

@endsection

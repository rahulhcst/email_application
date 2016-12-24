@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-2" style="border-right: 1px solid #ccc">
                <a href="#" class="btn btn-danger btn-sm btn-block" role="button" id="compose">COMPOSE</a>
                <hr />
                <ul class="nav nav-pills nav-stacked" id="mail_type">
                    <li id="inbox" class="active"><a href="#"><span class="badge pull-right">42</span> Inbox </a>
                    </li>
                    <li id="sent_mail"><a href="#">Sent</a></li>
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
                        <div class="panel-group" id="panel-group-inbox">

                        </div>
                <div class="panel-group" id="panel-group-sent">

                </div>
                <div class="panel-group" id="panel-group-drafts">

                </div>
                <div class="panel-group" id="panel-group-trash">

                </div>
            </div>
        </div>
    </div>
    <div id="compose_window">
        <h4 class="header">New Message<span class="pull-right"><span class="glyphicon glyphicon-remove-circle" onclick="Gmail.saveToDraft(this);" aria-hidden="true"></span></span></h4>
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

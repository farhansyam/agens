@extends('backend.master')
@section('content')
<form class="h-form b-form striped-rows" enctype="multipart/form-data" action="{{url('profile/update')}}" method="POST">
    {{ csrf_field() }}
    {{ method_field('patch') }}

<div class="row">
    <div class="col s12 m12 l4">
            <div class="card">
                <div class="card-content">
                    <div class="center-align m-t-30"> <img src="{{ url('public/Image/'.auth()->user()->avatar)}}" class="circle" width="150">
                        <h4 class="card-title m-t-10">{{auth()->user()->username}}</h4>
                        <div class="center-align">
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="card-content">
                     <label for="files" class="btn">Select Image</label>
                     <input id="files" style="visibility:hidden;" type="file" name="avatar">

                </div>
            </div>
        </div>
        <div class="col s12 m12 l8">
            <div class="card">
                <div class="card-content">
                    <h5 class="card-title activator">Profile<i class="material-icons right tooltipped" data-position="left" data-delay="50" data-tooltip="Get Code">more_vert</i></h5>
                </div>
                    <div class="form-body">
                        <div class="divider"></div>
                        <div class="card-content">
                            <div class="row">
                                <div class="col s3">
                                    <div class="h-form-label">
                                        <label for="l-nameh">Username</label>
                                    </div>
                                </div>
                                <div class="input-field col s9">
                                    <input id="l-nameh" name="username" type="text" placeholder="Username..." value="{{auth()->user()->username}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s3">
                                    <div class="h-form-label">
                                        <label for="emailh">Email</label>
                                    </div>
                                </div>
                                <div class="input-field col s9">
                                    <input id="emailh" type="email" name="email" placeholder="Email..." value="{{auth()->user()->email}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col s3">
                                    <div class="h-form-label">
                                        <label for="con_no1">password</label>
                                    </div>
                                </div>
                                <div class="input-field col s9">
                                    <input id="con_no1" name="password" type="text" placeholder="Password baru" value="">
                                </div>
                            </div>
                        </div>
                        <div class="divider"></div>
                    </div>
                    <div class="divider"></div>
                    <div class="card-content">
                        <div class="form-action">
                            <button class="btn cyan waves-effect waves-light" type="submit" name="action">Save
                            </button>
                        </div>
                    </div>
                </form>
                <div class="card-reveal">
                    <span class="card-title grey-text text-darken-4">Code<i class="material-icons right">close</i></span>
                                                    <pre class="pre-scroll language-markup ps ps--theme_default" data-ps-id="25140dba-7c90-d5aa-b693-c03c2857b450"><code class=" language-markup"><span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>form</span> <span class="token attr-name">class</span><span class="token attr-value"><span class="token punctuation">=</span><span class="token punctuation">"</span>h-form b-form striped-rows<span class="token punctuation">"</span></span><span class="token punctuation">&gt;</span></span>
                </div>
            </div>
    </div>
    <div id="profile" class="col s12" style="display: none;">
        
    </div>
</div>
</div>
</div>
</div>
@endsection

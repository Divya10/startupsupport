@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    @if($status=="0")
                        Profile Setup
                    @else
                        Dashboard
                    @endif
                    -
                    @if($category=="org")
                        Organization
                    @else
                        User
                    @endif
                </div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($status=="0")
                        <form class="form-horizontal" method="POST" action="{{ route('updateProfile') }}">
                            {{ csrf_field() }}
                            @if($category=="org")

                                    <div class="form-group">
                                        <label for="contact" class="col-md-4 control-label">Contact</label>

                                        <div class="col-md-6">
                                            <input id="contact" type="text" class="form-control" name="contact" required>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="col-md-4 control-label">Description</label>

                                        <div class="col-md-6">
                                            <input id="description" type="textbox" class="form-control" name="description" required>

                                        </div>
                                    </div>

                                    
                                    <div class="form-group">
                                        <label for="year" class="col-md-4 control-label">Year Establishment</label>

                                        <div class="col-md-6">
                                            <input id="year" type="text" class="form-control" name="year" required>
                                        </div>
                                    </div>

                            @else
                                    <div class="form-group">
                                        <label for="contact" class="col-md-4 control-label">Contact</label>

                                        <div class="col-md-6">
                                            <input id="contact" type="text" class="form-control" name="contact" required>

                                        </div>
                                    </div>
                                    <fieldset class="form-group">
                                        <label class="col-md-4 control-label">Type</label>
                                        <div class="form-check">
                                          <label class="form-check-label">
                                            <input type="radio" class="form-check-input category_user" name="category" id="category_user" value="resource" checked>RESOURCE
                                          </label>
                                        </div>
                                        <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input category_user" name="category" id="category_user" value="manpower">MANPOWER
                                          </label>
                                        </div>
                                    </fieldset>

                                    <div id="res_user_form">
                                        <fieldset class="form-group">
                                            <label class="col-md-4 control-label" style="height: 200px;">Type</label>
                                            @foreach($categories as $cat)
                                                <div class="form-check">
                                                  <label class="form-check-label">
                                                    <input type="radio" class="form-check-input" name="resource_category" id="" value="{{ $cat->id }}">{{ $cat->title }}
                                                  </label>
                                                </div>
                                            @endforeach
                                        </fieldset>

                                        <div class="form-group">
                                            <label for="quantity" class="col-md-4 control-label">Qunatity</label>
                                            <div class="col-md-6">
                                                <input id="quantity" type="text" class="form-control" name="quantity" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="cost" class="col-md-4 control-label">Cost</label>
                                            <div class="col-md-6">
                                                <input id="cost" type="number" class="form-control" name="cost" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="desc" class="col-md-4 control-label">Desc</label>
                                            <div class="col-md-6">
                                                <input id="desc" type="text" class="form-control" name="desc" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="term" class="col-md-4 control-label">Term</label>
                                            <div class="col-md-6">
                                                <input id="term" type="number" class="form-control" name="term" required>
                                            </div>
                                        </div>

                                    </div>

                                    <div id="man_user_form">


                                        <div class="form-group">
                                            <label for="quantity" class="col-md-4 control-label">Qunatity</label>
                                            <div class="col-md-6">
                                                <input id="quantity" type="text" class="form-control" name="quantity" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="cost" class="col-md-4 control-label">Cost</label>
                                            <div class="col-md-6">
                                                <input id="cost" type="number" class="form-control" name="cost" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="desc" class="col-md-4 control-label">Desc</label>
                                            <div class="col-md-6">
                                                <input id="desc" type="text" class="form-control" name="desc" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="term" class="col-md-4 control-label">Term</label>
                                            <div class="col-md-6">
                                                <input id="term" type="number" class="form-control" name="term" required>
                                            </div>
                                        </div>
                                    </div>
                            @endif

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Save
                                    </button>
                                </div>
                            </div>

                        </form>                                
                           
                    @else
                        @if($category=="org")
                            Organization Dash
                        @else
                            User Dash
                        @endif
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
